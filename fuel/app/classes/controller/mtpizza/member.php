<?php

class Controller_Mtpizza_Member Extends Controller_Mtpizza_Page
{
    public function before(){
            parent::before();
          if(empty(\Session::get(self::SESSION_KEY_USER_ID))){
            return Response::redirect('mtpizza/auth');
          }
    }
    public function action_index(){
        $user_id = \Session::get(self::SESSION_KEY_USER_ID);
        $data['user'] = Model_Member::find($user_id);
        $this->template->content = View::forge('website/content/memberinfo',$data);
    }

    public function action_edit(){
        $user_id = \Session::get(self::SESSION_KEY_USER_ID);
        $data['user'] = Model_Member::find($user_id);
        $this->template->content = View::forge('website/content/membermodify',$data);
    }

    public function action_editcommit(){
        $user_id = \Session::get(self::SESSION_KEY_USER_ID);
        $user = Model_Member::find($user_id);
        $keys = array(
            'name' => $_POST['name'],
            'phonetic' => $_POST['kana'],
            'postalcode' => $_POST['postal'],
            'address'=> $_POST['address1'] . $_POST['address2'],
            'mailaddress' => $_POST['mail'],
            'tel' => $_POST['phone'],
            'password' => $_POST['pass2'],
        );
        foreach ($keys as $key => $value) {
            if($value != ''){

                $user[$key] = $value;
            }
        }
        $user->save();

        //$this->template->content = var_dump($_POST);
        return Response::redirect('mtpizza/member');
    }

    public function action_history()
    {
        $user_id = \Session::get(self::SESSION_KEY_USER_ID);
        $data['orders'] = Model_Order::query()->where('member_id',$user_id)->order_by('order_date','desc')->get();
        $this->template->content = View::forge('website/content/orderlog',$data);
    }


    public function action_new(){
        $this->template->content = View::forge('website/content/newmember');
    }
}
