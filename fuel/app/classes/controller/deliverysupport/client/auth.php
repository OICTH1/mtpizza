<?php

class Controller_Deliverysupport_Client_Auth extends Controller_Template
{
    public $template = 'deliverysupport/template/client';
    const LOGIN = 'login';

    public function action_index(){
        if(isset($_POST['input_staffNo'])){
                $staff_id = $_POST['input_staffNo'];
                if(!empty($staff = Model_Staff::isExist($staff_id))){
                    Session::set(self::LOGIN,$staff->id);
                    /*$this->template->title = 'ログイン';
                    $this->template->content = Session::get(self::LOGIN);
                    return 1;*/Response::redirect('deliverysupport/client');
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
