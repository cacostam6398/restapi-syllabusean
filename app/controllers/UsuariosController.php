<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class UsuariosController extends ControllerBase
{

    // public function indexAction()
    // {

    // }

    public function listar_syllabus(){
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

        $Syllabus = syl\ean\Syllabus::find(['id_usuario = ?0',
        'bind' => [ $usuario->id_usuario ],]);

        foreach($Syllabus as $syl){

            if($syl->status == 0){
                $status = "Borrador";
            }else{
                $status = "Liberado";
            }

            $materia = syl\ean\Materia::findFirst($syl->id_materia);
            $progr = syl\ean\UsuarioPrograma::findFirst( ['id_usuario = ?0','bind' => [ $usuario->id_usuario ],] );
            $programa = syl\ean\Programa::findFirst($progr->id_programa);

            
            $Resultado = array('id_syllabus' => $syl->id_syllabus,
                               'fec_creacion' => $syl->fec_creacion,
                               'observacion' => $syl->observacion,
                               'estado' => $status,
                               'materia' => $materia, 
                               'programa' => $programa , );

            $Resultados[] = $Resultado;
        }       

        $response->setJsonContent(
            [
                'status'   => 'OK',
                'messages' => 'Listado de Syllabus creados por el usuario',
                'Syllabus' => $Resultados,
            ]
        );
        return $response;       

    }

}

