<?php

class Controller_Mtpizza_Pizzadoko extends Controller_Mtpizza_Page
{
    public function before(){
        parent::before();
          if(empty(\Session::get(self::SESSION_KEY_USER_ID))){
            return Response::redirect('mtpizza/auth');
          }
    }

    public function action_index()
    {
        $user_id = Session::get(self::SESSION_KEY_USER_ID);
        $order = Model_Order::query()->where('member_id',$user_id)->where('status',false)->order_by('order_date','desc')->get_one();
        if(empty($order)){
            return Response::redirect('mtpizza/message/pizadoko');
        } else if(empty($order->staff_id)){
            $data['staff'] = array(
    			'lat' => 135.518526,
    			'long' => 34.663749 
   		);
        } else {
            $data['staff'] = Model_Staff::getPostion($order->staff_id);
        }
        $data['order'] = Model_Order::getDetail($order->id);
        $this->template->content = View::forge('website/content/whereismypizza',$data);

    }
}
 ?>
