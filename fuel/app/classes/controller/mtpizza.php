<?php

class Controller_Website_Mtpizza Extends Controller
{
    public function action_index()
    {
        $this->template->content = View::forge('website/content/top');
    }
}
