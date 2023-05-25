<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.project.create',compact('types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $project = new Project();
        if(isset($data['immagine'])){
            $project->immagine = Storage::put('uploads', $data['immagine']);
        }
        $project->fill($data);
        $project->slug = Str::slug($data['nome'], '-');
        $project->save();
        if(isset($data['technologies'])){
            $project->technologies()->sync($data['technologies']);
        }

        return redirect()->route('admin.project.index')->with('message','Progetto aggiunto con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.project.edit', compact('project','types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        if(isset($data['immagine'])){
            if($project->immagine){
               Storage::delete($project->immagine); 
            }
            $project->immagine = Storage::put('uploads', $data['immagine']);
        }

        $project->slug = Str::slug($data['nome'], '-');

        $technologies = isset($data['technologies']) ? $data['technologies'] : [];
        $project->technologies()->sync($technologies);

        $project->update($data);

        return redirect()->route('admin.project.index')->with('message', "Progetto $project->id modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $deleteProject = $project->nome;

        if($project->immagine){
            Storage::delete($project->immagine);
        }
        
        $project->delete();
        return to_route('admin.project.index')->with('message', "Deleted $deleteProject successfully");
    }
}
