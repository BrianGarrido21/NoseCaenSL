<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            // Aseguramos que la tabla use el mismo charset y collation que tbl_provincias
            $table->charset   = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->id();
            $table->string('cif');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->text('description');
            $table->timestamp('creation_date')->default(now());
            $table->timestamp('finish_date')->nullable();
            $table->string('postal_code');
            $table->text('pre_notes')->nullable();
            $table->text('post_notes')->nullable();
            $table->string('summary_uri')->nullable();
            $table->unsignedBigInteger('employee_id')->nullable(); 

            $table->unsignedBigInteger('user_id');     
            
            // Definimos province_id como char(2) con el mismo charset y collation que tbl_provincias.cod
            $table->char('province_id', 2)
                  ->charset('utf8')
                  ->collation('utf8_general_ci');
            
            $table->unsignedBigInteger('status_id');   
            $table->timestamps();

            // Relaciones con otras tablas
            $table->foreign('employee_id')
                  ->references('id')
                  ->on('employees')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('status_id')
                  ->references('id')
                  ->on('statuses')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('province_id')
                  ->references('cod')
                  ->on('tbl_provincias')
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
        Schema::dropIfExists('tasks');
    }
};
