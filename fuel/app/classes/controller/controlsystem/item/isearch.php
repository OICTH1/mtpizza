<?php
class Controller_Controlsystem_Item_Isearch extends \Fuel\Core\Controller_Rest
{
  public function post_isearch()
  {
    $data = array(
      'item_name' => $_POST['name'],
      'category' => $_POST['category'],
    );

    if($data['item_name'] != "")
    {
      $result = Model_Item::find('all',array(
                                    'where' => array(
                                      array('name','like',"%".$data['item_name']."%")
                                    ),
                                  ));
    }

    $result = Model_Item::find('all');

    return $result;
  }
}
?>
