<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ピザ注文</title>
	<?php echo Asset::css("controlsystem/pizza_order1.css"); ?>
</head>
<body>
	<div class="header">
		<div class="title">
			<p>注文登録</p>
		</div>
		<div class="back">
			<p><?php echo Html::anchor('index.php/controlsystem/top','戻る') ?></p>
		</div>
	</div>
	<div class="content">
		<div class="content_left">
			<div class="content_left_top">
				<div class="item_search">
					<from>
						<p><b>商品検索</b></p>
						<p>
						<input type="radio"  name="category" value="pizza"><label for="pizza">ピザ</label>
						<input type="radio"  name="category" value="drink"><label for="drank">ドリンク</label>
						<input type="radio"  name="category" value="side"><label for="side">サイド</label>
						</p>
					</form>
				</div>
			</div>
			<div class="content_left_bottom">
				<div class="item_view">
					<table border="1">
						<thead class="view_table_head">
							<tr>
								<th class="view">商品名</th>
							</tr>
						</thead>
						<tbody class="view_table_scroll">
							<?php foreach($item_list as $item){
									$class = "item ";
									switch($item['category']){
										case 'ピザ':$class .= 'pizza '; break;
										case 'ドリンク':$class .=  'drink '; break;
										case 'サイド':$class .=  'side '; break;
									}
									echo "<tr class='$class' id='$item->id'><td>$item->name</td></tr>";
							}?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="content_right">
			<div class="content_right_top">
				<div class="item_add">
					<p>商品名<span class="slct-item-name"></span>
					<from>
						<p>サイズ
							<span>
								<input type="radio" id="s" name="size" value="s" checked><label for="s">S</label>
								<input type="radio" id="m" name="size" value="m"><label for="m">M</label>
								<input type="radio" id="l" name="size" value="l"><label for="l">L</label>
							</span>
						</p>
						<p>数量
							<span>
								<input type="radio" id='num-1' name="num" value="1" checked><label for="num-1">1</label>
								<input type="radio" id='num-2' name="num" value="2"><label for="num-2">2</label>
								<input type="radio" id='num-3' name="num" value="3"><label for="num-3">3</label>
								<input type="radio" id='num-4' name="num" value="4"><label for="num-4">4</label>
								<input type="radio" id='num-5' name="num" value="5"><label for="num-5">5</label>
							</span>
						</p>
						<input type="button" value="カートに追加" class="cartin-btn">
					</form>
				</div>
			</div>
			<div class="content_right_center">
				<div class="cart">
					<p>カート</P>
						<table class="order_table"  border="1">
							<thead class="order_table_head">
								<tr>
									<th id="number">&nbsp;</th>
									<th id="item_name">商品名</th>
									<th>個数</th>
									<th>サイズ</th>
									<th>&nbsp;&nbsp;</th>
								</tr>
							</thead>
							<tbody class="order_table_scroll">

							</tbody>
						</table>
				</div>
			</div>
			<div class="content_right_bottom">
				<?php echo Form::Open('index.php/controlsystem/order/cfm'); ?>
				<?php echo Form::Button('button','確認'); ?>
				<?php echo Form::Close();?>
			</div>
		</div>
	</div>
	<div id="msg"></div>
	<?php echo Asset::js('jquery-1.11.3.min.js')?>
	<script type="text/javascript">
		var baseurl = <?php echo "\"http://$_SERVER[SERVER_ADDR]/mtpizza/public/index.php/\"" ?>;
	</script>
	<?php echo Asset::js('controlsystem/content/order1.js')?>
</body>
</html>
