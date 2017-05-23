$(function ()
{
      $.ajax({
        url: 'api.php',                  //the script to call to get data
        data: "",                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
        dataType: 'json',                //data format
        success: function(data)          //on recieve of reply
        {
          var temp = 3 ;
           var products = document.getElementById("products");
           for(var j = 0; j < data.length ; j++) {
             if((temp % 3) == 0)
               products.innerHTML += "<div class='row'>";
             products.innerHTML +=
                "<div class='col-md-4 portfolio-item' id='div_index20'>" +
                "<a><img class='img-responsive' src='images/" + data[j].image + "' /></a>" +
                "<h3 id='h3_index3'>" + data[j].name + "</h3>" +
                "<p id='description' style='font-family: &quot;Microsoft JhengHei&quot;;'>"+ data[j].description + "</p>"+
                "<h3 id='price' style='font-family: &quot;Microsoft JhengHei&quot;;'>$ "+ data[j].price + " / 台斤</h3>"+
                "<button id='buy" + data[j].id+ "' class='fluid ui grey button' style='font-family: &quot;Microsoft JhengHei&quot;;' onclick=" + "alert('已經將「" + data[j].name +"」商品加入購物車');"+"> 我要購買 </button></div>";
             if((temp % 3) ==0 )
               products.innerHTML += "</div>";
             temp++;
           }
        }
      });
});
