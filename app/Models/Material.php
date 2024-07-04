<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'categoria_id'];

    protected $table = 'materiales';

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
