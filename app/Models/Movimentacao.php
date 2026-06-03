<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{

      protected $table = 'movimentacaos'; 

    protected $fillable = [
    'produto_id',
    'tipo',
    'quantidade'
];
public function produto()
{
    return $this->belongsTo(Produto::class);
}

}
