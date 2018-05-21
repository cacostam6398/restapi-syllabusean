<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class ProgramasController extends ControllerBase
{

    public function obt_materias() {

        if ($this->request->isPost()) {

            // Crear una respuesta
            $response = new Response();

            $prueba = $this->request->getJsonRawBody();

            $usuario = $this->session->get('usuario');

            // if ($this->security->checkToken()) {if ($this->security->checkToken()) {
            if (isset($usuario)) {
//Averiguamos programas
                $programas = syl\ean\UsuarioPrograma::find($usuario->id_usuario);

                foreach($programas as $programa){
                    $materia = syl\ean\Materia::find(syl\ean\MateriaPrograma::find($programa)->id_materia);
                    if (!isset($materias[$materia])){
                        $materias[] = $materia;
                    }
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

            }
        }

        return $response;
    } 

}

