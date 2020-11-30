<?php namespace App\Controllers;
use App\Models\crudmodel;
class crud extends BaseController
{
	public function index()
	{
		$crud =new crudmodel();
		$datos=$crud->listarNombres();

		$mensaje =session('mensaje');
		$data =[
			"datos"=>$datos,
			"mensaje"=>$mensaje
		];
		return view('listado', $data);
	}


	public function crear(){
		$datos = [
	
	"nombre" => $_POST['nombre'],
	"paterno"=> $_POST['paterno'],
	"materno"=> $_POST['materno']

];

$crud =new crudmodel();
$respuesta = $crud->insertar($datos);
if ($respuesta >0){
return redirect()->to(base_url().'/')->with('mensaje','1');
}else{
	return redirect()->to(base_url().'/')->with('mensaje','0');

}
	}
	public function eliminar($idNombre){

$Crud =new crudmodel();
$data =[ "id_nombre"=>$idNombre];
$respuesta=$Crud->eliminar($data);

if($respuesta){

	return redirect()->to(base_url().'/')->with('mensaje', '4');
}else{
	return redirect()->to(base_url().'/')->with('mensaje', '5');

}


	}

	public function actualizar(){

$datos = [
			"id_nombre" => $_POST['idnombre'],

			"nombre" => $_POST['nombre'],
			"paterno"=> $_POST['paterno'],
			"materno"=> $_POST['materno']
		
		];
        $idnombre =$_POST['idnombre'];
		$Crud =new crudmodel();
		$respuesta =$Crud->actualizar($datos, $idnombre);
		if ($respuesta){
			return redirect()->to(base_url().'/')->with('mensaje','2');
			}else{
				return redirect()->to(base_url().'/')->with('mensaje','3');
			
			}

		

	}

	public function obtenerNombre($idNombre){

	$data=["id_nombre"=> $idNombre];

		$crud =new crudmodel();
		$respuesta= $crud->obtenerNombre($data);
		$datos =["datos"=>$respuesta];
		return view('actualizar', $datos);
	

	}

	//--------------------------------------------------------------------

}
