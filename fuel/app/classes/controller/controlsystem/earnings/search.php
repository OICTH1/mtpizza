<?php

class Controller_Controlsystem_Earnings_Search extends Fuel\Core\Controller_Rest
{
    public function post_search()
    {

      $where = array();
      $result = DB::query('SELECT * FROM `tbl_item`');
      if(!empty($_POST['s_period']) && !empty($_POST['e_period'])){
          $start = new DateTime($_POST['s_period']);
          $end = new DateTime($_POST['e_period']);
          $start = date('Y-m-d H:i:s',$start->getTimestamp());
          $end = date('Y-m-d H:i:s',$end->getTimestamp());
          $where[] = array(array('date','>=',$start));
          $where[] = array(array('date','<=',$end));
      }
      if(!empty($_POST['category'])){
          $in = array();
          foreach ($_POST['category'] as $value) {
              $in[] = $value;
          }
          $where[] = array(array('category','in',$in));
      }
      if(!empty($_POST['item_name'])){
          $where[] = array(array('item_name','like',"%".$_POST['item_name']."%"));
      }

      //return $_POST;
      //return array(,new DateTime($_POST['e_period']));
      return Model_Earning::find('all',array('where'=>$where));


    }
}
?>
