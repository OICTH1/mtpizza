<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>商品登録</title>
		<?php echo Asset::css("controlsystem/item_registration.css"); ?>
	</head>
	<body>
		<div class="header">
      <div class="title">
        <p>商品登録</p>
      </div>
      <div class="return">
        <div class="back">
          <p><?php echo Html::anchor('index.php/controlsystem/top','戻る') ?></p>
        </div>
      </div>
		</div>
		<div class="content">
			<?php echo Form::open(array('action' =>'index.php/controlsystem/item/registration/commit','class' => 'regi_content','enctype'=>'multipart/form-data','method'=>'post')); ?>
				<div class="content_left">
					<p><label>商品名<br><input id="item_name" type="textbox" name="item_name"></label></p>
					<p><label>フリガナ<br><input id="phonetic" type="textbox" name="phonetic"></label></p>
					<p>カテゴリー<br>
						<label><input id="category" type="radio" name="category" value="pizza">ピザ</label>
						<label><input id="category" type="radio" name="category" value="side">サイド</label>
						<label><input id="category" type="radio" name="category" value="drink">ドリンク</label>
					</p>
					<p><input type="file" id="new-img" name="item-img" accept="image/*"></p>
				</div>
				<div class="content_right">
					<p><label>単価<br>
						<input id="price" type="textbox" class="one" name="money" value="">円
					</label></p>
					<p>サイズ別単価</p>
						<p>S<input id="s_price" type="textbox" class="size" name="s_money" value="">円</p>
						<p>M<input id="m_price" type="textbox" class="size" name="m_money" value="">円</p>
						<p>L<input id="l_price" type="textbox" class="size" name="l_money" value="">円</p>
						<p>
						<label>商品説明<br>
							<textarea id="explanation" name="explanation" rows="6" cols="60"></textarea></label>
						</p>
						<input id="registration" type="submit" value="登録">
				</div>
		<?php echo Form::close()?>
		</div>
		<?php echo Asset::js('jquery-1.11.3.min.js')?>
		<?php echo Asset::js('controlsystem/content/item_registration.js')?>
	</body>
</html>
