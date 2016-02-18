<?php echo Asset::css('deliverysupport/move.css') ?>
<style media="screen">
    #map_move td{
        text-align: center;
    }

    button.move_btn{
        font-size: 24px;
    }
    .width{
        padding: 10px 20px;
    }
    .height{
        padding: 10px 24px;
    }
</style>
<p>
    緯度：<span id="latval"></span><br>経度：<span id="lngval"></span>
</p>
<table id='map_move'>
    <tbody>
        <tr>
            <td></td>
            <td><button type="button" name="button" class='height move_btn' value="1">↑</button></td>
            <td></td>
        </tr>
        <tr>
            <td><button type="button" name="button" class='width move_btn' value="-1">←</button></td>
            <td><div id="map_canvas" style="width:500px; height:300px"></div></td>
            <td><button type="button" name="button" class='width move_btn' value="1">→</button></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="button" name="button" class='height move_btn' value="-1">↓</button></td>
            <td></td>
        </tr>
    </tbody>
</table>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<?php echo Asset::js('deliverysupport/client/move.js') ?>
