<?php echo Asset::css('website/content/ordercomplete.css')?>

<div class="message">
    <div class="messagein"><p>注文が完了いたしました</p>
    <p>商品が届くまでお待ちくださいませ</p></div>
    <div class="where"><p>ピザの状況はトップページの</p>
    <p><a>Where is my pizza</a>で確認ができます。</p></div>
</div>
<div class="top">
    <?php echo Html::anchor('mtpizza','TOPへ戻る',array('class'=>'buttonlink'))?>
</div>
