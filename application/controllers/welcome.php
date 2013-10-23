<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("modelo");
    }
	public function index()
	{
		//$this->load->view("inicio");
            $this->load->view('header');
            $this->load->view('content');
            $this->load->view('footer');
	}
        function conectar(){
            $nombre = $this->input->post('nombre');
            $clave = $this->input->post('clave');
            $valor =0;
            $cookie = array('nombre'=>'','permiso'=>'','esta_logeado'=>false);
            if($this->modelo->conectar($nombre,$clave)==1){
                $valor = 1;
                $permiso = $this->modelo->permiso($nombre)->result();
                foreach ($permiso as $fila)
                {
                    $permiso = $fila->perfil;
                }
                $cookie = array('nombre'=>$nombre,'permiso'=>$permiso,'esta_logeado'=>true);
            }
            $this->session->set_userdata($cookie);
            echo json_encode(array("valor"=>$valor,'nombre'=>$nombre));
        }
        function verificaLogin(){
            $valor=0;
            $nombre = '';
            if($this->session->userdata('esta_logeado')==true){
                $valor =1;
                $nombre = $this->session->userdata('nombre');
            }
            $permiso = $this->session->userdata('permiso');
            echo json_encode(array("valor"=>$valor,'nombre'=>$nombre,"permiso"=>$permiso));
        }
        function cargaCategorias(){
            $datos['categorias'] = $this->modelo->cargaCategorias()->result();
            $this->load->view('categorias',$datos);
        }
        function btnGuardar(){
            $codigo = $this->input->post('codigo');
            $nombre = $this->input->post('nombre');
            $marca = $this->input->post('marca');
            $codcategoria = $this->input->post('categoria');
            
            $valor = 1;
            if($this->modelo->guardaProducto($codigo,$nombre,$marca,$codcategoria)==0){
                $valor =0;
            }
            echo json_encode(array("valor"=>$valor));
        }
        function actualizar(){
            $data = $this->modelo->consultaProducto();
            $datos['cantidad'] =  $data->num_rows();
            $datos['productos'] = $data->result();
            $this->load->view('productos',$datos);
        }
        function  cerrarSesion(){
            $this->session->sess_destroy();
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */