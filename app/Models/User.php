<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'user_table';
    protected $primaryKey = "user_id";
    protected $fillable = ['name', 'email', 'age','phone', 'city'];
}
