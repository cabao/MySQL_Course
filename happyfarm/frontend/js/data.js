$(function() {
    fetch('api.php')
    .then(function(request) {
    return request.json();
    })
    .then(function(data) {
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
             "<select id='number"+ data[j].id +"' class='ui fluid dropdown'>" +
             "<option value='1'>1</option>" +
             "<option value='2'>2</option>" +
             "<option value='3'>3</option>" +
             "<option value='4'>4</option>" +
             "<option value='5'>5</option>" +
             "<option value='6'>6</option>" +
             "<option value='7'>7</option>" +
             "<option value='8'>8</option>" +
             "<option value='9'>9</option>" +
             "<option value='10'>10</option>" +
             "</select>" +
             "<br></br>" +
            "<button class='fluid ui grey button' style='font-family: &quot;Microsoft JhengHei&quot;;' onclick=" + "getValue("+ data[j].id+");"+"> 我要購買 </button></div>";
         if((temp % 3) == 0 )
           products.innerHTML += "</div>";
         temp++;
       }
    })
    .catch(function(e) {
      return e;
    })
});

function getValue(id){
  swal({
    title:"確認購買?",
    text: "點選確認後，訂單確認！",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Confirm",
    closeOnConfirm: false
  },
  function(){
    swal("訂單確認!", "您的訂單已加入。", "success");

    var e = document.getElementById("number" + id);
    var value = e.options[e.selectedIndex].value;

    console.log("id = " + e + "value = " + value );
    document.location.href = './order.php?products_id=' + id + '&numbers=' + value ;
  });



}
