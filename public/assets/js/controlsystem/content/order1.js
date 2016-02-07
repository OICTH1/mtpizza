
var url = 'controlsystem/api/order/cart';

$('input[name=category]:radio').change(function(){
    var select_category = $('input[name=category]:radio:checked').val();
    var show_item = $('.' + select_category);
    show_item.show();
    var hide_item = $('.item:not(.' + select_category  + '):not(.item-hide)');
    hide_item.hide();
});

$(document).on('change','select',function(){
    var $order_line = $(this).parent().parent();
    var order_id = $order_line.children('.number').text();
    var num = $order_line.children('.item_num').children('select').val();
    var size = $order_line.children('.item_size').children('select').val();
    editItem(order_id,num,size);
});

$(function(){
    var url = 'controlsystem/api/order/cart';
    $.get(baseurl + url,function(a){
        cartUpdate(a);
    },"json");

    $('.item').click(function(){
        $('.item-selected').removeClass('item-selected');
        $(this).addClass('item-selected');
        $('.slct-item-name').text($(this).text());
        if(!$(this).hasClass('pizza')){
            $('input[name=size]:radio').prop('disabled',true);
            $('.item_add > p:nth-child(2) > label').css('color','#666');
        } else {
            $('input[name=size]:radio').prop('disabled',false);
            $('.item_add > p:nth-child(2) > label').css('color','#000');
        }
    });

    $('.cartin-btn').click(function(){
        if(checkRdio()){
            addItem();
        }
    });

    $(document).on('click','.cart-delete-btn',function(){
        var $order_line = $(this).parent().parent();
        var order_id = $order_line.children('.number').text();
        deleteItem(order_id);
    });

});

function checkRdio(){
    var message = "";
    if($('.slct-item-name').text() == ""){
        message += "商品を選択してください";
    } else {
        if($(".item-selected").hasClass('pizza') && $('input[name=size]:radio:checked').val() == undefined){
            message += "\nサイズを選択してください";
        }
        if($('input[name=num]:radio:checked').val() == undefined){
            message += "\n数量を選択してください";
        }
    }

    if(message == ""){
        return true;
    } else {
        alert(message);
        return false;
    }
}

function addItem(){
    var id = $(".item-selected").attr("id");
    var size = "";
    if($(".item-selected").hasClass('pizza')){
        size = $('input[name=size]:radio:checked').val();
    }
    var num = $('input[name=num]:radio:checked').val();
    var data = {
        item_id : id,
        "size" : size,
        "num" : num
    }
    var url = 'controlsystem/api/order/add';
    $.post(baseurl + url,data,function(a){
        cartUpdate(a);
    },"json");
}

function editItem(order_id,num,size){
    var data = {
        id : order_id,
        num : num,
        size : size,
    }
    var url = 'controlsystem/api/order/edit';
    $.post(baseurl + url,data,function(a){
        cartUpdate(a);
    },"json");
}

function deleteItem(order_id){
    var data = {
        id : order_id
    }
    var url = 'controlsystem/api/order/delete';
    $.post(baseurl + url,data,function(a){
        cartUpdate(a);
    },"json");
}

function cartUpdate(data){
    //console.log(data);
    var cart = document.getElementsByClassName('order_table_scroll')[0];
    cart.innerHTML = "";
    data['cart'].forEach(function(order,idx){
        var element = document.createElement('tr');
        var numHTML = "<select>";
        for(var i = 1; i <= 5; i++){
            var addStr = "<option value=" + i + ">" + i + "</option>"
            if(order['num'] == i){
                 addStr = "<option value=" + i + " selected>" + i + "</option>"
            }
            numHTML += addStr;
        }
        var sizeHTML = " ";
        if(order['category'] == 'ピザ'){
            sizeHTML = "<select>";
            ['S','M','L'].forEach(function(size){
                var addStr = "<option value=" + size.toLowerCase() + ">" + size + "</option>";
                if(order['size'] == size.toLowerCase()){
                     addStr = "<option value=" + size.toLowerCase() + " selected>" + size + "</option>";
                }
                sizeHTML += addStr;
            });
        }


        element.innerHTML = "<td class=\"number\">" + (idx+1) + "</td><td class=\"item_name\">" + order['item_name'] + "</td><td class=\"item_num\">" + numHTML + "</td><td class=\"item_size\">"+ sizeHTML +"</td><td><input type=\"button\" class=\"cart-delete-btn\" value=\"削除\"></td></tr>";
        cart.appendChild(element);
    });
}
