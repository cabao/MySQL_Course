<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="前端與網頁資料庫之實例應用">
  <meta name="author" content="venus_bird">

  <title>Happy Farm backend</title>

  <!-- Bootstrap Core CSS -->
  <link href="../css/bootstrap.css" rel="stylesheet">

  <!-- Semantic UI CSS -->
  <link href="../vendors/semantic-ui/dist/semantic.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
      <a class="navbar-brand" href="../index.php"><img src="../images/icon2.png"></a>
      <a class="navbar-brand" href="../index.php">Happy Farm Backend</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li>
          <a href="#" style="font-size: 25px;"><i class="inverted alarm icon"></i></a>
        </li>
        <li>
          <a href="#" style="font-size: 25px;"><i class="inverted user icon"></i></a>
        </li>
        <li>
          <a href="#" style="font-size: 25px;"><i class="inverted mail icon"></i></a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="main ui padded grid">
      <div id="left-sidebar" class="sidebar column three wide">
        <?php include '../layouts/sidebar.php' ?>
      </div>

      <div class="content column thirteen wide" style="height: 855px;">
        <form method="GET" action="../action.php" class="ui large form">
          <input name="action" type="hidden" value="Update">
          <div class="ui grid">
            <div class="column">
              <div class="ui clearing segment">
                <div class="inline fields">
                  <div class="two wide field right aligned">
                    <label>產品名稱</label>
                  </div>
                  <div class="fourteen wide field right aligned">
                    <input type="text" id="name" name="name" placeholder="產品名稱" value="">
                  </div>
                </div>

                <div class="inline fields">
                  <div class="two wide field right aligned">
                    <label>產品價格</label>
                  </div>
                  <div class="fourteen wide field right aligned">
                    <input type="text" id="price" name="price" placeholder="產品名稱" value="">
                  </div>
                </div>

                <div class="inline fields">
                  <div class="two wide field right aligned">
                    <label>產品描述</label>
                  </div>
                  <div class="fourteen wide field">
                    <textarea id="description" name="description" placeholder="產品描述" value=""></textarea>
                  </div>
                </div>

                <div class="inline fields">
                  <div class="two wide field right aligned">
                    <label>預覽圖</label>
                  </div>
                  <div class="fourteen wide field">
                    <img id="open-media" class="ui medium bordered image" src="">
                    <input type="file" id="image" name="image" onchange="previewFile()" value="">
                  </div>
                </div>
              </div>
              <input id="order" name="order" type="hidden" value="">
              <input type="submit" class="ui right floated green button" value="更新">
            </div>
        </form>

        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script>
      var strUrl = location.search;
      var getPara, ParaVal;
      var aryPara = [];
      var imgData ;

      if (strUrl.indexOf("?") != -1) {
        var getSearch = strUrl.split("?");
        getPara = getSearch[1].split("&");
        for (i = 0; i < getPara.length; i++) {
          ParaVal = getPara[i].split("=");
          aryPara.push(ParaVal[0]);
          aryPara[ParaVal[0]] = ParaVal[1];
        }
      }

      $(function() {
        $.ajax({
          url: '../api.php', //the script to call to get data
          data: "", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
          dataType: 'json', //data format
          success: function(data) //on recieve of reply
          {
            document.getElementById("name").value = data[ParaVal[1]].name;
            document.getElementById("price").value = data[ParaVal[1]].price;
            document.getElementById("description").value = data[ParaVal[1]].description;
            document.getElementById("open-media").src = '../images/' + data[ParaVal[1]].image;
            document.getElementById("order").value = data[ParaVal[1]].id;

            // imgData = data[ParaVal[1]].image;
          }
        });
      });

      //預覽圖
      function previewFile() {
        var preview = document.querySelector('#open-media');
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.addEventListener("load", function() {
          preview.src = reader.result;
        }, false);

        if (file) {
          reader.readAsDataURL(file);
        }
      }
    </script>
</body>
</html><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="前端與網頁資料庫之實例應用">
  <meta name="author" content="venus_bird">

  <title>Happy Farm backend</title>

  <!-- Bootstrap Core CSS -->
  <link href="../css/bootstrap.css" rel="stylesheet">

  <!-- Semantic UI CSS -->
  <link href="../vendors/semantic-ui/dist/semantic.css" rel="stylesheet">
</head>

<body>
  <?php include '../layouts/header.php' ?>

  <div class="container">
    <div class="main ui padded grid">
      <div id="left-sidebar" class="sidebar column three wide">
        <?php include '../layouts/sidebar.php' ?>
      </div>

      <div class="content column thirteen wide" style="height: 855px;">
        <form method="GET" action="../action.php" class="ui large form">
          <input name="action" type="hidden" value="Update">
          <div class="ui grid">
            <div class="column">
              <div class="ui clearing segment">
                <div class="inline fields">
                  <div class="two wide field right aligned">
                    <label>產品名稱</label>
                  </div>
                  <div class="fourteen wide field right aligned">
                    <input type="text" id="name" name="name" placeholder="產品名稱" value="">
                  </div>
                </div>

                <div class="inline fields">
                  <div class="two wide field right aligned">
                    <label>產品價格</label>
                  </div>
                  <div class="fourteen wide field right aligned">
                    <input type="text" id="price" name="price" placeholder="產品名稱" value="">
                  </div>
                </div>

                <div class="inline fields">
                  <div class="two wide field right aligned">
                    <label>產品描述</label>
                  </div>
                  <div class="fourteen wide field">
                    <textarea id="description" name="description" placeholder="產品描述" value=""></textarea>
                  </div>
                </div>

                <div class="inline fields">
                  <div class="two wide field right aligned">
                    <label>預覽圖</label>
                  </div>
                  <div class="fourteen wide field">
                    <img id="open-media" class="ui medium bordered image" src="">
                    <input type="file" id="image" name="image" onchange="previewFile()" value="">
                  </div>
                </div>
              </div>
              <input id="order" name="order" type="hidden" value="">
              <input type="submit" class="ui right floated green button" value="更新">
            </div>
        </form>

        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script>
      var strUrl = location.search;
      var getPara, ParaVal;
      var aryPara = [];
      var imgData ;

      if (strUrl.indexOf("?") != -1) {
        var getSearch = strUrl.split("?");
        getPara = getSearch[1].split("&");
        for (i = 0; i < getPara.length; i++) {
          ParaVal = getPara[i].split("=");
          aryPara.push(ParaVal[0]);
          aryPara[ParaVal[0]] = ParaVal[1];
        }
      }

      $(function() {
        $.ajax({
          url: '../api.php', //the script to call to get data
          data: "", //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
          dataType: 'json', //data format
          success: function(data) //on recieve of reply
          {
            document.getElementById("name").value = data[ParaVal[1]].name;
            document.getElementById("price").value = data[ParaVal[1]].price;
            document.getElementById("description").value = data[ParaVal[1]].description;
            document.getElementById("open-media").src = '../images/' + data[ParaVal[1]].image;
            document.getElementById("order").value = data[ParaVal[1]].id;

            // imgData = data[ParaVal[1]].image;
          }
        });
      });

      //預覽圖
      function previewFile() {
        var preview = document.querySelector('#open-media');
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.addEventListener("load", function() {
          preview.src = reader.result;
        }, false);

        if (file) {
          reader.readAsDataURL(file);
        }
      }
    </script>
</body>
</html>
