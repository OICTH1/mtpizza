<?php
  class Controller_Controlsystem_Members_Msearch extends \Fuel\Core\Controller_Rest
  {
    public function post_msearch()
    {
      $name = $_POST['name'];
      $postalcode = $_POST['postalcode'];
      $tel = $_POST['tel'];
      $mailaddress = $_POST['mailaddress'];
      $data = array('name' => $name,
                    'postalcode' => $postalcode,
                    'tel' => $tel,
                    'mailaddress' => $mailaddress,);

      if($name != "")
      {
        if($postalcode != "")
        {
          if($tel != "")
          {
            if($mailaddress != "")
            {
              //検索条件にすべて入力されている場合
              $result = Model_Member::find('all',array(
                                                  'where' => array(
                                                    array('name','like',"%".$data['name']."%"),
                                                    array('postalcode','like',"%".$data['postalcode']."%"),
                                                    array('tel','like',"%".$data['tel']."%"),
                                                    array('mailaddress','like',"%".$data['mailaddress']."%")
                                                  ),
                                                ));
            }
            else
            {
              //検索条件がメールアドレス以外入力されている場合
              $result = Model_Member::find('all',array(
                                                  'where' => array(
                                                    array('name','like',"%".$data['name']."%"),
                                                    array('postalcode','like',"%".$data['postalcode']."%"),
                                                    array('tel','like',"%".$data['tel']."%"),
                                                  ),
                                                ));
            }
          }
          else
          {
            if($mailaddress != "")
            {
              //検索条件が電話番号以外入力されている場合
              $result = Model_Member::find('all',array(
                                                  'where' => array(
                                                    array('name','like',"%".$data['name']."%"),
                                                    array('postalcode','like',"%".$data['postalcode']."%"),
                                                    array('mailaddress','like',"%".$data['mailaddress']."%")
                                                  ),
                                                ));
            }
            else
            {
              //検索条件が名前と郵便番号が入力されている場合
              $result = Model_Member::find('all',array(
                                                  'where' => array(
                                                    array('name','like',"%".$data['name']."%"),
                                                    array('postalcode','like',"%".$data['postalcode']."%"),
                                                  ),
                                                ));
            }
          }
        }
        else
        {
          if($tel != "")
          {
            if(mailaddress != "")
            {
              //検索条件が郵便番号以外入力されている場合
              $result = Model_Member::find('all',array(
                                                  'where' => array(
                                                    array('name','like',"%".$data['name']."%"),
                                                    array('tel','like',"%".$data['tel']."%"),
                                                    array('mailaddress','like',"%".$data['mailaddress']."%")
                                                  ),
                                                ));
            }
            else
            {
              //検索条件が名前と電話番号が入力されている場合
              $result = Model_Member::find('all',array(
                                                  'where' => array(
                                                    array('name','like',"%".$data['name']."%"),
                                                    array('tel','like',"%".$data['tel']."%"),
                                                  ),
                                                ));
            }
          }
          else
          {
            if($mailaddress != "")
            {
              //検索条件が名前とメールアドレスが入力されている場合
              $result = Model_Member::find('all',array(
                                                  'where' => array(
                                                    array('name','like',"%".$data['name']."%"),
                                                    array('mailaddress','like',"%".$data['mailaddress']."%")
                                                  ),
                                                ));
            }
            else
            {
              //検索条件が名前だけ入力されている場合
              $result = Model_Member::find('all',array(
                                                  'where' => array(
                                                    array('name','like',"%".$data['name']."%"),
                                                  ),
                                                ));
            }
          }
        }
      }
      else
      {
        if($postalcode != "")
        {
          if($tel != "")
          {
            if($mailaddress != "")
            {
              //検索条件が名前以外入力されている場合
              $result = Model_Member::find('all',array(
                                                  'where' => array(
                                                    array('postalcode','like',"%".$data['postalcode']."%"),
                                                    array('tel','like',"%".$data['tel']."%"),
                                                    array('mailaddress','like',"%".$data['mailaddress']."%")
                                                  ),
                                                ));
            }
            else
            {
              //検索条件が郵便番号と電話番号が入力されている場合
              $result = Model_Member::find('all',array(
                                                  'where' => array(
                                                    array('postalcode','like',"%".$data['postalcode']."%"),
                                                    array('tel','like',"%".$data['tel']."%"),
                                                  ),
                                                ));
            }
          }
          else
          {
            if($mailaddress != "")
            {
              //検索条件が郵便番号とメールアドレスが入力されている場合
              $result = Model_Member::find('all',array(
                                                  'where' => array(
                                                    array('postalcode','like',"%".$data['postalcode']."%"),
                                                    array('mailaddress','like',"%".$data['mailaddress']."%")
                                                  ),
                                                ));
            }
            else
            {
              //検索条件が郵便番号だけ入力されている場合
              $result = Model_Member::find('all',array(
                                                  'where' => array(
                                                    array('postalcode','like',"%".$data['postalcode']."%"),
                                                  ),
                                                ));
            }
          }
        }
        else
        {
          if($tel != "")
          {
            if($mailaddress != "")
            {
              //検索条件が電話番号とメールアドレス入力されている場合
              $result = Model_Member::find('all',array(
                                                  'where' => array(
                                                    array('tel','like',"%".$data['tel']."%"),
                                                    array('mailaddress','like',"%".$data['mailaddress']."%")
                                                  ),
                                                ));
            }
            else
            {
              //検索条件が電話番号だけ入力されている場合
              $result = Model_Member::find('all',array(
                                                  'where' => array(
                                                    array('tel','like',"%".$data['tel']."%")
                                                  ),
                                                ));
            }
          }
          else
          {
            if($mailaddress != "")
            {
              //検索条件がメールアドレスだけ入力されている場合
              $result = Model_Member::find('all',array(
                                                  'where' => array(
                                                    array('mailaddress','like',"%".$data['mailaddress']."%")
                                                  ),
                                                ));
            }
            else
            {
                $result = Model_Member::find('all');
            }
          }
        }

      }

      return $result;
    }
    public function post_history()
    {
      $name = $_POST['name'];

      return $name;
    }
  }

?>
