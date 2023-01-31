<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
      //must assignment value set kore dilam,,,mane ei value ta must fillup kortei hobe nahole error
}
