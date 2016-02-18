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
        <style media="screen">
            a {
                text-decoration: none;
                color: black;
            }
        </style>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <header>
            <h1><?php echo $title ?></h1>
            <nav>
                <ul>
                    <li><?php echo Html::anchor('deliverysupport/client','一覧') ?></li>
                    <li><?php echo Html::anchor('deliverysupport/client/add','追加') ?></li>
                    <li><?php echo Html::anchor('deliverysupport/client/move','移動') ?></li>
                </ul>
            </nav>
        </header>
        <section>
            <?php echo $content ?>
        </section>
    </body>
</html>
