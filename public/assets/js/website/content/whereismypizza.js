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
        scrollwheel:false,
        draggable:false,
        center: new google.maps.LatLng(latlng.long , latlng.lat) ,		// 中心座標 [latlng]
    };

    // [canvas]に、[mapOptions]の内容の、地図のインスタンス([map])を作成する
    var map = new google.maps.Map( canvas , mapOptions ) ;

    // [canvas]に、[mapOptions]の内容の、地図のインスタンス([map])を作成する
    var map = new google.maps.Map( canvas , mapOptions ) ;

    // マーカーのインスタンスは配列で管理しよう
    var markers = [] ;

    // マーカーのインスタンスを作成する
    markers[0] = new google.maps.Marker({
        map: map ,
        position: new google.maps.LatLng( latlng.long , latlng.lat ) ,
    }) ;
    setInterval(function(){
        console.log('hpge');
        getPostion(staff_id,function(latlng){
	    markers[0] = new google.maps.Marker({
       		map: map ,
                position: new google.maps.LatLng( latlng.long , latlng.lat ) ,
            }) ;
        });
    }, 3000);
});
