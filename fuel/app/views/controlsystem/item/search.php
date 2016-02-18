<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php echo Asset::css("controlsystem/item_search.css"); ?>
    <?php echo Asset::js('jquery-1.11.3.min.js')?>
    <title>商品検索</title>
    <script>
      $(function(){
        $("#search").click(function(){
          $.ajax({
                  type: "POST",
                  url: "isearch/isearch.json",
                  dataType : 'json',
                  data: 'name='+$("#item_name").val() +
                        '&category='+$("input[name='item']:checked").val(),
                  success: function( res )
                  {
                    console.log(res);
                    $('#item_result').find("tr:gt(0)").remove();
                    var template = document.querySelector('#item_result');

                      Object.keys(res).forEach(function(key){
                        var clone = template.content.cloneNode(true);
                        var cells = clone.querySelectorAll('td');
                        cells[0].textContent = res[key].name;
                        cells[1].textContent = res[key].category;
                        template.parentNode.appendChild(clone);
                      });
                  },
                  error: function(res)
                  {
                    console.log(res);
                  }
                });
        });
      });
    </script>
  </head>
  <body>
    <div class="header">
      <div class="title">
        <p>商品検索</p>
      </div>
      <div class="return">
        <div class="back">
          <p><?php echo Html::anchor('index.php/controlsystem/top','戻る') ?></p>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="content_top">
          <div class="search">
            <form action="" method="">
              <p>検索条件</p>
              <p>商品名<br>フリガナ</p>
              <input type="textbox" id="item_name">
              <p>
                <label><input type="radio" name="item" value="ピザ">ピザ</label>
                <label><input type="radio" name="item" value="サイド">サイド</label>
                <label><input type="radio" name="item" value="ドリンク">ドリンク</label>
              </p>
              <input type="button" value="検索" id="search">
            </form>
          </div>
      </div>
      <div class="content_bottom">
        <div class="result">
          <table  rules="rows" cellpadding="10">
            <thead class="table_head">
              <tr>
                <th id="item_name">商品名</th>
                <th>カテゴリー</th>
              </tr>
            </thead>
            <tbody class="table_scroll">
              <template id="item_result">
                <tr>
                  <td id="item_name"></td>
                  <td></td>
                </tr>
            </template>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
