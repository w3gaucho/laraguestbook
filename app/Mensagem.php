<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $table = 'mensagens';

    protected $fillable = ['cookieDelete','mensagem'];

    protected $dates = ['created_at', 'updated_at'];
}
