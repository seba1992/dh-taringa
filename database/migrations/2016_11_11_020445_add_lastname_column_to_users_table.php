<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLastnameColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Para crear este archivo de migración utilicé:
         * php artisan make:migration add_lastname_column_to_users_table --table=users
         *
         * El nombre de la migración es solo para poder identificar a simple vista que hace la migraciòn sin necesidad de revisarme el código de punta a punta, lo que es cada vez mas necesario cuantas mas migraciones haya. 
         * 
         * Es importante que todos los que trabajemos en el equipo seguimos la misma convencíón para los nombres, ya sea para crear tablas, eliminar tablas, agregar columnas, editar columnas, etc...
         *
         * Si no sabemos como nombrar nuestra migracion siempre podemos/debemos recurrir a la documentación y ver los ejemplos.
         *
         * https://laravel.com/docs/5.3/migrations
         */
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastname')->after('name'); //El método after indica que debe crear esta columna a continuación de la columna name, esto es importante para que la tabla me quede bien organizada. 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
         * Siempre en el método down de cada migración debo revertir exactamente lo que hice
         * en el método up, de otra forma al hacer rollback/refresh y volver a ejecutar las migraciones
         * voy a tener un problema serio, y aunque en producción nunca se utilice, en local
         * es bastante frecuente que utilicemos php artisan migrate:refresh para tirar todas
         * las tablas y volverlas a crear
         *
         * Hay que tener en cuenta que siempre justo despues de crear una migración en local, 
         * además de revisar en la base de datos que se haya realizado exactamente el cambio 
         * que pretendiamos que se realice (ya sea desde workbench o con el comando 
         * SHOW CREATE TABLE users), tenemos que probar que el método down revierta los cambios 
         * que hice. Para eso ejecutamos: php artisan migrate:rollback --step=1
         * 
         * Si hubo algun problema, corregir el método down, e intentar volver a rollbackear la migration, una vez que ya se pueda ejecutar el rollback, ejecutar nuevamente: 
         * 
         * php artisan migrate
         *
         */
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('lastname');
        });
    }
}
