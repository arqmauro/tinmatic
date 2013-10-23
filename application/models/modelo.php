<?php
class modelo extends CI_Model{
    function conectar($nombre,$clave){
        $this->db->select('*');
        $this->db->where('nombre',$nombre);
        $this->db->where('clave',md5($clave));
        return $this->db->get('usuarios')->num_rows();
    }
    function permiso($nombre){
        $this->db->select('perfil');
        $this->db->where('nombre',$nombre);
        return $this->db->get('usuarios');
    }
            function cargaCategorias(){
        $this->db->select('*');
        return $this->db->get('categorias');
    }
    function guardaProducto($codigo,$nombre,$marca,$codcategoria){
        $this->db->select('codigo');
        $this->db->where('codigo',$codigo);
        $cantidad = $this->db->get('producto')->num_rows();
        if($cantidad == 0):
            $data = array(
                "codigo"=>$codigo,
                "nombre"=>$nombre,
                "marca"=>$marca,
                "codcategoria"=>$codcategoria
            );
            $this->db->insert("producto",$data);
            return 0;
        else:
            return 1;
        endif;
    }
    function consultaProducto(){
        $this->db->select('*');
        return $this->db->get('producto');
    }
}
?>
