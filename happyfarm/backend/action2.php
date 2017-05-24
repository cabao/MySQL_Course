<?php
  // Setting Variable
  header('Content-Type: application/json');
  require_once("dbtools.inc.php");
  $link = create_connection();

  $products = array() ;
  $count = 0;

  //產品個數
  $sql = "SELECT COUNT(name) AS products_num FROM products";
  $result = $link->query($sql);
  while($row = $result->fetch_assoc()) {
        $products[$count] = $row;
        $count ++;
  }

  //產品售量
  $sql = "SELECT SUM(numbers) AS orders_num FROM orders";
  $result = $link->query($sql);
  while($row = $result->fetch_assoc()) {
        $products[$count] = $row;
        $count ++;
  }

  //收入金額
  $sql = "SELECT SUM(products.price*orders.numbers) AS income FROM `orders` JOIN `products` on orders.products_id = products.id";
  $result = $link->query($sql);

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
            $products[] = $row;
            $count ++;
      }
  }else {
      echo "0 results";
  }

  //交易次數
  $sql = "SELECT COUNT(id) AS transaction FROM orders";
  $result = $link->query($sql);
  while($row = $result->fetch_assoc()) {
        $products[$count] = $row;
        $count ++;
  }

  //存貨數量
  $sql = "SELECT name, inventory FROM products";
  $result = $link->query($sql);
  $inventory = array();
  while($row = $result->fetch_assoc()) {
        $inventory[] = $row;
  }
  $products[$count] = $inventory;
  $count ++;

  //熱門排行榜
  $sql = "SELECT products.name, SUM(orders.numbers) AS numbers , SUM(products.price*orders.numbers) AS income FROM `orders` LEFT JOIN `products` ON orders.products_id = products.id GROUP BY products_id ORDER BY SUM(orders.numbers) DESC LIMIT 3 ";
  $result = $link->query($sql);
  $top = array();
  while($row = $result->fetch_assoc()) {
        $top[] = $row;
  }
  $products[$count] = $top;

  echo json_encode($products);
?>
