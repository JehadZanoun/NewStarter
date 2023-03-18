<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    use HasFactory;
    protected $table = 'midecals';
    protected $fillable = ['pdf', 'patients_id'];
    protected $hidden = ['created_at', 'update_at',];

    public $timestamps = false;
}
