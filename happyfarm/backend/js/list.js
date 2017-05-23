$(function ()
{
  $.ajax({
    url: 'api.php',                  //the script to call to get data
    data: "",                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
    dataType: 'json',                //data format
    success: function(data)          //on recieve of reply
    {
      var temp = 3 ;
       var cards = document.getElementById("cards");
       var count = 0 ;
       for(var j = 0; j < data.length ; j++) {
           cards.innerHTML +=
             "<div class='column'>" +
             "<div class='ui link card'>" +
             "<div class='image'>" +
             "<img src='../frontend/images/" + data[j].image + "' />" +
             "</div>" +
             "<div class='content'>" +
             "<p class='header'>" + data[j].name + "<a href='products/edit.php?id="+count + "'>" +
             "<i class='ui right floated icon link black setting'></i></a></p>" +
             "</div>" +
             "<div class='content centered center aligned'>"+
             "<a href='./action.php?action=Delete&Id="+ data[j].id + "' class='ui red button' >刪除</a></div>";
             "</div>" +
             "</div>";
             count++;
       }
    }
  });
});
