<?php echo Asset::css('website/content/message.css')?>

<div class="message">
    <div class="heading">
        <?php echo $title ?>
    </div>
    <?php echo $messagein ?>
</div>
<div class="top button">
    <?php echo Html::anchor('index.php/website/top','TOPに戻る',array('class'=>'link'))?>
</div>
