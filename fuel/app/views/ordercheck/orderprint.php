<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php echo Asset::css('ordercheck/content/orderprint.css') ?>
    <?php echo Asset::js('jquery-1.11.3.min.js') ?>
    <?php echo Asset::js('jquery.qrcode.min.js') ?>
  </head>
  <body >
    <div style="width:282px;height:400px;position:absolute">
      <h3 class="clearfix" style="margin-bottom:10px;"><span class="No"><?php echo sprintf('No.%04d',$order->id) ?></span><span class="datetime"><?php echo $order->order_date ?></span></h3>
      <table id="order" style="width:100%;" >
        <thead>
          <tr style="text-align: center"><th>商品名</th><th>サイズ</th><th>数量</th></tr>
        </thead>
        <tbody>
            <?php foreach ($order->orderline as $orderline):?>
                <tr><td><?php echo $orderline->item->name ?></td><td><?php echo $orderline->size ?></td><td><?php echo $orderline->num ?></td><tr>
            <?php endforeach; ?>
        </tbody>
      </table>
      <div id="bc">
        <hr style="border-top: 2px dashed #666;width: 100%;">
        <h5 class="clearfix" style="margin-bottom:10px;"><span class="No">No.0001</span><span class="datetime">2015/10/10 12:44:23</span></h5>
        <div id="qrcode"></div>
      </div>
    </div>
    <script type="text/javascript">
    var url = <?php echo "$order->id" ?>;
        $("#qrcode").qrcode({width:100,height:100,text:url});
        window.print();
        var post_url = <?php echo "\"/ordercheck/api/order/print/$order->id\"" ?>;
        $.post(post_url,function(){
            window.history.back(-1)
        });
    </script>
    </body>
</html>
