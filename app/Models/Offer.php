<?php

namespace App\Models;

use App\Scopes\OfferScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Offer extends Model
{
    use HasFactory;

    protected $table = "offers";
    protected $fillable = ['photo','name_ar', 'name_en', 'price', 'details_ar', 'details_en', 'status', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];



// register global scope
    protected static function booted()
    {
        static::addGlobalScope(new OfferScope);
    }

    ##################### Scopes ############

    public function scopeInactive($q) {
        return $q -> where('status', 0);
    }

    public function scopeInvalid($q) {
        return $q -> where('status', 0)->whereNull('details_ar');
    }

    ##################### Mutators ############

    public function setNameEnAttribute($value) {
        $this->attributes['name_en'] = strtoupper($value);
    }


}



