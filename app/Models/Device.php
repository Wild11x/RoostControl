<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model {
    use HasFactory;

    protected $fillable = ['id', 'user_id', 'name'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function dataSensors() {
        return $this->hasMany(DataSensor::class);
    }

    public function configHeater() {
        return $this->hasOne(ConfigHeater::class);
    }

    public function configLamp() {
        return $this->hasOne(ConfigLamp::class);
    }
}
