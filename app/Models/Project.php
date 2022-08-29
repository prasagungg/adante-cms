<?php

namespace App\Models;

use App\Trait\AddModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    use HasFactory, AddModel;

    protected $fillable = ['email', 'password', 'description', 'created_by', 'updated_by', 'type'];


    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }


}
