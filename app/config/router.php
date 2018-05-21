    <?php
use Phalcon\Mvc\Micro\Collection as MicroCollection;

//Index - autenticacion y control de sesion - seguridad
$Inicio = new MicroCollection();
// Establece el manejador principal. Por ejemplo, la instancia de un controlador
$Inicio->setHandler('IndexController', true);
// Establece un prefijo común para todas la rutas
$Inicio->setPrefix('/api/index');
// Usa el método 'obtener' en IndexController
$Inicio->post('/aut', 'autenticar');

$app->mount($Inicio);

// Manejador de programas
$Programas = new MicroCollection();
$Programas->setHandler('ProgramasController', true);
$Programas->setPrefix('/programas');
$Programas->post('/obtmat', 'obt_materias');
// $inicio->get('/add/{payload}', 'add');
$app->mount($Programas);

// // Manejador Usuarios
// $Usuarios = new MicroCollection();
// $Usuarios->setHandler('UsuariosController', true);
// $Usuarios->setPrefix('/Usuarios');
// // $Usuarios->get('/get/{id}', 'get');
// // $Usuarios->get('/add/{payload}', 'add');
// $app->mount($Usuarios);

// // Manejador de syllabus - versiones - sesiones
// $Syllabus = new MicroCollection();
// $Syllabus->setHandler('SyllabusController', true);
// $Syllabus->setPrefix('/syllabus');
// // $products->get('/get/{id}', 'get');
// // $products->get('/add/{payload}', 'add');
// $app->mount($Syllabus);

