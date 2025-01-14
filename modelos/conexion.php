<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=djlkaosw_gdplus",
			            "djlkaosw_eperea",
			            "tpa20190387");

		$link->exec("set names utf8");

		return $link;

	}

	

}