<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 29/11/2017
 * Time: 11:09
 */

namespace gui\index\Controllers;

use library\mvc\Controller;
use library\mvc\View;

class sqlcomposante extends Controller
{


    public function index()
    {
        $Vue = new View();
        $Vue->titre = "Sql Composante";

        $Vue->generate();
    }

    public function tree()
    {
        include "models/dataval.php";

        $Comp=new \evalLib\CompEvaluation($LAModel);

       echo json_encode ($Comp->Tree());
    }
}