<?php

namespace App\Services;

use App\Models\Netflix;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class NetflixService {

  public function getDatatables(){
    $datatables = DataTables::of(Netflix::with('creator:id,name', 'project:id,email,password')->get())
        ->addIndexColumn()
        ->addColumn('email_project',function ($netflix){
          return $netflix->project->email;
        })
        ->addColumn('password_project',function ($netflix){
          return $netflix->project->password;
        })
        ->editColumn('status', function ($netflix){
          return $netflix->status ? '<span class="badge badge-success">Sold</span>' : '<span class="badge badge-primary">Available</span>' ;
        })
        ->addColumn('created_by', function ($netflix){
          return $netflix->creator->name;
        })

        ->addColumn('created_at', function ($netflix){
          return Carbon::parse($netflix->created_at)->format('d-m-Y');
        })
        ->addColumn('action', function ($netflix) {
          return '
          <div class="dropdown">
              <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <a class="dropdown-item" href="'.route('netflix.edit', $netflix->id).'">Edit</a>
                  <a class="dropdown-item" href="'.route('netflix.show', $netflix->id).'">Show</a>
                  <a class="dropdown-item delete" href="#">Delete</a>
              </div>
          </div>
          ';
        })
        ->rawColumns(['status', 'action'])
        ->make();

    return $datatables;
  }

}


?>