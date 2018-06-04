<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class ProgramasController extends ControllerBase
{

    public function obt_materias() {
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
            $response->setStatusCode(409, 'Conflict');
            return $response;
        }

        $usuario = $this->session->get('usuario');
        //Averiguamos programas
        $programas = syl\ean\UsuarioPrograma::find($usuario->id_usuario);

        foreach($programas as $programa){
            $materia = syl\ean\Materia::find(syl\ean\MateriaPrograma::find($programa)->id_materia);
            // if (!isset($materias[$materia])){
            $materias[] = $materia;
            // }
        }

        if(isset($materias)){
            $response->setJsonContent(
                [
                    'status' => 'OK',
                    'data'   => $materias,
                ]
            );
        }else {
            // Cambiar el HTTP status
            $response->setStatusCode(409, 'Conflict');

            $response->setJsonContent(
                [
                    'status'   => 'ERROR',
                    'messages' => 'No tiene ninguna materia asignada',
                ]
            );
        }
        
        return $response;
    } 

}

