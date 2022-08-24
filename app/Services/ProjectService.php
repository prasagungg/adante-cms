<?php

namespace App\Services;

use App\Models\Project;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class ProjectService {

  public function getDatatables(){
    $datatables = DataTables::of(Project::with('creator:id,name')->get())
        ->addIndexColumn()
        ->addColumn('created_by', function ($project){
          return $project->creator->name;
        })
        ->addColumn('created_at', function ($project){
          return Carbon::parse($project->created_at)->format('d-m-Y');
        })
        ->addColumn('action', function ($project) {
          return '
          <div class="dropdown">
              <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <a class="dropdown-item" href="'.route('project.edit', $project->id).'">Edit</a>
                  <a class="dropdown-item" href="'.route('project.show', $project->id).'">Show</a>
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