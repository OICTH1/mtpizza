<h2>顧客情報</h2>
<ul>
    <li>氏名：<?php echo $detail['customer']['name']?></li>
    <li>電話番号：<?php echo $detail['customer']['tel']?></li>
</ul>
<h2>注文情報</h2>
<table>
    <thead>
        <tr>
            <th>商品名</th>
            <th>サイズ</th>
            <th>数量</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($detail['orderline'] as $orderline): ?>
            <tr>
                <td><?php echo $orderline['name'] ?></td>
                <td><?php echo $orderline['size'] ?></td>
                <td><?php echo $orderline['num'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<h2>配達先住所</h2>
<?php echo $detail['address'] ?>
<button type="button" name="button" id="searchRoot">ルート検索</button>
<div id="map_canvas" style="width: 320px; height: 400px;"></div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=places"></script>
<script type="text/javascript">
    var map;
    var directionsService;
    var directionsDisplay;
    var origin;
    navigator.geolocation.getCurrentPosition(function(place){
        var mapdiv = document.getElementById('map_canvas');
        directionsService = new google.maps.DirectionsService();


        //オプション設定
        var myOptions = {
            zoom: 17,
            center: new google.maps.LatLng(place.coords.latitude,place.coords.longitude),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scaleControl: true,
        };
        origin = new google.maps.LatLng(place.coords.latitude,place.coords.longitude);
        //マップを描画
        map = new google.maps.Map(mapdiv, myOptions);
    });

    var searchbtn =  document.getElementById('searchRoot');
    searchbtn.onclick = function(){
        var address = <?php echo "\"" . $detail['address'] . "\""?>;
        toGeocode(address);
    }

    //住所からジオコードに変換
    function toGeocode(address){
        var service = new google.maps.places.PlacesService(map);
        service.textSearch({query:address},function(results,status){
            var places = results[0];
            var lat = places.geometry.location.lat();
            var lng = places.geometry.location.lng();
            var latlng = new google.maps.LatLng(lat,lng);
            getRoute(origin,latlng);
        });
    }
    function getRoute(origin,destination){
        var request = {
            origin: origin, //入力地点の緯度、経度
            destination: destination, //到着地点の緯度、経度
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        }
        directionsService.route(request,function(result, status){
            toRender(result);
        });
    }
    function toRender(result){
        directionsDisplay = new google.maps.DirectionsRenderer();
        directionsDisplay.setDirections(result); //取得した情報をset
        directionsDisplay.setMap(map); //マップに描画
    }
</script>
