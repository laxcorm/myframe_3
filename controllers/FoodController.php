<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Food;


class FoodController extends Controller
{
     public function food()
    {
        $food = new Food();

        $this->render('food',['model' => $food]);

    }

}