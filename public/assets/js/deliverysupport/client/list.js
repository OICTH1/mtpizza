$('.commit').click(function(){
    var order_id = $(this).parent('li').attr("id");
    var url = 'api/deleteOrder';
    var data = {order_id:order_id};
    $.post(url,data,function(res){
        alert('注文番号:'+ order_id + 'の配達が完了しました。');
        location.reload();
    });
});
