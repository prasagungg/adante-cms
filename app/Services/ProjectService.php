<?php

namespace App\Services;

use App\Models\Project;
use Yajra\DataTables\Facades\DataTables;

class ProjectService {
  public function getDatatables(){
    $datatables = DataTables::of(Project::get())
        ->addIndexColumn()
        ->make();
  }

}


?>