<?php

class Controller_Controlsystem_Members_Infosearch extends Controller
{
  public function action_index()
  {
    return Response::forge(View::forge('controlsystem/members/infosearch'));
  }
}

 ?>
