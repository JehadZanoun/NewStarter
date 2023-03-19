<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    protected $fillable = ['name', 'title', 'hosbital_id', 'midecal_id', 'created_at', 'update_at'];
    protected $hidden = ['created_at', 'update_at', 'pivot'];
    public $timestamps = true;

    public function hospital() {
        return $this->belongsTo('App\Models\Hosbital', 'hosbital_id', 'id');
    }

    public function services() {
        return $this->belongsToMany('App\Models\Service', 'doctors_servicse', 'doctor_id', 'service_id', 'id', 'id');
    }

    public function getGenderDoctor($val) {
       return $val =  2 ? 'male' : 'female';
    }
}
