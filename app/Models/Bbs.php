<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Bbs extends Model
{
    use HasFactory; //Этот трейт применяется при автоматизированном тестировании

    protected $fillable = ['title', 'content', 'price'];

    /**
     * Связь таблиц БД "bbs" и "users".
     * объявление «обратной» связи (между вторичной и первичной моделями) в модели вторичной таблицы (стр.58)
     *
    */
    public function user(){
        return $this->belongsTo(User::class);
        //return $this->belongsTo(User::class, 'user_id');
    }
}
