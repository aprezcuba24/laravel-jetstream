## Prueba técnica

Este proyecto es con el objetivo de aplicar a un puesto.

Está desarrollado con las tecnologías

- [Laravel](https://laravel.com).
- [Laravel Jetstream ](https://jetstream.laravel.com/introduction.html).
- [Laravel Livewire ](https://livewire.laravel.com/).

## Requerimientos

- Autenticación y Registro de usuarios
  - Se pusieron todos los campos que se pidieron en el caso de estudio.
  - Se puede seleccionar vía ajax la ciudad, pero para hacerlo se debe filtrar primero por país y luego por estado.
- Los datos que se muetran están en función del usuario autenticado
- Los administradores ven todos los datos.
- Módulo de usuarios.
  - Listado de usuarios.
  - Los usuarios solo los puede ver los administradores.
  - Se implementó el buscador tipo texto en el listado.
  - Se perite ordenar por columnas.
  - Se muestran en la tabla todos los campos excepto la contraseña.
  - Se muestra una columna con la edad a pesar de lo que se guarda en la base de datos es la fecha de nacimiento.
- Módulo de Emails.
  - Solo los usuario autenticados pueden crear emails.
  - Una vez creado el email se relaciona con el usuario y se le pone el estado pediente.
  - Los nuevos correos se adicionan a una cola.
  - Una vez enviado un correo se marca con el estado enviado.
  - El procesamiento de los correos se hace con el comando `php artisan queue:work`.
  - Los administradores ven todos los correos, además del usuario que lo creó.
  - Los usuarios solo pueden ver sus propios correos.