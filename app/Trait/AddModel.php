<?php
namespace App\Trait;
use Illuminate\Support\Facades\Auth;

trait AddModel
{
  protected static function boot()
  {
    parent::boot();
    static::creating(function ($model) {
        $model->created_by = Auth::user()->id;
        $model->updated_by = Auth::user()->id;
    });

    static::updating(function ($model) {
        $model->updated_by = Auth::user()->id;
    });
  }
}

?>