<?php

/**
 * Class HomeController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

class AdminController
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    //para que no pueda copiar la url e ingresar
    public function __construct(){
         
        //  $_SESSION["instructor"];
        if ((!isset($_SESSION["admin"])) && (!isset($_SESSION["instructor"])) && (!isset($_SESSION["cliente"]))) {
            header("location: ".URL."/Login");
          }
    }
    public function index()
    {
        // load views
        require APP . 'view/_templates/headerAdmin.php';
        require APP . 'view/admin/indexAdmin.php';
        require APP . 'view/_templates/footerAdmin.php';
    }

    /**
     * PAGE: exampleone
     * This method handles what happens when you move to http://yourproject/home/exampleone
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function exampleOne()
    {
        // load views
        require APP . 'view/_templates/headerAdmin.php';
        require APP . 'view/home/example_one.php';
        require APP . 'view/_templates/footerAdmin.php';
    }

    /**
     * PAGE: exampletwo
     * This method handles what happens when you move to http://yourproject/home/exampletwo
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function exampleTwo()
    {
        // load views
        require APP . 'view/_templates/headerAdmin.php';
        require APP . 'view/home/example_two.php';
        require APP . 'view/_templates/footerAdmin.php';
    }
}
