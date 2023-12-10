<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'preco', 'categoria_id'];

    private $rules = [
        'nome' => 'required',
        'descricao' => 'required',
        'preco' => 'required',
        'categoria_id' => 'required'
    ];

    public function validate($data)
    {
        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            return $validator;
        }
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
