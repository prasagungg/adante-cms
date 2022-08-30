<?php

namespace App\Services;

use App\Models\TypeZoom;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class TypeZoomService {

  public function getDatatables(){
    $datatables = DataTables::of(TypeZoom::with('creator:id,name')->get())
        ->addIndexColumn()
        ->addColumn('price_rp', function ($type_zoom){
          return 'Rp. ' . number_format($type_zoom->price, 0, ',', '.');
        })
        ->addColumn('zoom_account', function ($type_zoom){
          return $type_zoom->zooms->count();
        })
        ->addColumn('created_at', function ($type_zoom){
          return Carbon::parse($type_zoom->created_at)->format('d-m-Y');
        })
        ->addColumn('action', function ($type_zoom) {
          return '
          <div class="dropdown">
              <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <a class="dropdown-item" href="'.route('type.edit', $type_zoom->id).'">Edit</a>
                  <a class="dropdown-item" href="'.route('type.show', $type_zoom->id).'">Show</a>
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