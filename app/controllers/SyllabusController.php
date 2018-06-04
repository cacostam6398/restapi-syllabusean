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
        //4 - Rechazado
        $syllabus->status       = "0";
        $syllabus->id_usuario   = $usuario->id_usuario;
        $syllabus->id_materia   = $json->id_materia;

        if ($syllabus->create() === false) {
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'No se ha podido crear el Syllabus'
                ]
            );           
        }else{
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

    public function crear_detalle(){

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
        
        $detalle =  new syl\ean\DetalleVersion();
        $detalle->id_syllabus  = $json->id_syllabus;
        $detalle->fecha        = date("Y-m-d");
        $detalle->hora         = date("h:i:s");
        $detalle->modalidad    = $json->modalidad;
        $detalle->duracion     = $json->duracion;
        $detalle->proposito    = $json->proposito;
        $detalle->hrs_directas = $json->hrs_directas;
        $detalle->hrs_autonomas = $json->hrs_autonomas;
        $detalle->pre_requisito = $json->pre_requisito;
        $detalle->co_requisito = $json->co_requisito;
        $detalle->competencia_global = $json->competencia_global;
        $detalle->metodologia  = $json->metodologia;
        $detalle->resumen      = $json->resumen;
        $detalle->evaluacion   = $json->evaluacion;
        $detalle->recursos     = $json->recursos;
        $detalle->bibliografia = $json->bibliografia;
        $detalle->lengua       = $json->lengua;    
        $detalle->pr_lengua    = $json->pr_lengua ;
        $detalle->observacion_version = $json->observacion_version;
        $detalle->id_usuario   = $usuario->id_usuario;
        //Consultar que exista Syllabus y sus validaciones
        $syllabus = Syllabus::findFirst($detalle->id_syllabus);
        //validar
        if($syllabus === false){
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'No existe el syllabus con Id '.$json->id_syllabus,
                    'err_syl'  => $json->id_syllabus,
                ]
            );
            return $response;
        }

        // // Calcular la ultima version
        $version = syl\ean\DetalleVersion::count(
            ['id_syllabus = ?0',
            'bind' => [ $detalle->id_syllabus ],]
        );

        if($version > 0 && ( $syllabus->status == "0" || $syllabus->status == "4" ) ){
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'No se puede crear otra version, Syllabus no liberado o rechazado',
                    'est_syl'  => $syllabus->status,
                ]
            );
            return $response;
        }

        $version += 1;
        $detalle->version = $version;      
        
        if ($detalle->create() === false) {
            $response->setStatusCode(409, 'Conflict');
            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'No se ha podido crear la version-detalle del syllabus '.$json->id_syllabus,
                ]
            );           
        }else{  
            //Actualizar version Actual del syllabus  
            $syllabus->update(
                [
                    'version_actual' => $detalle->id_detalle,
                ]
            );      
            $message = 'Se creo la version '.$detalle->version.' del Syllabus '.$detalle->id_syllabus ;
            $response->setJsonContent(
                [
                    'status'   => 'OK',
                    'messages' => $message,
                    'syllabus' => $detalle->id_detalle,
                ]
            );              
        }

        return $response;

    }

    public function obtener_competenciast(){
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
        //Traer las competencias transversales
        $competencias = syl\ean\Competencia::find(
            [
                "tipo = '2'",
                'distinct' => 'clave',
                'distinct' => 'contenido',
            ]
            );

        $response->setJsonContent(
            [
                'status'   => 'OK',
                'messages' => 'prueba',
                'syllabus' => $competencias,
            ]
        );            
        
        return $response;
    }


    // public function crear_competencia(){
    //     // Crear una respuesta
    //     $response = new Response();
    //     if ($this->request->isPost()) {
    //         $json = $this->request->getJsonRawBody();
    //         $loger = $this->validar_logueo($json->token);
    //         if (!$loger){
    //             // Cambiar el HTTP status
    //             $response->setStatusCode(409, 'Conflict');
    //             $response->setJsonContent(
    //                 [
    //                     'status'   => 'ERROR',
    //                     'messages' => 'Usuario no ha sido autenticado',
    //                 ]
    //             );
    //             return $response;
    //         }
    //     }else{
    //         $response->setStatusCode(404, 'Not Found');
    //         return $response;
    //     } 

    // }

}

