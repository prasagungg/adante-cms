<?php

namespace App\Models;

use App\Trait\AddModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Netflix extends Model
{
    use HasFactory, AddModel;

    protected $fillable = ['project_id', 'password', 'price', 'created_by', 'updated_by'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
    
    public function getStatusBadgeAttribute()
    {
        return $this->status ? ['success', 'Sold'] : ['primary', 'Available'];
    }
    
}
