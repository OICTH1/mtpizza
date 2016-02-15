<?php

class Controller_Website_Top Extends Controller_Website_Page
{
    public function action_index()
    {
      $this->template->content = View::forge('website/content/top');
    }
}

?>
