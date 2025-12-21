<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
                CREATE TABLE seguidor_seguido (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                seguidor_id INTEGER NOT NULL,
                seguido_id INTEGER NOT NULL,
                created_at DATETIME NULL,
                updated_at DATETIME NULL,
                CHECK (seguidor_id <> seguido_id),
                FOREIGN KEY (seguidor_id) REFERENCES users(id) ON DELETE CASCADE,
                FOREIGN KEY (seguido_id) REFERENCES users(id) ON DELETE CASCADE,
                UNIQUE (seguidor_id, seguido_id)
            )");
        // Schema::create('seguidor_seguido', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignIdFor(User::class, 'seguidor_id')->constrained()->onDelete('cascade');
        //     $table->foreignIdFor(User::class, 'seguido_id')->constrained()->onDelete('cascade');
        //     $table->unique(['seguidor_id','seguido_id']);
        //     //$table->check('seguidor_id <> seguido_id'); Se supone que no funciona porque Method Illuminate\Database\Schema\Blueprint::check does not exist

        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguidor_seguido');
    }
};
