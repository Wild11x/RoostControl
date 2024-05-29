<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigLamp extends Model {
    use HasFactory;

    protected $fillable = ['device_id','status', 'time_on', 'time_off', 'created_at', 'updated_at'];

    public function device() {
        return $this->belongsTo(Device::class);
    }
}
