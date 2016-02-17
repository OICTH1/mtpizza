<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php echo Asset::css("controlsystem/k_order_history.css"); ?>
    <title>会員注文履歴</title>
  </head>
  <body>
    <div class="content">
      <div class="header">
        <div class="title">
          <p>注文履歴一覧</p>
        </div>
        <div class="return">
          <div class="top">
            <p><?php echo Html::anchor('/controlsystem/top','トップに戻る') ?></p>
          </div>
          <div class="back">
            <p><?php echo Html::anchor('/controlsystem/members/infosearch','戻る') ?></p>
          </div>
        </div>
      </div>
      <div class="k_name">
        <p>会員名: <?php echo $member->name ?></p>
      </div>
      <table>
        <tr>
          <td>注文日</td>
          <td></td>
        </tr>
        <div class="history">
          <?php foreach($orders as $order): ?>
            <tr>
              <td id="time"><?php echo substr($order->order_date, 0,11) ?></td>
              <td>
                <?php echo Html::anchor('/controlsystem/members/history/detail/'.$order->id,'詳細') ?>
              </td>
            </tr>
          <?php endforeach;?>
        </div>
      </table>
    </div>
  </body>
</html>
