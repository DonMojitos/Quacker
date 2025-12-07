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
        //tabla 'users' tal cual se definió en el Hito 1
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // id (INT, AI, PK) 
            
            // "nombre": VARCHAR(50), NOT NULL 
            $table->string('nombre', 50); 
            
            // "usuario": VARCHAR(50), NOT NULL, UNIQUE 
            $table->string('usuario', 50)->unique(); 
            
            // "email": VARCHAR(120), NOT NULL, UNIQUE 
            $table->string('email', 120)->unique(); 
            
            // created_at y updated_at 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};