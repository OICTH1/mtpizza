<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>商品登録</title>
		<?php echo Asset::css("controlsystem/item_registration.css"); ?>
	</head>
	<body>
		<div class="header">
			<div class="title">商品登録</div>
			<div class="back"><a><?php echo Html::anchor('index.php/controlsystem/top','戻る') ?></a></div>
			<div style="clear:both;"></div>
		</div>
		<div class="content">
			<div class="content-left">
				<form class="regi_content" action="" method="">
				<p><input type="file" id="new-img" name="item-img" accept="image/*"><p>
				<p>
					<label>商品名<input id="item_name" type="textbox" name="item_name"></label>
				</p>
				<p>
					<label>フリガナ<input id="phonetic" type="textbox" name="phonetic"></labbel>
				</p>
				<p>
					カテゴリー<br>
					<label><input id="category" type="radio" name="category" value="pizza">ピザ</label>
					<label><input type="radio" name="category" value="side">サイド</label>
					<label><input type="radio" name="category" value="drink">ドリンク</labe>
				</p>
				</form>
				<div style="clear :both;"></div>
			</div>
			<div class="content-right">
				<form class="regi_content" action="" method="">
				<p>
					<label>単価<input id="price" type="textbox" class="one" name="money" value="">円</label>
				</p>
				<p>サイズ別単価<br>
					<label>S
					<input id="s_price" type="textbox" class="size" name="s_money" value="">円</label><br>
					<label>M
					<input id="m_price" type="textbox" class="size" name="m_money" value="">円</label><br>
					<label>L
					<input id="l_price" type="textbox" class="size" name="l_money" value="">円</label><br>
					</p>
					<p>
					<label>商品説明<br>
						<textarea id="explanation" name="explanation" rows="6" cols="60"></textarea></label>
					</p>
					<p>
						<input id="registration" type="submit" value="登録">
					</p>
					</form>
				</div>
			</div>
			<?php echo Asset::js('jquery-1.11.3.min.js')?>
			<?php echo Asset::js('controlsystem/content/item_registration.js')?>
	</body>
</html>
