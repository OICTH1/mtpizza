<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php echo Asset::css('website/content/all.css');?>
    <?php echo Asset::js('website/content/jquery/jquery.js')?>
    <?php echo Asset::css('website/header.css');?>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style media="screen">
    #logo{
        background-image: url(<?php echo Asset::get_file('website/logo.png', 'img');?>);
        background-size: contain;
    }

    .wallpaper{
        width: 100%;
        height: 100%;
        /*background-image: url(<?php echo Asset::get_file('b.png', 'img');?>);
        background-repeat: space;*/
    }
    </style>
  </head>
  <body>
      <div class="wallpaper">
        <div class="main">
          <header>
            <div class="header-top">
                <div class="navigator">
                  <ul class="navi-list">
                    <li><?php echo Html::anchor('mtpizza/top','TOP',array('class'=>'link'))?></li>
                    <li><?php echo Html::anchor('mtpizza/item/list','メニュー',array('class'=>'link'))?></li>
                    <li><?php echo Html::anchor('mtpizza/message/pizzadoko','ピザどこ？',array('class'=>'link'))?></li>
                  </ul>
                </div>
                <div class="clear">

                </div>
            </div>

            <div class="header-bottom">
                <div class="logo">
                  <?php echo Html::anchor('mtpizza','',array('class'=>'link','id'=>'logo'))?>
                </div>
                <div >

                </div>
                <div class="info-bar">
                <?php if(!$member):?>
                    <div class="info-login info-item">
                      <?php echo Html::anchor('mtpizza/auth','ログイン',array('class'=>'link'))?>
                    </div>
                    <div class="info-signup info-item">
                        <?php echo Html::anchor('mtpizza/newmember','新規登録',array('class'=>'link'))?>
                    </div>
                  <?php else:?>
                  <div class="info-logout">
                    <div >
                        ようこそ
                    </div>
                    <div class="member-bar">
                      <div class="member-name">
                        <?php echo $member['name'] . '様' ?>
                      </div>
                      <div class="logout-btn">
                        <?php echo Html::anchor('mtpizza/auth/logout','ログアウト',array('class'=>'link'))?>
                      </div>
                      <div style="clear:both"></div>
                    </div>
                  </div>
                  <div class="info-memberinfo info-item">
                      <?php echo Html::anchor('mtpizza/member','会員情報',array('class'=>'link'))?>
                  </div>
                  <div class="info-cart info-item">
                      <?php echo Html::anchor('mtpizza/cart','カート',array('class'=>'link'))?>
                  </div>
                 <?php endif;?>
                </div>
            </div>
          </header>

          <div class="inner">
            <?php echo $content ?>
          </div>
        </div>
        </div>
  </body>
</html>
