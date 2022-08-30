<?php

namespace App\Http\Controllers;

use App\Models\TypeZoom;
use App\Services\TypeZoomService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeZoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.zooms.type.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.zooms.type.create');
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
            'types.*.name' => 'required',
            'types.*.participants' => 'required',
            'types.*.host' => 'required',
            'types.*.price' => 'required'
        ]);

        
        DB::beginTransaction();
        try {

            foreach ($request->types as $key => $value) {
                TypeZoom::create($value);
            }
            DB::commit();
            return redirect()->route('type.index')->with('success', 'Success added type');
        } catch (Exception $e){
            DB::rollback();
            return redirect()->route('type.index')->with('error', $e->getMessage());
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

    public function datatables(TypeZoomService $service)
    {
        return $service->getDatatables();
    }
}
