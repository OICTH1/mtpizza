$(function(){
    var url = 'localhost/DeliverySupport/public/index.php/api/order/' + <?php echo $order->id?>;
    $("#qrcode").qrcode({width:300,height:300,text:url});
    window.print();
    $.post()
});
