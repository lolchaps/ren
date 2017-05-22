<?php 

namespace App\Models;

class User extends Model
{
    protected $fillable = ['name'];

    public $timestamps = false;
}