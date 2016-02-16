$(function(){
    var url = 'localhost/DeliverySupport/public/index.php/api/order/' + <?php echo $order->id?>;
    $("#qrcode").qrcode({width:70,height:70,text:url});
    window.print();
    $.post()
});
