
usuario: admin contraseña: 1234
## Omar Salvador Garcia Vasquez
## Flor Marina Torres Jandres

## Sistema Web - Farmacia La Buena

---

## 1. ¿Cómo manejan la conexión a la BD y qué pasa si algunos de los datos son incorrectos? Justifiquen la manera de validación de la conexión.

La conexión a la base de datos se realiza mediante un archivo llamado `conexion.php`, utilizando `mysqli` en PHP. En este archivo se definen las credenciales necesarias: servidor, usuario, contraseña y nombre de la base de datos.

```php
$conexion = new mysqli($host, $user, $pass, $base);
```

Después se valida la conexión con:

```php
if ($conexion->connect_error)
```

Si alguno de los datos es incorrecto, por ejemplo usuario, contraseña o nombre de base de datos erróneo, el sistema muestra un mensaje de error y detiene la ejecución.

Esto se hace para evitar que la aplicación continúe funcionando sin conexión, lo cual podría generar fallos mayores. La validación permite detectar problemas desde el inicio y facilita su corrección.

---

## 2. ¿Cuál es la diferencia entre $_GET y $_POST en PHP? ¿Cuándo es más apropiado usar cada uno? Da un ejemplo real de tu proyecto.

### $_GET

Se utiliza para enviar datos por medio de la URL.

Ejemplo:

```php
editar.php?id=3
```

Es apropiado cuando se desea identificar un registro o enviar datos pequeños.

En nuestro proyecto se utiliza para:

* Editar pacientes
* Eliminar pacientes

---

### $_POST

Se utiliza para enviar datos ocultos dentro de formularios.

Ejemplo:

```php
<form method="POST">
```

Es apropiado cuando se envía información sensible o extensa.

En nuestro proyecto se utiliza para:

* Inicio de sesión
* Registro de pacientes
* Actualización de información

---

## 3. Tu app va a usarse en una empresa de la zona oriental. ¿Qué riesgos de seguridad identificas en una app web con BD que maneja datos de los usuarios? ¿Cómo los mitigarían?

### Riesgos identificados:

1. Robo de usuarios y contraseñas.
2. Inyección SQL en formularios.
3. Acceso no autorizado al sistema.
4. Eliminación o modificación indebida de registros.
5. Pérdida de información.

### Soluciones:

1. Encriptar contraseñas con `password_hash()`.
2. Utilizar consultas preparadas (`prepare`).
3. Validar todos los campos del formulario.
4. Restringir acceso mediante sesiones.
5. Realizar respaldos periódicos de la base de datos.
6. Cerrar sesión al finalizar el uso del sistema.

Estas medidas ayudan a proteger la información de usuarios y pacientes.

---

# 4. Diccionario de Datos

---

## Tabla: usuarios

| Columna | Tipo de dato | Límite de caracteres | ¿Es nulo? | Descripción                           |
| ------- | ------------ | -------------------- | --------- | ------------------------------------- |
| id      | INT          | 11                   | No        | Identificador único del usuario       |
| usuario | VARCHAR      | 50                   | No        | Nombre de usuario para iniciar sesión |
| clave   | VARCHAR      | 100                  | No        | Contraseña del usuario                |
| nombre  | VARCHAR      | 100                  | No        | Nombre completo del usuario           |

---

## Tabla: pacientes

| Columna        | Tipo de dato | Límite de caracteres | ¿Es nulo? | Descripción                      |
| -------------- | ------------ | -------------------- | --------- | -------------------------------- |
| id             | INT          | 11                   | No        | Identificador único del paciente |
| nombre         | VARCHAR      | 100                  | No        | Nombre completo del paciente     |
| edad           | INT          | 11                   | No        | Edad del paciente                |
| genero         | VARCHAR      | 20                   | No        | Género del paciente              |
| telefono       | VARCHAR      | 20                   | Sí        | Número telefónico                |
| tipo_sangre    | VARCHAR      | 10                   | No        | Tipo de sangre del paciente      |
| fecha_registro | TIMESTAMP    | -                    | Sí        | Fecha y hora de registro         |

---
