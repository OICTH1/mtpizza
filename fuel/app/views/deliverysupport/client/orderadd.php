注文情報のバーコードをカメラで撮影してください
<br>
<input type="file" id='select_image' value="" accept="image/*;capture=camera">
<br>
<button type="button" name="button">読み込み</button>
<br>
<canvas id="qr-canvas" width="480" height="600"></canvas>
<?php
    echo Asset::js(array(
        '/deliverysupport/qr/grid.js',
         '/deliverysupport/qr/version.js',
         '/deliverysupport/qr/detector.js',
         '/deliverysupport/qr/formatinf.js',
         '/deliverysupport/qr/errorlevel.js',
         '/deliverysupport/qr/bitmat.js',
         '/deliverysupport/qr/datablock.js',
         '/deliverysupport/qr/bmparser.js',
         '/deliverysupport/qr/datamask.js',
         '/deliverysupport/qr/rsdecoder.js',
         '/deliverysupport/qr/gf256poly.js',
         '/deliverysupport/qr/gf256.js',
         '/deliverysupport/qr/decoder.js',
         '/deliverysupport/qr/QRCode.js',
         '/deliverysupport/qr/findpat.js',
         '/deliverysupport/qr/alignpat.js',
         '/deliverysupport/qr/databr.js',
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
