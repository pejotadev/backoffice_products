<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    private $rules = [
        'nome' => 'required|max:255'
    ];

    public function validate($data)
    {
        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            return $validator;
        }
    }

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
