<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = "services";
    protected $fillable = ['name','created_at', 'update_at'];
    protected $hidden = ['created_at', 'update_at', 'pivot'];
    public $timestamps = true;

    public function doctors() {
        return $this->belongsToMany('App\Models\Doctor', 'doctors_servicse', 'service_id', 'doctor_id', 'id', 'id');

    }
}
