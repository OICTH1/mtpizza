<?php

class Controller_Deliverysupport_Client_Auth extends Controller_Template
{
    public $template = 'deliverysupport/template/client';
    const LOGIN = 'login';

    public function action_index(){
        if(isset($_POST['input_staffNo'])){
                $staffNo = $_POST['input_staffNo'];
                if(!empty($staff = Model_Staff::isExist($staffNo))){
                    Session::set(self::LOGIN,$staff->id);
                    return Response::redirect('deliverysupport/client');
                } else {
                    $this->template->title = 'ログイン';
                    $this->template->content = View::forge('deliverysupport/client/login_error');
                }
        } else {
            $this->template->title = 'ログイン';
            $this->template->content = View::forge('deliverysupport/client/login');
        }
    }
}
 ?>