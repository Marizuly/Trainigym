<?php

/**
 * Class Songs
 * This is a demo Model class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Model;

use Mini\Core\Model;


class Login extends Model
{ 
    /**
     * Get all songs from database
     */
    private $id;
  

     public function inicioAdmin($correo, $contrasena)
    {
        $sql = "CALL SP_login(:correo, :contrasena)";
        $query = $this->db->prepare($sql);
        $parameters = array(':correo' => $correo, ':contrasena'=> $contrasena);
        $query->execute($parameters);
        return $query->fetch();
    }
    public function consultarEstado($idusuario)
    {
        //SELECT tp.nombre, p.idusuario, p.primerNombre, p.segundoNombre, p.primerApellido, p.segundoApellido, p.fechaNacimiento, g.nombreGenero, p.telefono, p.celular, e.nombreEps, p.estadoCivil, p.correo, p.direccion, pf.nombreRol FROM persona p JOIN tipodocumento tp on p.idtipoDocumento = tp.idtipoDocumento JOIN genero g on p.idgenero = g.idgenero JOIN perfil pf on p.idPerfil= pf.idPerfil JOIN eps e on p.ideps = e.ideps
        $sql = "CALL SP_consultarEstadoI(?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $idusuario);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetch();
    }
  
}