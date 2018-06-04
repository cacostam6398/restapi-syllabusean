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
            unset($materias,$det_prg);//Limpiar variables

            $det_prg = syl\ean\Programa::findFirst($programa->id_programa);
            //Traer toda la union entre el programa y sus materias
            $rec_mat_prg = syl\ean\MateriaPrograma::find($programa->id_programa);
            //Buscar todas las materias asociadas al programa
            foreach($rec_mat_prg as $mat){
                $materias[]  = syl\ean\Materia::findFirst($mat->id_materia);
            }
            //Arreglo final
            $resp = array( 'programa' => $det_prg , 
                           'materias' => $materias );                         
            $arreglo_final[] = $resp;
        }

        if(isset($arreglo_final)){
            $response->setJsonContent(
                [
                    'status'      => 'OK',
                    'programas'   => $arreglo_final
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

