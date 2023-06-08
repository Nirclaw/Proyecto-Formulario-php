<?php
$baseUrl = 'https://648233f729fa1c5c5032b72c.mockapi.io/';
function obtenerUsuarios()
{
    global $baseUrl;

    $url = $baseUrl . "usuarios";

    $result = file_get_contents($url);

    if ($result) {
        $usuarios = json_decode($result,   true );

        foreach ($usuarios as $usuario) {
            echo "<tr>
            <td id='nombre'>". $usuario["nombre"] . "</td>
            <td id='apellido'>".$usuario["apellido"] ."</td>
            <td id='direccion'>".$usuario["direccion"]." </td>
            <td id='Edad'>". $usuario["edad"] ." </td>
            <td id='Email'>". $usuario["email"] ." </td>
            <td id='Hora/entrada'>".$usuario["hora"] ." </td>
            <td id='Team'>". $usuario["team"] ." </td>
            <td id='Trainer'>". $usuario["trainer"] . "</td>
            <td id='Cedula'>". $usuario["cedula"] ." </td>
            <td class='btonmostrar'><button id='mostrar'>&#9650;</button></td>
            </tr>";
        }
    } else {
        echo "No se encontraron usuarios";
    }

}
echo $_POST['borrar'];
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
                <input type="text" name="nombre" id="nombre" placeholder="nombre">
                <img src="" alt="logo" srcset="https://media.licdn.com/dms/image/D563DAQFas8vErYi8iA/image-scale_191_1128/0/1681268367946?e=1686783600&v=beta&t=AxWQwwzzQ5dfcbg7RTf3_LAWFZUaEMWYY8pRfOr3MlM">
                <input type="text" name="apellido" id="apellido" placeholder="apellido">
                <input type="number" name="edad" id="edad" placeholder="edad">
                <input type="text" name="direccion" id="direccion" placeholder="direccion">
                <input type="text" name="email" id="email" placeholder="email">
            </div>
            <div id="botonera">

                <input type="time" name="Horario" id="Horario" placeholder="Horario de entrada">

                <input type="text" name="team" id="team" placeholder="Team">
                <input type="text" name="trainer  " id="trainer" placeholder="Trainer">
                <input type="number" name="cedula" id="cedula" placeholder="cedula">
                <div id="botones">
                    <button id="borrar" name="borrar" value="borrar">&#10060;</button>
                    <button id="guardar" name="guardar" value="guardar">&#10004;</button>
                    <button id="editar" name="editar" value="editar">&#9997;</button>
                    <button id="buscar" name="buscar" value="buscar">&#127859;</button>
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