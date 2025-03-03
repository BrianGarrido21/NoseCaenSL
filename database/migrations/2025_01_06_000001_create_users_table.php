<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('cif')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('credit_card')->unique();
            $table->string('address');
            $table->timestamp('email_verified_at')->nullable();
            // Usamos unsignedSmallInteger para que coincida con el tipo SMALLINT(3) UNSIGNED de la tabla paises
            $table->unsignedSmallInteger('country_id')->nullable();
            $table->string('currency_iso', 5)->nullable();
            $table->rememberToken();
            $table->timestamps();
            // Definición de la clave foránea que relaciona country_id con el campo id de la tabla paises
            $table->foreign('country_id')
                  ->references('id')
                  ->on('paises')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Revierte las migraciones.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
