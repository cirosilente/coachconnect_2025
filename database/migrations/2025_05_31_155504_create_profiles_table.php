<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // relazione
            $table->integer('età');
            $table->string('sesso');
            $table->float('altezza');
            $table->float('peso');
            $table->string('obiettivi')->nullable();
            $table->text('note')->nullable();
            $table->text('programma_allenamento')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
