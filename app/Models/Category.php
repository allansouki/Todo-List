<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
class Category extends Model
{
    //

 use HasFactory, Notifiable;

=======

class Category extends Model
{
    //
>>>>>>> 6d2b341015f6b9bd730f3a879f2b88f5f681a7c8
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
