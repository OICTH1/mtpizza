<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>商品登録</title>
    <?php echo Asset::css("controlsystem/item_registration.css"); ?>
    <?php echo Asset::js('jquery-1.11.3.min.js')?>
  </head>
  <body>
    <div class="content">
        <?php echo Form::Open(array('enctype'=>'multipart/form-data','action'=>'index.php/controlsystem/item/registration/commit','method'=>'POST')) ?>
          <p><label>商品名<input id="item_name" type="textbox" name="item_name"></label></p>
          <p><label>フリガナ<input id="phonetic" type="textbox" name="phonetic"></labbel></p>
          <p><label>単価<input id="price" type="textbox" name="money">円</label></p>
          <p>カテゴリー
            <label><input id="category" type="checkbox" name="cagegory" value="ピザ">ピザ</label>
            <label><input id="category" type="checkbox" name="category" value="サイド">サイド</label>
            <label><input id="category" type="checkbox" name="category" value="ドリンク">ドリンク</label>
          </p>
          <p>サイズ単価
            <label>S
              <input id="s_price" type="textbox" name="s_money">円</label>
            <label>M
              <input id="m_price" type="textbox" name="m_money">円</label>
            <label>L
              <input id="l_price" type="textbox" name="l_money">円</label>
          </p>
          <p><label>商品説明<br>
            <textarea id="explanation" name="explanation" rows="6" cols="60"></textarea></label>
          </p>
          <p><label>画像ファイル<input type="file" name="upload_file"></label></p>
          <p><input id="registration" type="submit" value="登録"></p>
        <?php echo Form::Close() ?>
    </div>
  </body>
</html>
