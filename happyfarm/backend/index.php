<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 什麼版本IE 就用什麼版本的標準模式 -->
    <!-- width通常設為device-width，用意是適應各家裝置的大小，這樣寫CSS時就能放心的把版面寬度設為100% initial-scale=1 表不能縮放-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="前端與網頁資料庫之實例應用">
    <meta name="author" content="venus_bert">
    <title>購物網實例</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Semantic UI CSS -->
    <link href="vendors/semantic-ui/dist/semantic.css" rel="stylesheet">

  </head>
  <body>
    <?php include 'layouts/header.php'; ?>

    <div class="container">
      <div class="main ui padded grid">
        <div id="left-sidebar" class="sidebar column three wide">
           <?php include 'layouts/sidebar.php'; ?>
        </div>

        <?php include 'layouts/title.php'; ?>

        <div class="row" style="height: 20px;"></div>

        <div class="ui five column grid" id="cards"></div>
      </div>
    </div>

    <div class="save-button" style="position: fixed; z-index: 999999; right: 30px; bottom: 30px;">
        <a href="products/create.php" class="ui blue button">+　新增產品</a>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/list.js"></script>
  </body>
</html>
