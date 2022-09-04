<?php

namespace App\Services;

use App\Models\Zoom;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class ZoomService {

  public function getDatatables(){
    $datatables = DataTables::of(Zoom::with('creator:id,name', 'project:id,email', 'type:id,name')->get())
        ->addIndexColumn()
        ->addColumn('email', function ($zoom){
          return $zoom->project->email;
        })
        ->addColumn('type', function ($zoom){
          return $zoom->type->name;
        })
        ->addColumn('created_at', function ($zoom){
          return Carbon::parse($zoom->created_at)->format('d-m-Y');
        })
        ->addColumn('created_by', function ($zoom){
          return  $zoom->creator->name;
        })

        ->addColumn('action', function ($zoom) {
          return '
          <div class="dropdown">
              <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <a class="dropdown-item" href="'.route('zoom.edit', $zoom->id).'">Edit</a>
                  <a class="dropdown-item" href="'.route('zoom.show', $zoom->id).'">Show</a>
                  <a class="dropdown-item delete" href="#">Delete</a>
              </div>
          </div>
          ';
        })
        ->make();

    return $datatables;
  }

}


?>