<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void{
        Schema::create('data_sensors', function (Blueprint $table) {
            $table->id();
            $table->string('device_id');
            $table->foreign('device_id')->references('id')->on('devices');
            $table->float('temperature')->nullable();
            $table->float('humidity')->nullable();
            $table->float('light_intensity')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('data_sensor');
    }
};
