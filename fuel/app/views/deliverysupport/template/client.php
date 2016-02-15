<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport"
        	content="width=320,
        		height=480,
        		initial-scale=1.0,
        		minimum-scale=1.0,
        		maximum-scale=2.0,
        		user-scalable=yes" />
        <title></title>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript">
            var url = '/DeliverySupport/api/position.json';
            setInterval(function(){
                navigator.geolocation.getCurrentPosition(function(place){
                    var data = {
                        'lat':place.coords.latitude,
                        'long':place.coords.longitude
                    };
                    $.post(url,data,function(result){
                        console.log(result);
                    });
                });
            },2000);
        </script>
    </head>
    <body>
        <header>
            <h1><?php echo $title ?></h1
        </header>
        <section>
            <?php echo $content ?>
        </section>
    </body>
</html>
