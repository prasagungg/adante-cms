<?php

namespace App\Models;

use App\Trait\AddModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeZoom extends Model
{
    use HasFactory, AddModel;

    protected $guarded = ['id'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function zooms()
    {
        return $this->hasMany(Zoom::class, 'zoom_type_id', 'id');
    }

}
