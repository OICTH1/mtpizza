<?php

class Controller_Mtpizza_Pizzadoko extends Controller_Mtpizza_Page
{

    public function action_index()
    {
        $user_id = \Session::get(self::SESSION_KEY_USER_ID);
        $order = Model_Order::find(1);
        $order->staff_id = 1;
        $order->save();
        //return $this->template->content =var_dump($user_id);

        $data['staff']['staff_id'] = $order->staff_id;
        $data['order'] = Model_Order::getDetail($order->id);
        $this->template->content = View::forge('website/content/whereismypizza',$data);

    }

}
 ?>
