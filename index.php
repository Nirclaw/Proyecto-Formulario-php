<?php
$baseUrl = 'https://648233f729fa1c5c5032b72c.mockapi.io/';


//metodo para crear usuarios, 
function crearUsuario($datos)
{
    global $baseUrl;
    $url = $baseUrl . "usuarios";

    $json = array(
        "nombre" => $datos['nombre'],
        "apellido" => $datos['apellido'],
        "direccion" => $datos['direccion'],
        "edad" => $datos["edad"],
        "email" => $datos['email'],
        "hora" => $datos['Horario'],
        "trainer" => $datos['trainer__'],
        "cedula" => $datos['cedula'],
        "team" => $datos['team']
    );
    //configuracion para realizar un POST
    $options = array(
        "http" => array(
            "method" => "POST",
            "header" => "Content-type: application/json",
            "content" => json_encode($json)
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
        }
        return true;
    }
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
$nombretraer = buscarid($_POST['cedula']);

var_dump($nombretraer);



switch ($_POST['btn']) {

    case 'borrar':
        echo $_POST['btn'];

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

        break;

    case 'buscar':
        empty($_POST['cedula']) == 0 ? buscarid($_POST['cedula']) : print "debes digitar la cedula";
        break;
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
                <input type="text" name="nombre" id="nombre" placeholder="nombre" value="<?php echo $nombretraer['nombre'] ?>">
                <img src="" alt="logo" srcset="https://media.licdn.com/dms/image/D563DAQFas8vErYi8iA/image-scale_191_1128/0/1681268367946?e=1686783600&v=beta&t=AxWQwwzzQ5dfcbg7RTf3_LAWFZUaEMWYY8pRfOr3MlM">
                <input type="text" name="apellido" id="apellido" placeholder="apellido" value="<?php echo $nombretraer['apellido'] ?>">
                <input type="number" name="edad" id="edad" placeholder="edad" value="<?php echo $nombretraer['edad'] ?>">
                <input type="text" name="direccion" id="direccion" placeholder="direccion" value="<?php echo $nombretraer['direccion'] ?>">
                <input type="text" name="email" id="email" placeholder="email" value="<?php echo $nombretraer['email'] ?>">
            </div>
            <div id="botonera">

                <input type="time" name="Horario" id="Horario" placeholder="Horario de entrada" value="<?php echo $nombretraer['hora'] ?>">

                <input type="text" name="team" id="team" placeholder="Team" value="<?php echo $nombretraer['team'] ?>">
                <input type="text" name="trainer  " id="trainer" placeholder="Trainer" value="<?php echo $nombretraer['trainer'] ?>">
                <input type="number" name="cedula" id="cedula" placeholder="cedula" value="<?php echo $nombretraer['cedula'] ?>">
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