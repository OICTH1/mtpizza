注文情報のバーコードをカメラで撮影してください
<br>
<input type="file" id='select_image' value="" accept="image/*;capture=camera">
<br>
<button type="button" name="button">読み込み</button>
<br>
<canvas id="qr-canvas" width="480" height="600"></canvas>
<?php
    echo Asset::js(array(
        'deliverysupprt/qr/grid.js',
         'deliverysupprt/qr/version.js',
         'deliverysupprt/qr/detector.js',
         'deliverysupprt/qr/formatinf.js',
         'deliverysupprt/qr/errorlevel.js',
         'deliverysupprt/qr/bitmat.js',
         'deliverysupprt/qr/datablock.js',
         'deliverysupprt/qr/bmparser.js',
         'deliverysupprt/qr/datamask.js',
         'deliverysupprt/qr/rsdecoder.js',
         'deliverysupprt/qr/gf256poly.js',
         'deliverysupprt/qr/gf256.js',
         'deliverysupprt/qr/decoder.js',
         'deliverysupprt/qr/QRCode.js',
         'deliverysupprt/qr/findpat.js',
         'deliverysupprt/qr/alignpat.js',
         'deliverysupprt/qr/databr.js',
         '/client/add.js'
    ));
 ?>
 <script type="text/javascript">
        $('#select_image').change(renderImage);
        qrcode.callback = function(result) {
            if(isFinite(0+result)){
                var order_id = 0+result;
                var url = '/deliverysupport/api/addOrder';
                var data = {order_id:order_id};
                $.post(url,data,function(res){
                    alert('注文番号:'+ order_id + 'を追加しました。');
                });
            } else {
                alert('間違ったQRコードです。');
            }
        }
        $('button').click(function(){
            qrcode.decode();
        });
 </script>
 <script type="text/javascript">
    //デバッグ用
    (function(i){
            var order_id = i;
            var url = '/mtpizza/deliverysupport/api/addOrder';
            var data = {order_id:order_id};

            $.post(url,data,function(res){
                alert('注文番号:'+ order_id + 'の配達が完了しました。');
                console.log(res);
                (function(i){
                        var order_id = i;
                        var url = '/mtpizza/deliverysupport/api/addOrder';
                        var data = {order_id:order_id};

                        $.post(url,data,function(res){
                            alert('注文番号:'+ order_id + 'の配達が完了しました。');
                            console.log(res);
                            (function(i){
                                    var order_id = i;
                                    var url = '/mtpizza/deliverysupport/api/addOrder';
                                    var data = {order_id:order_id};

                                    $.post(url,data,function(res){
                                        alert('注文番号:'+ order_id + 'の配達が完了しました。');
                                        console.log(res);
                                    });
                            })(8);
                        });
                })(7);
            });
    })(1);


 </script>
