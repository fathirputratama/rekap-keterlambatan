<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'name',
        'rombel_id',
        'rayon_id',
    ];

    public function rombel(){
        return $this->belongsTo(rombels::class, 'rombel_id', 'id');
    }

    public function rayon(){
        return $this->belongsTo(rayons::class, 'rayon_id', 'id');
    }

    public function late(){
        return $this->hasMany(lates::class, 'nis', 'name');
    }
}
