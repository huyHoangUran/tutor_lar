<?php

use App\Models\Client;
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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('account_owner')->unique();
            $table->string('img')->nullable();
            $table->integer('project');
            $table->decimal('invoice', 6, 2);
            $table->string('tag')->nullable();
            $table->string('category')->default('default');
            $table->string('status')->default(Client::STATUS_INACTIVE);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
