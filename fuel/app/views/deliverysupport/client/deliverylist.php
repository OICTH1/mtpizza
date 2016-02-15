<ol>
    <?php foreach ($deliverylist as $delivery): ?>
        <li id=<?php echo $delivery['orderid'] ?>>
            注文番号：<?php echo $delivery['orderid'] ?><br>
            <a href=<?php echo 'client/detail/' .$delivery['orderid']?>><?php echo $delivery['address']?></a>
            <button type="button" class="commit">配達完了</button>
        </li>
    <?php endforeach;?>
</ol>
<?php echo Asset::js('deliverysupport/client/list.js') ?>
