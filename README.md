# Formulario de manejo de HTTP y tabla dinámica en PHP

## Descripción

Este proyecto tiene como objetivo demostrar el manejo de los métodos HTTP (PUT, GET, POST y DELETE) en un formulario desarrollado en PHP. Además, se muestra el manejo de los datos ingresados en una tabla dinámica utilizando una API simulada como base de datos.

## Características principales

- Implementación de un formulario en PHP que permite ingresar datos.
- Uso de los métodos HTTP para realizar diferentes acciones:
  - PUT: Actualización de datos existentes a través de la API simulada.
  - GET: Obtención de datos de la API simulada para mostrar en la tabla.
  - POST: Creación de nuevos registros en la API simulada.
  - DELETE: Eliminación de registros de la API simulada.
- Visualización de los datos ingresados y almacenados en una tabla dinámica.

## Capturas de pantalla

![](https://i.imgur.com/qexLM2l.png)



## Instalación

A continuación, se detallan los pasos necesarios para instalar y ejecutar el proyecto en tu entorno local:

1. Clona este repositorio en tu máquina local.
2. Asegúrate de tener instalado un servidor web local (por ejemplo, Apache) y PHP.
3. Copia los archivos del repositorio en el directorio raíz de tu servidor web.
4. Configura la URL de la API simulada en el archivo `config.php`, asegurándote de que apunte correctamente a tu API.
5. Inicia tu servidor web local.
6. Accede al proyecto a través de tu navegador web utilizando la URL correspondiente.

## Uso

1. Una vez que hayas instalado y accedido al proyecto, se mostrará el formulario en tu navegador.
2. Rellena todos los campos correspondientes del formulario con los datos del cliente que deseas ingresar. Asegúrate de completar todos los campos obligatorios, ya que la página tiene validadores que no permiten enviar inputs vacíos.
3. Para garantizar la integridad de los datos, asegúrate de proporcionar una cédula única para cada cliente. Si intentas crear un usuario con una cédula que ya existe en la base de datos, recibirás un mensaje de error.
4. Para agregar un nuevo cliente, haz clic en el botón "Agregar". Los datos serán enviados a la API simulada y se actualizará la tabla dinámica para reflejar la inclusión del nuevo cliente.
5. Si deseas eliminar un cliente específico, busca al cliente en la tabla utilizando el campo de búsqueda y luego haz clic en el botón "Eliminar" correspondiente a ese cliente. El cliente será eliminado de la API simulada y la tabla se actualizará automáticamente.
6. Si necesitas buscar un cliente en específico, ingresa el nombre o la cédula del cliente en el campo de búsqueda y haz clic en el botón "Buscar". La tabla mostrará únicamente los resultados que coincidan con la búsqueda realizada.
7. Si deseas modificar los datos de un cliente existente, busca al cliente en la tabla utilizando el campo de búsqueda y haz clic en el botón "Editar" correspondiente a ese cliente. Se abrirá el formulario con los datos del cliente cargados, lo que te permitirá modificarlos. Una vez realizados los cambios, haz clic en el botón "Guardar" y los datos se actualizarán en la API simulada y en la tabla dinámica.

Recuerda seguir todas las instrucciones y utilizar las funcionalidades proporcionadas por el formulario para una correcta manipulación de los datos de los clientes.

Puedes acceder a los datos almacenados en la API simulada en el siguiente enlace: https://648233f729fa1c5c5032b72c.mockapi.io/usuarios. Este enlace te mostrará los datos de los usuarios que se han almacenado hasta el momento.

Si tienes alguna pregunta, consulta o sugerencia relacionada con este proyecto, no dudes en contactarme por correo electrónico a [caicedonicolas150@gmail.com](mailto:caicedonicolas150@gmail.com) o a través de mi perfil en Instagram [@Bynicolazz](https://www.instagram.com/Bynicolazz/).

## Estado del proyecto

Este proyecto se encuentra en desarrollo activo y se actualiza periódicamente para mejorar su funcionalidad y usabilidad.

