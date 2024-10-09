<?php

interface Detalle{
    public function obtenerDetallesEspecificos(): string;
}

/*abstract class Entrada implements Detalles{
    public $id;
    public $fecha_creacion;
    public $tipo;
    public $titulo;
    public $descripcion;

    public function __construct($datos = []) {
        foreach ($datos as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}*/

abstract class Entrada implements Detalle{
    public $id;
    public $fecha_creacion;
    public $tipo;

    public function __construct($datos = []) {
        foreach ($datos as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}

class EntradaUnaColumna extends Entrada{
    public $titulo;
    public $descripcion;

    public function obtenerDetallesEspecificos ():String{
        return "" . $this->titulo;
    }

}

class EntradadosColumna extends Entrada{
    public $titulo1;
    public $descripcion1;
    public $titulo2;
    public $descripcion2;

    public function obtenerDetallesEspecificos ():String{
        return "" . $this->titulo1 .", ". $this->titulo2;
    }

}


class EntradatresColumna extends Entrada{
    public $titulo1;
    public $descripcion1;
    public $titulo2;
    public $descripcion2;
    public $titulo3;
    public $descripcion3;

    public function obtenerDetallesEspecificos ():String{
        return "" . $this->titulo1 .", ". $this->titulo2 .", ". $this->titulo3;
    }

}



class GestorBlog {
    private $entradas = [];

    public function cargarEntradas() {
        //$this->entrada;
        if (file_exists('blog.json')) {
            $json = file_get_contents('blog.json');
            $data = json_decode($json, true);
            foreach ($data as $entradaData) {
                switch($entradaData['tipo']){
                    case '1':
                        $entrada = new EntradaUnaColumna($entradaData);
                        break;
                    
                    case '2':
                        $entrada = new EntradadosColumna($entradaData);
                        break;
    
                    case '3':
                        $entrada = new EntradatresColumna($entradaData);
                        break;
    
                }
    
                $this->entradas[] = $entrada;
            }
            return $this->entradas;
        }
    }

    public function agregarEntrada($input){
        $tipo = $input['tipo'];
        $entradas = null;
        switch($tipo){
            case '1':
                $entradas = new EntradaUnaColumna($input);
                break;
            
            case '2':
                $entradas = new EntradadosColumna($input);
                break;

            case '3':
                $entradas = new EntradatresColumna($input);
                break;
        }
        if($entradas != null){
            $json = file_get_contents('blog.json');
            $entradas['id'] = $this->obtenerID();
            array_push($json,$entrada);
            $n_json = json_encode($json,JSON_PRETTY_PRINT);
            file_put_contents('blog.json',$n_json);
        }
    }

    public function guardarEntradas() {
        $data = array_map(function($entrada) {
            return get_object_vars($entrada);
        }, $this->entradas);
        file_put_contents('blog.json', json_encode($data, JSON_PRETTY_PRINT));
    }

    public function obtenerEntradas() {
        return $this->entradas;
    }

    private function obtenerID(){
        $idMaximo = 0;
        foreach($this->$entrada as $key => $value){
            if($value->id > $idMaximo){

            }

        return $idMaximo + 1;
        }
    }
}   