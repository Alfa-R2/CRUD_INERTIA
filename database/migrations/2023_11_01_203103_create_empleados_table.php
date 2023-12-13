<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',150);
            $table->string('email',80);
            $table->string('telefono',15);
            $table->unsignedBigInteger('id_departamento');
            $table->foreign('id_departamento')->references("id")->on("departamentos")->onUpdate("cascade")
            ->onDelete("restrict");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
