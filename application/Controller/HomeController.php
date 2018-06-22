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

class HomeController
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function __construct(){
        if(isset($_SESSION['admin'])){
            header("location:".URL."admin");
        }
    }
    
    public function index()
    {
        // load views
        require APP . 'view/_templates/headerHome.php';
        require APP . 'view/home/indexHome.php';
        require APP . 'view/_templates/footerHome.php';
    }

    /**
     * PAGE: exampleone
     * This method handles what happens when you move to http://yourproject/home/exampleone
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
   
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
