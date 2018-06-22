<?php
namespace Mini\Controller;

class AyudasController{
    
    public function __construct(){
        if(!isset($_SESSION['admin'])){
            header("location:".URL."Login");
        }
    }
    
    public function index()
    {
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/Ayudas/index.php';
        include APP.'view/_templates/footerAdmin.php';
    }

    public function mapa()
    {
        include APP.'view/_templates/headerAdmin.php';
        include APP.'view/Ayudas/mapa.php';
        include APP.'view/_templates/footerAdmin.php';
    }
}

    ?>