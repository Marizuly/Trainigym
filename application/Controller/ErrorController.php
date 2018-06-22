<?php

/**
 * Class Error
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

class ErrorController
{
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function __construct(){
        if(!isset($_SESSION['session_username'])){
            header("location:".URL."Login");
        }
    }
    
    public function index()
    {
        // load views
        require APP . 'view/_templates/headerAdmin.php';
        require APP . 'view/error/index.php';
        require APP . 'view/_templates/footerAdmin.php';
    }
}
