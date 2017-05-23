<?php

  require_once("dbtools.inc.php");
  $link = create_connection();
  $tableName = "products";

  $sql = "SELECT * FROM $tableName";
  $result = $link->query($sql);

  $products_all = array();
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $products_all[] = $row;
      }
  }else {
      echo "0 results";
  }

  $link->close();

  echo json_encode($products_all);
?>
