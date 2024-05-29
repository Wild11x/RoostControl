<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void{
        Schema::create('devices', function (Blueprint $table) {
            $table->string('id'); // kolom id dengan tipe varchar
            $table->primary('id'); // define id menjadi primary key
            $table->foreignId('user_id')->constrained();
            $table->string('name');
            $table->timestamps(); // created_at dan updated_at       
        });;
}
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
