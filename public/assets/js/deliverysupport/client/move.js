init();

var lat;
var lng;
var map;
var marker;

function init(){
    lat = 34.663749;
    lng = 135.518526;
    var latlng = new google.maps.LatLng(lat,lng);
    var opts = {
       zoom: 13,
       center: latlng,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     };
     map = new google.maps.Map(document.getElementById("map_canvas"), opts);
     marker = new google.maps.Marker({
         position: latlng,
         map: map
     });
     $('#latval').text(lat);
     $('#lngval').text(lng);
}

$('.move_btn').click(function(){
    var ope = $(this).val();
    if($(this).hasClass('height')){
        lat = lat + (0.001 * ope);
    } else if($(this).hasClass('width')){
        lng = lng + (0.001 * ope);
    }
    $('#latval').text(lat);
    $('#lngval').text(lng);
    var latlng = new google.maps.LatLng(lat, lng);
    marker.setPosition(latlng);
    map.panTo(latlng);
    $.post('/mtpizza/deliverysupport/api/testposition.json',{
        staff_id:1,
        lat:lat,
        lng:lng,
    },function(res){
        console.log(res);
    });
});
