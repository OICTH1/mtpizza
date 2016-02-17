<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php echo Asset::css("controlsystem/k_order_detail.css"); ?>
    <title>会員注文履歴詳細</title>
  </head>
  <body>
    <div class="content">
      <div class="header">
        <div class="title">
          <p>注文履歴詳細</p>
        </div>
        <div class="return">
          <div class="top">
            <p><?php echo Html::anchor('/controlsystem/top','トップに戻る') ?></p>
          </div>
          <div class="back">
            <p><?php echo Html::anchor('/controlsystem/members/history/index/'.$member->id,'戻る') ?></p>
          </div>
        </div>
      </div>
      <div class="k_name">
        <p>会員名: <?php echo $member->name ?></p>
      </div>
      <p>注文日: <?php echo substr($orders->order_date, 0, 11); ?></p>
      <table>
        <tr>
          <td id="item_name">商品名</td>
          <td>サイズ</td>
          <td>個数</td>
          <td>金額</td>
        </tr>
        <div class="history">
          <table>
          <?php
          $total = 0;
          foreach($details as $detail):
          ?>
          <tr>
            <td id="item_name"><?php echo $detail->item->name ?></td>
            <td><?php echo $detail->size ?></td>
            <td><?php echo $detail->num ?></td>
            <td id="money">
              <?php
                $unit_price = 0;
                switch($detail->size){
                  case "S":
                    $unit_price = $detail->item->unit_price_s;
                    break;
                  case "M":
                    $unit_price = $detail->item->unit_price_m;
                    break;
                  case "L":
                    $unit_price = $detail->item->unit_price_l;
                    break;
                  default:
                    $unit_price = $detail->item->unit_price;
                    break;
                }
                $price = $detail->num * $unit_price;
                $total += $price;
                echo $price;
              ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </div>
        <tr>
          <td ></td>
          <td colspan="2">合計金額</td>
          <td id="money"><?php echo $total ?></td>
        </tr>
      </table>
    </div>
    </body>
</html>
