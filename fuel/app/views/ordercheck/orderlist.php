<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <?php echo Asset::css('ordercheck/content/orderlist.css')?>
    </head>
    <body>
        <div class="">
            <h2>注文一覧</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th><th>注文日時</th><th>&nbsp;</th>
                    </tr>
                </thead>
                        <template id="order-template">
                            <tr class='order'><td id='idx'></td><td id='date'></td><td><div class="print-btn"><a id='link' href="">印刷する</a></div></td></tr>
                        </template>
                <tbody>
                </tbody>
            </table>
        </div>
        <?php echo Asset::js('jquery-1.11.3.min.js')?>
        <?php echo Asset::js('ordercheck/orderlist.js')?>
    </body>
</html>
