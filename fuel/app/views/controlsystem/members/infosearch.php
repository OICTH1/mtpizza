<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php echo Asset::css("controlsystem/k_infosearch.css"); ?>
    <?php echo Asset::js("jquery-1.11.3.min.js"); ?>
    <?php echo Asset::js("jquery.qrcode.min.js"); ?>
    <title>会員検索</title>
    <script type="text/javascript">
    $(function() {
        updateMembers();
        $('.submit').click(function(){
            updateMembers();
        });
    });
    function updateMembers(){
        $.ajax({
                type: "POST",
                url: "msearch/msearch.json",
                dataType : 'json',
                data:"name="+$("#form_name").val() + "&postalcode="+$("#form_postalcode").val()
                      + "&tel="+$("#form_tel").val() + "&mailaddress="+$("#form_mailaddress").val(),
                success: function( res )
                {
                  console.log(res);
                  $('#m_result').find("tr:gt(0)").remove();
                  var template = document.querySelector('#member');

                    Object.keys(res).forEach(function(key){
                      var clone = template.content.cloneNode(true);
                      var cells = clone.querySelectorAll('td');
                      cells[0].textContent = res[key].name;
                      cells[1].textContent = res[key].tel;
                      cells[2].textContent = res[key].address;
                      cells[3].innerHTML = "<a href=/controlsystem/members/history/index/"+res[key].id+">注文履歴</a>";
                      template.parentNode.appendChild(clone);
                    });
                },
                error: function(res)
                {
                  $('#member').find("tr:gt(0)").remove();
                }
            });
    }
    </script>
  </head>
  <body>
    <div class="header">
      <div class="title">
        <p>会員検索</p>
      </div>
      <div class="back">
        <p><?php echo Html::anchor('index.php/controlsystem/top','戻る') ?></p>
      </div>
    </div>
    <div class="content">
      <div class="content_top">
        <!-- 検索条件 -->
        <div class="search">
          <p><h2>検索条件</h2></p>
          <?php Form::open(array('action' => '', 'method' => 'post')); ?>
            <table>
              <tr>
                <td>名前</td>
                <td><?php echo Form::input('name', ''); ?></td>
              </tr>
              <tr>
                <td>郵便番号</td>
                <td><?php echo Form::input('postalcode', ''); ?></td>
              </tr>
              <tr>
                <td>電話番号</td>
                <td><?php echo Form::input('tel', ''); ?></td>
              </tr>
              <tr>
                <td>メールアドレス</td>
                <td><?php echo Form::input('mailaddress', ''); ?></td>
              </tr>
            </table>
            <p><?php echo Form::submit('search', '検索', array('class'=>'submit')); ?></p>
          <?php Form::Close(); ?>
          </div>
          <div style="clear:both">
        </div>
      </div>
      <div class="content_bottom">
        <div class="result">
          <!--<?php echo Form::Open(array('action' => 'index.php/members/history', 'method' => 'post')); ?>-->
          <table id="m_result" rules="rows" cellpadding="10">
            <thead class="table_head">
              <tr>
                <th>氏名</th>
                <th>電話番号</th>
                <th id="address">住所</th>
                <th id="detail">&nbsp</th>
              </tr>
            </thead>
            <tbody class="table_scroll">
              <template id="member">
              <tr id="m_view">
    						<td id="m_name"></td>
    						<td></td>
    						<td></td>
    						<td id="historylink">

                </td>
    					</tr>
            </templaste>
            </tbody>
          </table>
          <!--<?php echo Form::Close();?>-->
        </div>
      </div>
    </div>
  </body>
</html>
