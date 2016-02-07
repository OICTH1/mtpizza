<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php echo Asset::css("controlsystem/top.css"); ?>
    <title>トップページ</title>
  </head>
  <body>
    <div class="content">
      <div class="frame"><p><?php echo Html::anchor('index.php/controlsystem/members/infosearch','会員検索'); ?></p></div>
      <div class="frame"><p><?php echo Html::anchor('index.php/controlsystem/order/order','注文登録') ?></p></div>
      <div class="frame"><p><?php echo Html::anchor('index.php/controlsystem/item/search','商品検索')?></p></div>
      <div class="frame"><p><?php echo Html::anchor('index.php/controlsystem/item/registration','商品登録')?></p></div>
      <div class="frame"><p><?php echo Html::anchor('index.php/controlsystem/earnings/earnings','売上情報')?></p></div>
    </div>
  </body>
</html>
