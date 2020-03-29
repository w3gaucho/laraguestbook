<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $table = 'mensagens';

    protected $fillable = ['mensagem'];

    protected $dates = ['created_at', 'updated_at'];
}
