// キャンバスの要素を取得する
var canvas = document.getElementById( 'map-canvas' ) ;
var getPostion = function (staff_id,callback) {
    $.post('api/getPostion.json',{staff_id:staff_id},function(latlng){
        callback(latlng);
    });
};

getPostion(staff_id,function(latlng){
    console.log(latlng);
    // 地図のオプションを設定する
    var mapOptions = {
        zoom: 15 ,				// ズーム値
        //scrollwheel:false,
        draggable:false,
        center: new google.maps.LatLng(latlng.lat , latlng.long) ,		// 中心座標 [latlng]
    };

    // [canvas]に、[mapOptions]の内容の、地図のインスタンス([map])を作成する
    var map = new google.maps.Map( canvas , mapOptions ) ;

    // マーカーのインスタンスを作成する
    var marker = new google.maps.Marker({
        map: map ,
        position: new google.maps.LatLng( latlng.lat , latlng.long ) ,
    }) ;
    setInterval(function(){
        console.log('hpge');
        getPostion(staff_id,function(latlng){
            var ll = new google.maps.LatLng( latlng.lat , latlng.long );
            marker.setPosition(ll);
            map.panTo(ll);
        });
    }, 100);
});
