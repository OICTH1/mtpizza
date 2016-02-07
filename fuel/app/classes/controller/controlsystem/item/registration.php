<?php

class Controller_Controlsystem_Item_registration extends Controller
{
  public function action_index()
  {
    return View::forge('controlsystem/item/registration');
  }
  public function action_commit()
  {
    $item = new Model_Item();
    $item->name = $_POST['item_name'];
    $item->phonetic = $_POST['phonetic'];
    $item->category = $_POST['category'];
    if($_POST['category'] == 'ピザ')
    {
      $item->unit_price_s = $_POST['s_money'];
      $item->unit_price_m = $_POST['m_money'];
      $item->unit_price_l = $_POST['l_money'];
    }
    else
    {
      $item->unit_price = $_POST['money'];
    }
    $item->explanatory = $_POST['explanation'];

    $item_img = new Model_Itemimg();

    // 初期設定
    $config = array(
      'path' => DOCROOT.DS.'assets/img',
      'randomize' => true,
      'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
    );

    // アップロード基本プロセス実行
    Upload::process($config);

    // 検証
    if (Upload::is_valid())
    {
      // 設定を元に保存
      Upload::save();
      $uploadfile = Upload::get_files(0);
      // 情報をデータベースに保存する場合
      $item_img->path = $uploadfile["name"];
    }
    foreach (Upload::get_errors() as $file)
       {
           // $file['errors']の中にエラーが入っているのでそれを処理
       }
    $item_img->save();
    $item->img_id = $item_img->id;
    $item->save();


    return View::forge('controlsystem/top');
  }
}

?>
