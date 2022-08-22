<?php

namespace App\Models;

use App\Trait\AddModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, AddModel;

    protected $fillable = ['email', 'password', 'description', 'created_by', 'updatedBy'];
}
