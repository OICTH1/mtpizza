
function getCurrentPosition(){
    var result;
    if( navigator.geolocation ){
	    navigator.geolocation.getCurrentPosition(function(position){
            result = {
                'lat':position.coords.latitude,
                'long':position.coords.longitude
            }
        },
        function(){
            console.log('error');
        });
    } else {
        alert( "あなたの端末では、現在位置を取得できません。" ) ;
    }
    console.log(result);
    return result;
}
