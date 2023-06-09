<?php
$baseUrl = 'https://648233f729fa1c5c5032b72c.mockapi.io/';


//metodo para crear usuarios, 
function crearUsuario($datos)
{

    global $baseUrl;
    $url = $baseUrl . "usuarios";
    var_dump($datos);
    //configuracion para realizar un POST
    $options = array(
        "http" => array(
            "method" => "POST",
            "header" => "Content-type: application/json",
            "content" => json_encode($datos)
        )
    );

    $context = stream_context_create($options);

    $enviar = file_get_contents($url, false, $context);

    if ($enviar) {
        echo "se envio correctamente los datos";
    } else {
        echo "algo ocurrio no se pudo enviar los datos";
    }
}
//funcionm para obtener usuarios
// aca no es necesrio tener configuracion para traer los datos
function obtenerUsuarios()
{
    global $baseUrl;

    $url = $baseUrl . "usuarios";

    $result = file_get_contents($url);

    if ($result) {
        $usuarios = json_decode($result, true);

        foreach ($usuarios as $usuario) {
            echo "<tr>
            <td id='nombre'>" . $usuario["nombre"] . "</td>
            <td id='apellido'>" . $usuario["apellido"] . "</td>
            <td id='direccion'>" . $usuario["direccion"] . " </td>
            <td id='Edad'>" . $usuario["edad"] . " </td>
            <td id='Email'>" . $usuario["email"] . " </td>
            <td id='Hora/entrada'>" . $usuario["hora"] . " </td>
            <td id='Team'>" . $usuario["team"] . " </td>
            <td id='Trainer'>" . $usuario["trainer"] . "</td>
            <td id='Cedula'>" . $usuario["cedula"] . " </td>
            <td class='btonmostrar'><button id='mostrar'>&#9650;</button></td>
            </tr>";
        }
    } else {
        echo "No se encontraron usuarios";
    }
}

function validarexistencia($dato)
{
    global $baseUrl;
    $url = $baseUrl . "usuarios";
    $result = file_get_contents($url);
    $usuario = json_decode($result, true);

    for ($i = 0; $i < count($usuario); $i++) {
        if ($dato == $usuario[$i]['cedula']) {
            echo $usuario[$i]['cedula'];
            return true;
        }
    }
    return false;
}

function buscarid($cedula)
{
    global $baseUrl;
    $url = $baseUrl . "usuarios";
    $result = file_get_contents($url);
    if ($result) {

        $usuario = json_decode($result, true);
        for ($i = 0; $i < count($usuario); $i++) {
            if ($cedula == $usuario[$i]['cedula']) {
                $nombre = $usuario[$i];
                return $nombre;
            }
        }
    }
}

function borrarCliente($cedula)
{
    $cliente = buscarid($cedula);
    global $baseUrl;
    $url = $baseUrl . "usuarios/" . $cliente['id'];

    $options = array(
        "http" => array(
            "method" => "DELETE"
        )
    );

    $context = stream_context_create($options);

    $enviar = file_get_contents($url, false, $context);

    if ($enviar) {
        echo "se ah eliminado el usuario";
    } else {
        echo "el usuario no existe";
    }
}

function Editarcliente($cedula)
{

    global $baseUrl;
    $cliente = buscarid($cedula['cedula']);

    $url = $baseUrl . "usuarios/" . $cliente['id'];

    $options = array(
        "http" => array(
            "method" => "PUT",
            "header" => "Content-type: application/json",
            "content" => json_encode($cedula)
        )
    );
    var_dump($options);

    $context = stream_context_create($options);

    $enviar = file_get_contents($url, false, $context);

    if ($enviar) {
        echo 'Se ha modificado correctamente el usuario';
    } else {
        echo "no se ha podido modificar el usuario";
    }
}




if (empty($_POST['btn'])) {
} else {
    switch ($_POST['btn']) {

        case 'borrar':
            if (empty($_POST['cedula'])) {
                echo "debes ingresar la cedula del usuario";
            } else {
                borrarCliente($_POST['cedula']);
            }
            break;

        case 'guardar':
            if (in_array("", $_POST)) {
                echo "Debes completar todos los campos";
            } else {
                validarexistencia($_POST['cedula']) ?  print "el usuario ya existe" : crearUsuario($_POST);
            }
            break;
        case 'editar':
            echo  $_POST['btn'];
            if (empty($_POST['cedula'])) {
                echo "Debes completar todos los campos";
            } else {
                $nombretraer = Editarcliente($_POST);
            }

            break;

        case 'buscar':
            if (empty($_POST['cedula'])) {
                echo "Debes ingresar la cedula";
            } else {
                $nombretraer =  buscarid($_POST['cedula']);
            }
            break;
    }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="contenedor">
        <form action="index.php" method="POST">
            <div id="encabezado">
                <input type="text" name="nombre" id="nombre" placeholder="nombre" value="<?php isset($nombretraer['nombre']) ? print $nombretraer['nombre']  : print ""  ?>">
                <img src="" alt="logo" srcset="https://media.licdn.com/dms/image/D563DAQFas8vErYi8iA/image-scale_191_1128/0/1681268367946?e=1686783600&v=beta&t=AxWQwwzzQ5dfcbg7RTf3_LAWFZUaEMWYY8pRfOr3MlM">
                <input type="text" name="apellido" id="apellido" placeholder="apellido" value="<?php isset($nombretraer['apellido']) ? print $nombretraer['apellido']  : print "" ?>">
                <input type="number" name="edad" id="edad" placeholder="edad" value="<?php isset($nombretraer['edad']) ? print $nombretraer['edad']  : print "" ?>">
                <input type="text" name="direccion" id="direccion" placeholder="direccion" value="<?php isset($nombretraer['direccion']) ? print $nombretraer['direccion']  : print "" ?>">
                <input type="text" name="email" id="email" placeholder="email" value="<?php isset($nombretraer['email']) ? print $nombretraer['email']  : print ""  ?>">
            </div>
            <div id="botonera">

                <input type="time" name="hora" id="hora" placeholder="Horario de entrada" value="<?php isset($nombretraer['hora']) ? print $nombretraer['hora']  : print "" ?>">

                <input type="text" name="team" id="team" placeholder="Team" value="<?php isset($nombretraer['team']) ? print $nombretraer['team']  : print "" ?>">
                <input type="text" name="trainer  " id="trainer" placeholder="Trainer" value="<?php isset($nombretraer['trainer']) ? print $nombretraer['trainer']  : print "" ?>">
                <input type="number" name="cedula" id="cedula" placeholder="cedula" value="<?php isset($nombretraer['cedula']) ? print $nombretraer['cedula']  : print "" ?>">
                <div id="botones">
                    <button id="borrar" name="btn" value="borrar">&#10060;</button>
                    <button id="guardar" name="btn" value="guardar">&#10004;</button>
                    <button id="editar" name="btn" value="editar">&#9997;</button>
                    <button id="buscar" name="btn" value="buscar">&#127859;</button>
                </div>
            </div>
            <div class="tabla">
                <table>
                    <caption>Usuarios</caption>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Direccio</th>
                            <th>Edad</th>
                            <th>Email</th>
                            <th>Hora/entrada</th>
                            <th>Team</th>
                            <th>Trainer</th>
                            <th>Cedula</th>
                        </tr>
                    </thead>

                    <tbody id="mostrar">
                        <?php
                        echo obtenerUsuarios();
                        ?>

                    </tbody>


                </table>
            </div>

        </form>

    </div>
</body>

</html>