<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function autenticar() {

        $usuario = $this->request->getJsonRawBody();
                
                $phql = 'SELECT id_usuario, a.nombre, apellido, correo , b.nombre nombre_rol
                         FROM syl\ean\Usuario as a
                         INNER JOIN syl\ean\Rol as b
                         ON a.id_rol = b.id_rol
                         WHERE a.correo = :correo: ';
                
                $status = $this->modelsManager->executeQuery(
                    $phql,
                    [
                        'correo' => $usuario->correo,
                    ]
                );         
                
                // Crear una respuesta
                $response = new Response();
                $usuario = $status->getFirst();
                // Comprobar si la comprobacion del usuario es exitosa
                if ($usuario != false) {
                    
                    $response->setStatusCode(201, 'Created');
        
                    $response->setJsonContent(
                        [
                            'status' => 'OK',
                            'data'   => $usuario,
                            'token'  => $this->security->getTokenKey(),
                        ]
                    );
                    
                    $this->session->set('usuario', $usuario);
                    
                } else {
                    // Cambiar el HTTP status
                    $response->setStatusCode(409, 'Conflict');
        
                    $errors = [];
        
                    foreach ($status->getMessages() as $message) {
                        $errors[] = $message->getMessage();
                    }
        
                    $response->setJsonContent(
                        [
                            'status'   => 'ERROR',
                            'messages' => $errors,
                        ]
                    );

                    $this->session->set('auth', false);
                }
        
                return $response;
    }                 

}

