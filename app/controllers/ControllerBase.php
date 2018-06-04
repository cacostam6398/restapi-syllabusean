<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function validar_logueo($token = null) {

        $respuesta = false;

        $usuario = $this->session->get('usuario');

        if (isset($usuario)) {
            // if ($this->security->checkToken()) {}
            // Cambiar el HTTP status
            // $response->setStatusCode(409, 'Conflict');
            // $response->setJsonContent(
            //     [
            //         'status'   => 'ERROR',
            //         'messages' => 'Usuario no ha sido autenticado',
            //     ]
            // );
                       
            $respuesta = true;
        }

        if(!$respuesta){
            $this->session->remove('usuario');
            // Destruye toda la sesión
            $this->session->destroy();
        }

        return $respuesta;

    }

}
