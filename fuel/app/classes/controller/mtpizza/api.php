<?php

class Controller_Mtpizza_Api extends Controller_Rest
{
    public function post_getPostion()
    {
        $staff_id = $_POST['staff_id'];
        $staff = Model_Staff::find($staff_id);
        return array(
            'lat' => $staff->lat,
            'long' => $staff->long
        );
    }
}

 ?>
