<?php

namespace App\Http\Controllers;

use App\Models\Netflix;
use App\Models\Project;
use App\Services\NetflixService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NetflixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.netflix.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.netflix.create');
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
            'netflix.*.project_id' => 'required|exists:projects,id',
            'netflix.*.password' => 'required',
            'netflix.*.price' => 'required',
        ]);


        DB::beginTransaction();
        try {

            foreach ($request->netflix as $key => $value) {
                $netflix = Netflix::create($value);
                $project = Project::find($netflix->project_id);
                $project->update([
                    'type' => 'netflix'
                ]);
            }
            DB::commit();
            return redirect()->route('netflix.index')->with('success', 'Success added netflix account');
        } catch (Exception $e){
            DB::rollback();
            return redirect()->route('netflix.index')->with('error', $e->getMessage());
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

    public function datatables(NetflixService $service)
    {
        return $service->getDatatables();
    }
}
