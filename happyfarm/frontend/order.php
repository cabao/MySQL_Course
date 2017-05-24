<?php
  header('Content-Type: application/json');
  require_once("dbtools.inc.php");
  $link = create_connection();

  // Inital GET Action Parameter
  $count = 0 ;
  foreach($_GET as $key => $value)
  {
    $KeyData[$count] = $key ;
    $ValueData[$count] = $value;
    $count++;
  }

//一次輸入一筆
  $sql = "INSERT INTO orders ($KeyData[0], $KeyData[1]) VALUES ($ValueData[0], $ValueData[1])";
  $link->query($sql);

//變更products存貨數量
  $sql = "SELECT inventory FROM products WHERE id = $ValueData[0]";
  $result = $link->query($sql);
  $inventory = 0;
  while($row = $result->fetch_assoc()) {
      $inventory = $row;
  }

  $number = $inventory[inventory] - $ValueData[1];
  $sql = "UPDATE products Set inventory = $number Where id = $ValueData[0]";
  $link->query($sql);
  //
  $link->close();

  header('Location: index.html');
?>
