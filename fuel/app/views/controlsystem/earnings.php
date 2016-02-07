<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php echo Asset::css("controlsystem/earnings.css"); ?>
        <?php echo Asset::js("jquery-1.11.3.min.js"); ?>
    <title>売上情報</title>
    <script type="text/javascript">
      $(function(){
        $('.submit').click(function(){
          updateEarnings();
        });
      });
      function updateEarnings(){
          var categorys = [];
          $("#category:checked").map(function(){
                categorys.push($(this).parent('label').text());
          });
          var start = $("#s_year").val() + $("#s_month").val() + $("#s_day").val();
          var end = $("#e_year").val() + $("#e_month").val() + $("#e_day").val();
          var data = {
            s_period: start,
            e_period: end,
            category: categorys,
            item_name: $("#item_name").val(),
          }
          //console.debug(data);
          $.post("search/search.json",data,function(res){
            console.log(res);
            $('#earningsresult').find("tr:gt(0)").remove();
            var template = document.querySelector('#earnings');

              Object.keys(res).forEach(function(key){
                var clone = template.content.cloneNode(true);
                var cells = clone.querySelectorAll('td');
                cells[0].textContent = res[key].date.substr(0,10);
                cells[1].textContent = res[key].item_name;
                cells[2].textContent = res[key].size;
                cells[3].textContent = res[key].num;
                cells[4].textContent = res[key].unit_price * res[key].num;
                template.parentNode.appendChild(clone);
              });
          });
      }
    </script>
  </head>
  <body>
    <div class="header">
      <div class="title">
        <p>売上情報</p>
      </div>
      <div class="back">
        <p><?php echo Html::anchor('index.php/controlsystem/top','戻る') ?></p>
      </div>
    </div>
    <div class="content">
      <div class="content_top">
        <div class="search_condition">
          <div class="heading">
            検索条件
          </div>
          <div class="period">
            <p>期間選択</p>
            <label><input type="textbox" name="s_year" id="s_year">年</label>
            <label><input type="textbox" name="s_month" id="s_month">月</label>
            <label><input type="textbox" name="s_day" id="s_day">日</label>
            〜
            <label><input type="textbox" name="e_year" id="e_year">年</label>
            <label><input type="textbox" name="e_month" id="e_month">月</label>
            <label><input type="textbox" name="e_day" id="e_day">日</label>
          </div>
          <div class="category">
            <p>カテゴリー</p>
            <label><input type="checkbox" id="category" value="pizza">ピザ</label>
            <label><input type="checkbox" id="category" value="side">サイド</label>
            <label><input type="checkbox" id="category" value="drink">ドリンク</label>
          </div>
          <div class="item_name">
            <p>商品名</p><input type="textbox" id="item_name">
          </div>
          <input type="button" class="submit" value="検索">
        </div>
      </div>
      <div class="content_bottom">
        <div class="result">
          <table id="earningsresult" rules="rows" cellpadding="10">
            <thead class="table_head">
              <tr>
                <th id="day">日付</th>
                <th>商品名</th>
                <th id="size">サイズ</th>
                <th id="num">個数</th>
                <th id="total">金額</th>
              </tr>
            </thead>
            <tbody class="table_scroll">
              <template id="earnings">
              <tr>
    						<td id="day"></td>
    						<td></td>
    						<td id="size"></td>
    						<td id="num"></td>
                <td id="total"></td>
    					</tr>
            </templaste>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
