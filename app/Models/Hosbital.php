<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hosbital extends Model
{
    use HasFactory;
    protected $table = 'hosbitals';
    protected $fillable = ['name','address', 'country_id', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = true;

    public function doctors() {
        return $this->hasMany('App\Models\Doctor', 'hosbital_id', 'id');
    }
}
