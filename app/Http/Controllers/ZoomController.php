<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Zoom;
use App\Services\ZoomService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.zooms.zoom.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.zooms.zoom.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'zoom.*.project_id' => 'required|exists:projects,id',
            'zoom.*.zoom_type_id' => 'required|exists:type_zooms,id',
            'zoom.*.password' => 'required',
            'zoom.*.country' => 'required',
        ]);


        DB::beginTransaction();
        try {

            foreach ($request->zoom as $key => $value) {
                $zoom = Zoom::create($value);
                $project = Project::find($zoom->project_id);
                $project->update([
                    'type' => 'zoom'
                ]);
            }
            DB::commit();
            return redirect()->route('zoom.index')->with('success', 'Success added zoom account');
        } catch (Exception $e){
            DB::rollback();
            return redirect()->route('zoom.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function datatables(ZoomService $service)
    {
        return $service->getDatatables();
    }
    
}
