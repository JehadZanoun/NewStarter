<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $fillable = ['name', 'age'];
    protected $hidden = ['created_at', 'update_at',];
    public $timestamps = false;

    public function doctor() {
        return $this -> hasOneThrough('App\Models\Doctor' , 'App\Models\Medical' , 'patients_id', 'midecal_id', 'id', 'id');
    }

}
