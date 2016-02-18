$.post('/mtpizza/deliverysupport/api/reset.json');
$('#add_btn').click(function(){
    var order_id = $('#orderid').val();
    $.post('/deliverysupport/api/addOrder.json',{
        order_id:order_id
    },function(res){
        console.log(res);
        if(res.status){
            alert('「注文番号：' + order_id + '」を追加しました。');
        } else {
            alert(res.message);
        }
    });
});
