<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\ProjectService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class ProjectContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.project.create');
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
            'projects.*.email' => 'required|email',
            'projects.*.password' => 'required',
            'projects.*.description' => 'required'
        ]);

        DB::beginTransaction();
        try {

            foreach ($request->projects as $key => $value) {
                Project::create($value);
            }
            DB::commit();
            return redirect()->route('project.index')->with('success', 'Success added project');
        } catch (Exception $e){
            DB::rollback();
            return redirect()->route('project.index')->with('error', $e->getMessage());
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
        try {
            $project = Project::with('editor:id,name', 'creator:id,name')->findOrFail($id);

           return view('pages.project.show', compact('project'));

        } catch(Exception $e){
            return redirect()->route('project.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $project = Project::select('id', 'email', 'password', 'description')->findOrFail($id);

           return view('pages.project.edit', compact('project'));

        } catch(Exception $e){
            return redirect()->route('project.index')->with('error', $e->getMessage());
        }
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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'description' => 'required'
        ]);

        try {
            $project = Project::findOrFail($id);

            $project->update($request->all());

            return redirect()->route('project.index')->with('success', 'Success update');

        } catch (Exception $e){
            return redirect()->route('project.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $project = Project::findOrFail($id);
            $project->delete();
            
            return response()->json([
                'message' => 'Success Delete',
            ]);

        } catch(Exception $e){
            return response()->json([
                'message' => 'upps something when wrong'
            ]);
        }
    }

    public function datatables(ProjectService $service)
    {
        return $service->getDatatables();
    }

    public function select(Request $request)
    {
        $keyword = $request->search;

        $projects = Project::select('id', 'email')
            ->where('type', null)
            ->where('email', 'like', "%{$keyword}%")
            ->orderBy('email')
            ->get()->take(10);

        $result = [];

        foreach ($projects as $project) {
            $result[] = [
                "id" => $project->id,
                "text" => $project->email,
            ];
        }

        return $result;
        
    }

    public function selected(Project $project)
    {
        return response()->json([
            "id" => $project->id,
            "text" => $project->email,
        ]);
    }
}
