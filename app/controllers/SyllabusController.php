<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use syl\ean\Syllabus;

class SyllabusController extends ControllerBase
{

    public function crear_syllabus(){
        
        // Crear una respuesta
        $response = new Response();

        if ($this->request->isPost()) {
            $json = $this->request->getJsonRawBody();
            $loger = $this->validar_logueo($json->token);
            if (!$loger){
                // Cambiar el HTTP status
                $response->setStatusCode(409, 'Conflict');
                $response->setJsonContent(
                    [
                        'status'   => 'ERROR',
                        'messages' => 'Usuario no ha sido autenticado',
                    ]
                );
                return $response;
            }
        }else{
            $response->setStatusCode(404, 'Not Found');
            return $response;
        } 
        
        $usuario = $this->session->get('usuario');

        $syllabus = new Syllabus();

        $syllabus->fec_creacion = date("Y-m-d");
        $syllabus->observacion  = $json->observacion;
        //Estado 
        //0 - Borrador
        //1 - Liberado
        //2 - Revisado
        //3 - Aprobado
        //4 - Eliminado
        $syllabus->status       = "0";
        $syllabus->id_usuario   = $usuario->id_usuario;
        $syllabus->id_materia   = $json->id_materia;

        $fe = $syllabus->fec_creacion;

        if ($syllabus->create() === false) {
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'No se ha podido crear el Syllabus'
                ]
            );           
        }else{
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'OK',
                    'messages' => 'Se creo el Syllabus, Estado: Borrador ',
                    'syllabus' => $syllabus->id_syllabus,
                ]
            );              
        }

        return $response;

    }

    public function crear_competencia(){

        // Crear una respuesta
        $response = new Response();

        if ($this->request->isPost()) {
            $json = $this->request->getJsonRawBody();
            $loger = $this->validar_logueo($json->token);
            if (!$loger){
                // Cambiar el HTTP status
                $response->setStatusCode(409, 'Conflict');
                $response->setJsonContent(
                    [
                        'status'   => 'ERROR',
                        'messages' => 'Usuario no ha sido autenticado',
                    ]
                );
                return $response;
            }
        }else{
            $response->setStatusCode(404, 'Not Found');
            return $response;
        } 



    }

}

