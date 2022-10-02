<?php

namespace app\controllers;

use app\core\Controller;

class DisplayController extends Controller
{
    public function display()
    {
        # code...
      return  $this->render('display');
    }
}
