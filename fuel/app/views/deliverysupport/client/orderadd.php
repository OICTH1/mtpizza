注文情報のバーコードをカメラで撮影してください
<br>
<input type="file" id='select_image' value="" accept="image/*;capture=camera">
<br>
<button type="button" name="button">読み込み</button>
<br>
<canvas id="qr-canvas" width="480" height="600"></canvas>
<?php

        echo Asset::js('deliverysupport/qr/grid.js');
         echo Asset::js('deliverysupport/qr/version.js');
         echo Asset::js('deliverysupport/qr/detector.js');
         echo Asset::js('deliverysupport/qr/formatinf.js');
         echo Asset::js('deliverysupport/qr/errorlevel.js');
         echo Asset::js('deliverysupport/qr/bitmat.js');
         echo Asset::js('deliverysupport/qr/datablock.js');
         echo Asset::js('deliverysupport/qr/bmparser.js');
         echo Asset::js('deliverysupport/qr/datamask.js');
         echo Asset::js('deliverysupport/qr/rsdecoder.js');
         echo Asset::js('deliverysupport/qr/gf256poly.js');
         echo Asset::js('deliverysupport/qr/gf256.js');
         echo Asset::js('deliverysupport/qr/decoder.js');
         echo Asset::js('deliverysupport/qr/QRCode.js');
         echo Asset::js('deliverysupport/qr/findpat.js');
         echo Asset::js('deliverysupport/qr/alignpat.js');
         echo Asset::js('deliverysupport/qr/databr.js');
         echo Asset::js('deliverysupport/client/add.js');
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
