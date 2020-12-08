<?php namespace App\Controllers;
	 use App\Models\Usuarios;
	 use App\Models\CrudModel;

class Home extends BaseController
{
	public function index()
	{
		$mensaje = session('mensaje');
		$datos = ['mensaje' => $mensaje];
		return view('login', $datos);
	}

	public function inicioGeneral(){
		$Crud = new CrudModel(); 
		$datos = $Crud->listarCon();
		$data = ["datos"=> $datos];
		return view('inicioGeneral',$data);
	}

	public function login(){

		$usuario = $this->request->getPost('usuario');
		$password = $this->request->getPost('password');
		$Usuario = new Usuarios();

		$datosUsuario = $Usuario->obtenerUsuario(['usuario' => $usuario]);

		if (count($datosUsuario) > 0 && 
			password_verify($password, $datosUsuario[0]['password'])){

			$data = [
						"nombre" => $datosUsuario[0]['nombre'],
						"apellido_paterno" => $datosUsuario[0]['apellido_paterno'],
						"email" => $datosUsuario[0]['email'],
						"usuario" => $datosUsuario[0]['usuario']
						
					];

			$session = session();
			$session->set($data);

			return redirect()->to(base_url('/inicioGeneral'))->with('mensaje', '1');

		}else{
			return redirect()->to(base_url('/'))->with('mensaje', '0');
		}


	}


	  public function salir(){
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('/'));
	}
	  

	  public function crear(){
		$datos = [
			
			"conceptos_Gasto" => $_POST['conceptos_Gasto'],
			"monto" => $_POST['monto'],
			"fecha" => $_POST['fecha'],
		];
	 
		$Crud = new CrudModel();
	  $respuesta = $Crud->insertar($datos);
	 
	  if($respuesta > 0){
		  return redirect()->to(base_url().'/inicioGeneral')->with('mensaje','1');
		 } else {
		  return redirect()->to(base_url().'/inicioGeneral')->with('mensaje','0');
		 }
		 }
		 
		 public function obtenerCon ($idCon) {
			 $data = ["id_con" => $idCon];
			 $Crud = new CrudModel();
			 $respuesta = $Crud->obtenerCon($data);
			 $datos = ["datos" => $respuesta];
			 $Crud = new CrudModel();
	 
			 return view('actualizar', $datos); 
		 }

}
