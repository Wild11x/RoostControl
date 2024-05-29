<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigHeater extends Model {
    use HasFactory;

    protected $fillable = ['device_id', 'mode', 'status', 'max_temp', 'min_temp'];

    public function device() {
        return $this->belongsTo(Device::class);
    }
}
