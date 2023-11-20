<?php

use App\Models\Pro;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pros', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->string('name')->unique();
            $table->decimal('price', 6, 2);
            $table->string('status')->default(Pro::STATUS_HIDE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pros');
    }
};