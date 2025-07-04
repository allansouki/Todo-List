<?php

namespace App\Models;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;




class Task extends Model
{
     use HasFactory, Notifiable;
    protected $fillable = [
        'title',
        'is_done',
        'description',
        'due_date',
        'duo_date',
        'user_id',
        'category_id'
    ];


public function user(){


    return $this->belongsTo(User::class);
}



public function category(){


    return $this->belongsTo(category::class);
}

public function tasks(){

    return $this->hasMany(Task::class);

}

public function categories(){
    return $this->hasMany(category::class);

}
}
