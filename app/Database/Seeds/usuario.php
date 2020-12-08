<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Usuario extends Seeder
{
	public function run()
	{
	$usuario ="admin";

	$password = password_hash("123",PASSWORD_DEFAULT);
	$nombre = "Kimberly";
	$ap = "Hernandez";
	$correo = "kim.091197@hotmail.com";
		$data = [
				'nombre' => $nombre,
				'apellido_paterno' => $ap,
				'email' => $correo,
			     'usuario' => $usuario,
			     'password' => $password
			    
			 ];
		$this->db->table('t_usuario')->insert($data);	 

	}
}