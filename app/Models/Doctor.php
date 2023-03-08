<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    protected $fillable = ['name', 'title', 'hosbital_id', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = true;

    public function hospital() {
        return $this->belongsTo('App\Models\Hosbital', 'hosbital_id', 'id');
    }

    public function services() {
        return $this->belongsToMany('App\Models\Service', 'doctors_servicse', 'doctor_id', 'service_id', 'id', 'id');
    }
}
