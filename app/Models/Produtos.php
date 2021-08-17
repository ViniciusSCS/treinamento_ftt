<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'descricao',
        'valor',
        'categoria_id',
    ];

    public function categoria()
    {
        return $this->hasOne(Categorias::class, 'id', 'categoria_id');
    }
}
