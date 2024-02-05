<?php

namespace App\Models;

use App\Models\Foto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categori extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function foto()
    {
        return $this->hasMany(Foto::class);
    }
}
