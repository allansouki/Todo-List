<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;





class Category extends Model
{
    use HasFactory, Notifiable;
    //
    protected $fillable = [
        'title',
        'color',
        'user_id'
    ];


 public function user(){


    return $this->belongsTo(User::class);
 }

 public function tasks(){

    return $this->hasMany(Task::class);

}

}
