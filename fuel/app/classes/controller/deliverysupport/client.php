<?php

class Controller_Deliverysupport_Client extends Controller_Template
{
    public $template = 'deliverysupport/template/client';
    const LOGIN = 'login';
    public function before(){
        parent::before();
        if(empty(Session::get(self::LOGIN))){
            return Response::redirect('deliverysupport/client/auth');
        }
    }
    public function action_index(){
        $staff_id = Session::get(self::LOGIN);
        $staff = Model_Staff::find($staff_id);

        $data['deliverylist'] = $staff->getDeliveryList();

        $this->template->title = '配達一覧';
        $this->template->content = View::forge('deliverysupport/client/deliverylist',$data);
    }

    public function action_detail($order_id){
        $data['detail'] = Model_Order::getDetail($order_id);
        $this->template->title = '詳細';
        $this->template->content = View::forge('deliverysupport/client/deliverydetail',$data);

    }

    public function action_add(){
        $this->template->title = '詳細';
        $this->template->content = View::forge('deliverysupport/client/orderadd');
    }

    //test code
    public function action_delete(){
        Session::destroy();
        return Response::redirect('client');
    }
}
 ?>
