<?php echo Asset::css('website/content/whereismypizza.css') ?>

<div class="heading">
    ご注文内容
</div>
<div class="cart body">
    <?php $total = 0;foreach ($order['orderline'] as $orderline): ?>
        <div class="cartin">
            <div class="name">
                <span><?php echo $orderline['name'] ?></span><span><?php if($orderline['size'] != ''){echo '(' . $orderline['size'] . ')'; }?></span>
            </div>
            <div class="num">
                数量<span><?php echo $orderline['num'] ?></span>
            </div>
            <div class="money">
                金額￥<span><?php $price = $orderline['num'] * $orderline['price']; $total += $price;echo $price  ?></span>
            </div>
	    <div class='clear'></div>
        </div>
    <?php endforeach; ?>
    <div class="summoney">
        合計金額
        <div class="sum">
            <span><?php echo $total ?></span>円
        </div>
    </div>
</div>
<div class="heading">
    配達先
</div>
<div class="delivery body">
    <div class="yubin">
        <?php echo $order['address']['postalcode'] ?>
    </div>
    <div class="address">
        <?php echo $order['address']['destination'] ?>
    </div>
</div>
<div class="heading">
    Where is my pizza
</div>
<div class="whereismypizza body">
    <div class="map-embed">
        <div id="map-canvas">ここに地図が表示されます</div>
    </div>
</div>
<div class="button">
    <a class="buttonlink">戻る</a>
</div>
<script type="text/javascript">
    var lat = 0+<?php echo $staff['lat'] ?>;
    var long = 0+<?php echo $staff['long'] ?>;
</script>
<?php echo Asset::js("https://maps.googleapis.com/maps/api/js?key=AIzaSyAGCQellvVcqIZwpn0xtU0Vrc5SBLWnTt8") ?>
<?php echo Asset::js('website/content/whereismypizza.js') ?>
