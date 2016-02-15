<?php

class Controller_Mtpizza Extends Controller_Mtpizza_Page
{
    public function action_index()
    {
        $this->template->content = View::forge('website/content/top');
    }
}
