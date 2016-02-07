<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	  <?php echo Asset::css("controlsystem/order_cfm.css"); ?>
    <title>注文確認</title>
  </head>
  <body>
    <div class="header">
      <div class="title">
        <div>注文確認</div>
      </div>
      <div class="return">
        <div class="top">
          <div><?php echo Html::anchor('index.php/controlsystem/top','トップに戻る') ?></div>
        </div>
        <div class="back">
          <div><?php echo Html::anchor('index.php/controlsystem/order/order','戻る') ?></div>
        </div>
      </div>
      <div style="clear:both">
    </div>
    <div class="content">
      <div class="content_top">
        <?php echo Form::open('index.php/controlsystem/order/cfm/commit')?>
        <table>
          <tr>
            <td id="label"><b>注文日</b></td>
            <td><input type="textbox" name="order_day" size="10" maxlength="10" value=<?php echo date( "Y-m-d", time() )?>></td>
          </tr>
          <tr>
            <td id="label"><b>注文者</b></td>
            <td><input type="textbox" name="customer_name" size="10" maxlength="10"></td>
          </tr>
          <tr>
              <td id="label"><b> 郵便番号</b></td>
              <td><input type="textbox"  size="3" maxlength="3" name="postalcode1"> <b>-</b>
                <input type="textbox"  size="4" maxlength="4" name="postalcode2">
              </td>
            </tr>
            <tr>
              <td id="label"><b> 住所</b></td>
              <td><input type="textbox"  size="30" maxlength="30" name="address">
              </td>
            </tr>
          </table>

      </div>
      <div class="content_center">
        <table border="2" rules="rows" cellpadding="10">
          <thead class="table_head">
            <tr>
              <th id="item_name">商品名</th>
              <th>個数</th>
              <th>サイズ</th>
              <th>金額</th>
            </tr>
          </thead>
          <tbody class="table_scroll">
            <?php if(!empty($orders)):?>
                <?php foreach($orders as $order):?>

                <tr>
                  <td id="item_name"><?php echo $order['item_name']?></td>
                  <td><?php echo $order['num']?></td>
                  <td id="size"><?php echo $order['size']?></td>
                  <td id="price"><?php echo $order['price']?></td>
                </tr>
                <?php endforeach;?>
            <?php endif;?>
          </tbody>
        </table>
        <div class="total"><div>合計金額<span><?php echo '¥' . $total?></span></div><div style="clear:both"></div></div>
      </div>
      <div class="content_bottom">
        <div class="buttons">
            <div><?php echo Html::anchor('index.php/controlsystem/order/order','再編集') ?></div>
            <div><?php echo Html::anchor('index.php/controlsystem/top','キャンセル') ?></div>
            <div><input type="submit" name="submit" value="注文"></div>
        </div>
        <?php echo Form::close()?>
      </div>
    </div>
  </body>
</html>
