var baseurl = '/mtpizza/public/index.php/';
var url = 'controlsystem/api/order/cart';

function poster(n,c){
  $.post('/mtpizza/public/index.php/controlsystem/api/item/rowList.json',{vowel:n,category:c},listUpdata);
}
var name = 'a';
var category = 'pizza';
var cartdata;//カートをScrollするときに保持してる今のカート
var sumdata =0;// 合計金額
var num=0; //注文する数
var numflag =0; //入力した数があるかどうか
poster(name,category);

$('.indexlist_form input[name=index]').change(
  function() {
    $('.indexlist_form input' ) . closest( 'label' ) . css( {
    backgroundColor: 'orangered',
  } );
    $( '.indexlist_form :checked' ) . closest( 'label' ) . css( {
    backgroundColor: 'gold',
  });
}).trigger('change');

$(".indexlist_item").click(function(){
  name = $(this).attr("value");
  poster(name,category);

});

$('.item_title_form input[name=c]').change(
  function() {
    $('.item_title_form input' ) . closest( 'label' ) . css( {
    backgroundColor: 'lightblue',
  } );
    $( '.item_title_form :checked' ) . closest( 'label' ) . css( {
    backgroundColor: 'cyan',
  });
}).trigger('change');

$(".item_title").click(function(){
  category = $(this).attr("value");
  poster(name,category);

});

function listUpdata(data){
  var text = '';

  for(var i = 0;i <data.length;i++){

    if( i % 3 == 0){
      text += "<div class='viewlistrow'>";
    }

    if(category == "pizza"){
      text += "<div class='viewitem' id='"+data[i].id+"' >" + data[i].name + " (" + data[i].size +") <input type='hidden' name='" + data[i].size + "' value='" + data[i].place + "'></div>";
    }else{
      text += "<div class='viewitem' id='"+data[i].id+"' >" + data[i].name + "<input type='hidden' name='" + data[i].size + "' value='" + data[i].place + "'></div>";
    }

    if(data.length % 3 == 1  && (data.length - i)<3 ){
     text += "<div class='viewitem_n'></div>";
     text += "<div class='viewitem_n'></div>";
   }else if(data.length % 3 == 2  && (data.length - i)<2 ){
     text += "<div class='viewitem_n'></div>";
   }else if( i % 3 ==2){
       text += "</div>";
     }
  }
  $(".viewlist").html(text);
}


function cartpos(id,size,num){
  $.post('/mtpizza/public/index.php/controlsystem/api/order/add.json',{id:id,size:size,num:num},cartUpdata);
}


function cartUpdata(data){
  var i = 0;
  var j = 4;
  var k = data["cart"].length-1;
  var l = data["cart"].length-6;
  var ii = 0;
  sumdata =0;
  sum = 0;
  cartdata = data;
  alert(data["cart"].length);
if(k<5){
  for(i=0;i<5;i++){
    if(data["cart"][i] == undefined){
    $(".tr"+j).children(".number").html("");
    $(".tr"+j).children(".item_name").html("");
    $(".tr"+j).children(".num").html("");
    $(".tr"+j).children(".unit_price").html("");
    $(".tr"+j).children(".sum_price").html("");
    $(".selectitem").html("");
    $(".selectnum").html("");
  }else{
    //alert(data["cart"][i].unit_price +":"+ data["cart"][i].num);
      sum = +data["cart"][i].unit_price * +data["cart"][i].num;
      $(".tr"+i).children(".number").html(i+1);
      if(data["cart"][i].size == ""){
      $(".tr"+i).children(".item_name").html(data["cart"][i].item_name);
    }else{
      $(".tr"+i).children(".item_name").html(data["cart"][i].item_name + "("+ data["cart"][i].size+")");
    }
      $(".tr"+i).children(".num").html(data["cart"][i].num);
      $(".tr"+i).children(".unit_price").html(data["cart"][i].unit_price);
      $(".tr"+i).children(".sum_price").html(sum);
  }
  }
}else{
  for(i=k;i>=l;i--){
    if(data["cart"][i] == undefined){
    $(".tr"+j).children(".number").html("");
    $(".tr"+j).children(".item_name").html("");
    $(".tr"+j).children(".num").html("");
    $(".tr"+j).children(".unit_price").html("");
    $(".tr"+j).children(".sum_price").html("");
    $(".selectitem").html("");
    $(".selectnum").html("");
  }else{
    //alert(data["cart"][i].unit_price +":"+ data["cart"][i].num);
      sum = +data["cart"][i].unit_price * +data["cart"][i].num;
      $(".tr"+j).children(".number").html(i+1);
      if(data["cart"][i].size == ""){
      $(".tr"+j).children(".item_name").html(data["cart"][i].item_name);
    }else{
      $(".tr"+j).children(".item_name").html(data["cart"][i].item_name + "("+ data["cart"][i].size+")");
    }
      $(".tr"+j).children(".num").html(data["cart"][i].num);
      $(".tr"+j).children(".unit_price").html(data["cart"][i].unit_price);
      $(".tr"+j).children(".sum_price").html(sum);
  }
  j--;
  }
}
  Object.keys(data["cart"]).forEach(function (key){
    sum = data["cart"][key].unit_price * data["cart"][key].num;
    sumdata += sum;
    //alert(sumdata);
    });
  $(".sumpricetd").html(sumdata);
}

function cartScroll(){
  var i=0;
  var j=0;
  var k=4;
  for(i=0;i<5;i++){
    //alert(data["cart"][i].unit_price +":"+ data["cart"][i].num);
    sum = +data["cart"][i].unit_price * +data["cart"][i].num;
    $(".tr"+i).children(".number").html(i+1);
    if(data["cart"][i].size == ""){
    $(".tr"+i).children(".item_name").html(data["cart"][i].item_name);
  }else{
    $(".tr"+i).children(".item_name").html(data["cart"][i].item_name + "("+ data["cart"][i].size+")");
  }
    $(".tr"+i).children(".num").html(data["cart"][i].num);
    $(".tr"+i).children(".unit_price").html(data["cart"][i].unit_price);
    $(".tr"+i).children(".sum_price").html(sum);
  }
}


$(document).on("click",".viewitem",function(){
  $(".viewitem").removeClass("select");
  $(this).addClass("select");
  var select = $(".select").html();
  $(".selectitem").html(select);
});

$(".numbutton").click(function (){
  numflag++;
  if(0<= +$(this).attr("id")){
  if(numflag >0){
    num =num*10;
  }
  num += +$(this).attr("id");
  $(".selectnum").html(num);
}
//  alert(num);

});

$("#decision").click(function(){
  var id = $(".select").attr("id");
  var size = $(".select").children("input").attr("name");
//  alert("id:" + id + "size:" + size + "num:" +num);
  cartpos(id,size,num);
  num = 0;
  $(".viewitem").removeClass("select");
});
$("#delete").click(function(){
  var id = $(".select").attr("id");
  var size = $(".select").children("input").attr("name");
  num = 0;
  cartpos(id,size,num);

  $(".viewitem").removeClass("select");
});
