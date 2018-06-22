<?php
namespace Mini\Model;
use Mini\Core\Model;

class Venta extends Model{
    private $id;
    private $usuario;
    private $cantidad;
    private $duracion;
    private $fechaFin;
    private $total;
    private $fecha;
    private $estado;
    private $beneficiario;

    public function __SET($attr, $valor){
        $this->$attr = $valor;
    }
    public function __GET($attr){
        return $this->$attr;
    }
    
    public function validarVenta(){
        $sql ="SELECT * FROM comprobanteservicio WHERE idPersona = ? and estadoVenta = 'Activa'";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->usuario);
        $query->execute();
        if($query->fetchColumn() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    public function registrar(){
        if ($this->beneficiario == 0){
            $this->beneficiario = Null;
        }
        $sql = "CALL SP_insertarVenta(?,?,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->cantidad);
        $query->bindParam(2, $this->fechaFin);
        $query->bindParam(3, $this->total);
        $query->bindParam(4, $this->fecha);
        $query->bindParam(5, $this->usuario);
        $query->bindParam(6, $this->beneficiario);
        return $query->execute();
    }

    public function maxId(){
        $sql ="CALL SP_maxIdVenta";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    public function registrarDetalle($idVenta, $idHorario){
        $sql = "CALL SP_registrarDetalleVenta(?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $idHorario);
        $query->bindParam(2, $idVenta);
        return $query->execute();
    }

    public function listar(){
        $sql = "CALL SP_listarVenta";
        $query = $this->db->prepare($sql);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetchAll();
    }

    public function listarPorEstado($estado){
        $sql = "CALL SP_listarCeV(?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$estado);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetchAll();
    }

    public function consultarDatosMembresia($idMem){
        $sql = "CALL SP_consultarDatosMembresia(?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $idMem);
        $query->execute();
        return $query->fetch();
    }

    public function cambiarEstado(){
        $sql = "CALL SP_ceVenta(?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->estado);
        $query->bindParam(2, $this->id);
        return  $query->execute();
    }  

    public function cambiarEstadoVenta($id){
        $sql = "UPDATE comprobanteservicio SET estadoVenta = 'Finalizado' WHERE idcomprobanteServicio = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $id);
        return  $query->execute();
    }
    //PDF TODAS LAS VENTAS
    public function listarV(){
        $sql = "SELECT per.documento doc, per.primerNombre pn, per.segundoNombre sn, per.primerApellido pa,
         per.segundoApellido sa, m.nombreMembresia mem ,m.cantidad cant, t.valor valor, cs.fechaVenta venta,
          cs.fechaFin final,cs.total total, cs.estadoVenta estado FROM comprobanteservicio cs 
          join horarioventa hv on cs.idcomprobanteServicio = hv.idcomprobante 
          join planeshorario ph on hv.idplanesHorario = ph.idplanesHorario 
          join membresia m on m.idMembresia= ph.idMembresia 
          join tarifas t on t.idtarifas = m.idtarifas 
          join tipomembresia tm on tm.idtipoMembresia = m.idtipoMembresia 
          join persona per on per.idusuario = cs.idPersona";
        $query = $this->db->prepare($sql);
        $query->execute();
        //para capturar lo que nos devuelve
        return $query->fetchAll();
    }
}
?>