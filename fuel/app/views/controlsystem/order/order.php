<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ピザ注文</title>
	<?php echo Asset::css("controlsystem/pizza_order.css"); ?>
</head>
<body>
	<div class="header">
		<div class="title">
			<p>注文登録</p>
		</div>
		<div class="back">
			<p><?php echo Html::anchor('index.php/controlsystem/top','戻る') ?></p>
		</div>
		<div style="clear :both;"></div>
	</div>
	<div class="content">
		<div class="content_top">
			<div class="content_top_top">
					<table class="order_table"  border="1">
						<thead class="order_table_head">
							<tr>
								<th id="number">No.</th>
								<th id="item_name">商品名</th>
								<th>個数</th>
								<th>単価</th>
								<th>小計</th>
							</tr>
						</thead>
						<tbody class="order_table_scroll">
							<tr class="tr0">
								<td class="number"></td>
								<td class="item_name"></td>
								<td class="num"></td>
								<td class="unit_price"></td>
								<td class="sum_price"></td>
							</tr>
							<tr class="tr1">
								<td class="number"></td>
								<td class="item_name"></td>
								<td class="num"></td>
								<td class="unit_price"></td>
								<td class="sum_price"></td>
							</tr>
							<tr class="tr2">
								<td class="number"></td>
								<td class="item_name"></td>
								<td class="num"></td>
								<td class="unit_price"></td>
								<td class="sum_price"></td>
							</tr>
							<tr class="tr3">
								<td class="number"></td>
								<td class="item_name"></td>
								<td class="num"></td>
								<td class="unit_price"></td>
								<td class="sum_price"></td>
							</tr>
							<tr class="tr4">
								<td class="number"></td>
								<td class="item_name"></td>
								<td class="num"></td>
								<td class="unit_price"></td>
								<td class="sum_price"></td>
							</tr>
						</tbody>
					</table>
				<div class="content_top_right">
					<div class="upscroll">
					</div>
					<div class="downscroll">
				</div>
				</div>
			</div>
			<div class="content_top_bottom">
					<table class="sum_table" border="1">
						<tbody class="sum_table_body">
							<tr class="sumpricetr">
								<th>選択商品</th>
								<td class="selectitem"></td>
								<th>合計金額</th>
								<td class="sumpricetd"></td>
							</tr>
							<tr>
								<th>選択個数</th>
								<td class="selectnum"></td>
							</tr>
						</tbody>
					</table>
			</div>
		</div>
		<div class="content_center">
			<form class="item_title_form">
				<label class="item_title_label"><input type="radio" name="c" value="pizza" class="item_title" checked="checked">ピザ
				</label>
				<label class="item_title_label"><input type="radio" name="c" value="side" class="item_title">サイド
				</label>
				<label class="item_title_label"><input type="radio" name="c" value="drink" class="item_title">ドリンク
				</label>
			</form>
			<div style="clear :both;"></div>
		</div>
		<div class="content_bottom">
			<div class="content_bottom_left">
				<form class="indexlist_form">
				<label class="indexlist" id='a'><input type="radio" name="index" value="a" class="indexlist_item" checked="checked">あ</label><br>
				<label class="indexlist" id='k'><input type="radio" name="index" value="k" class="indexlist_item">か</label><br>
				<label class="indexlist" id='s'><input type="radio" name="index" value="s" class="indexlist_item">さ</label><br>
				<label class="indexlist" id='t'><input type="radio" name="index" value="t" class="indexlist_item">た</label><br>
				<label class="indexlist" id='n'><input type="radio" name="index" value="n" class="indexlist_item">な</label><br>
				<label class="indexlist" id='h'><input type="radio" name="index" value="h" class="indexlist_item">は</label><br>
				<label class="indexlist" id='m'><input type="radio" name="index" value="m" class="indexlist_item">ま</label><br>
				<label class="indexlist" id='y'><input type="radio" name="index" value="y" class="indexlist_item">や</label><br>
				<label class="indexlist" id='r'><input type="radio" name="index" value="r" class="indexlist_item">ら</label><br>
				<label class="indexlist" id='w'><input type="radio" name="index" value="w" class="indexlist_item">わ</label><br>
			</form>
			</div>
			<div class="content_bottom_center">
				<div class="viewlist">
				</div>
			</div>
			<div class="content_bottom_right">
				<div class="content_bottom_right_top">
					<div class="numbox">
						<div class="numboxrow">
							<div class="numbutton" id='7'>7</div>
							<div class="numbutton" id='8'>8</div>
							<div class="numbutton" id='9'>9</div>
						</div>
						<div class="numboxrow">
							<div class="numbutton" id='4'>4</div>
							<div class="numbutton" id='5'>5</div>
							<div class="numbutton" id='6'>6</div>
						</div>
						<div class="numboxrow">
							<div class="numbutton" id='1'>1</div>
							<div class="numbutton" id='2'>2</div>
							<div class="numbutton" id='3'>3</div>
						</div>
						<div class="numboxrow">
							<div class="numbutton" id='delete'>削除</div>
							<div class="numbutton" id='0'>0</div>
							<div class="numbutton" id='decision'>追加</div>
						</div>
						<div style="clear:both;"></div>
					</div>
				</div>
				<div class="content_bottom_right_bottom">
					<div class="commit">
						<?php echo Form::Open('index.php/controlsystem/order/cfm'); ?>
						<?php echo Form::Button('button','確認'); ?>
						<?php echo Form::Close();?>
					</div>
				</div>
			</div>
		</div>
	<div id="msg"></div>
	<?php echo Asset::js('jquery-1.11.3.min.js')?>
	<script type="text/javascript">
		var baseurl = <?php echo "\"http://$_SERVER[SERVER_ADDR]//mtpizza/public/index.php/\"" ?>;
	</script>
	<?php echo Asset::js('controlsystem/content/order.js')?>
</body>
</html>
