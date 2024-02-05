<?php

namespace App\Models;

use App\Models\User;
use App\Models\Categori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foto extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function categori()
    {
        return $this->belongsTo(Categori::class,);
    }

    public function user()
    {
        return $this->belongsTo(User::class,);
    }
}
