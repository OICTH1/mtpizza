<?php

class Controller_Mtpizza_Pizzadoko extends Controller_Mtpizza_Page
{
    public function before(){
        parent::before();
          if(empty(\Session::get(self::SESSION_KEY_USER_ID))){
            //return Response::redirect('mtpizza/auth');
          }
    }

    public function action_index()
    {
        $user_id = Session::get(self::SESSION_KEY_USER_ID);
        $user_id = 20;
        $order = Model_Order::query()->where('member_id',$user_id)->where('status',false)->order_by('order_date','desc')->get_one();
        $data['staff'] = Model_Staff::getPostion($order->staff_id);
        $data['order'] = Model_Order::getDetail($order->id);
        $this->template->content = /*var_dump(Model_Staff::find($order->staff_id));*/View::forge('website/content/whereismypizza',$data);

    }
}
 ?>
