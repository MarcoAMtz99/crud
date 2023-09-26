# CRUD para crear usuarios y asignar roles

> Dadas la siguiente estructura de tablas, 
se necesita crea las migraciones, controladores, modelos y vistas necesarias
 para hacer un CRUD básico sobre usuarios, así como crear la funcionalidad para asignar y remover roles, la tabla roles será un catálogo fijo con los valores descritos abajo.

*usuario*
- id: int
- nombre: string (75)
- correo: string (50)

* rol*
- id: int
- nombre: string (50)


*roles_usuarios:*
- id: int
- usuario_id
- rol_id

------------


###Librerias usadas


`<SPATIE>` : <https://spatie.be/docs/laravel-permission/v5/introduction>

`<Laravel Breeze>` : https://laravel.com/docs/10.x/starter-kits>


###Requisitos
`<PHP> 8.0.28 `
`<NODE> v16.15.1`

###Archivo .ENV
`puedes tomar de base el .env.example solo cambia el nombre de tu base de datos`

###Comandos para instalar el proyecto

1. `git clone https://github.com/MarcoAMtz99/crud.git`

3. `composer install`

5. `npm install`

7. `php artisan migrate`

1. `php artisan db:seed --class=UserSeeder`

8. `php artisan key:generate`


###Credenciales predeterminadas

 `admin@bigsmart.com`
 `BigSmart2023`

------------

## Solucion al problema

> Para esta rapida solucion me propuse a usar una libreria con la que ya habia trabajo antes SPATIE, esta libreria nos ayuda mucho con los modelos de roles y permisos ya que muchas veces estos van de la mano. Por otro lado use Breeze en la configuracion con blade, ya que tiene algunos componentes por default que me ayudaron a reducir tiempo en cuanto a la estructura del template.

> Elegi Breeze porque al instalarlo nos ayuda con un login sencillo y las migraciones, de igual forma nos proporciona ya varias funciones que pueden ser de utilidad para un futuro como son la verificacion por email, el reseteo de contraseña.

> SPATIE considero seria una buena opcion para este equerimiento de roles,  para un futuro es escalable con permisos e incluso grupos.

### Mejoras a futuro

yo propondria las siguientes mejoras:

- Agregar unas columnas [trashed,active] a la tabla roles y usuarios para mantener la integridad de la base de datos y no eliminar registros o activar solos softdeletes de laravel.
- Uso de validaciones en la parte del front, ya que ahora mismo las validaciones quedaron en los controladores con el validate.
- Hacer responsive el template