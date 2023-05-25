<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('admin.technology.index',compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.technology.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTechonologyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechnologyRequest $request)
    {
        $data = $request->validated();
        
        $new_technology = new Technology();

        $new_technology->fill($data);

        $new_technology->slug = Str::slug($new_technology->nome);

        $new_technology->save();

        return to_route('admin.technologies.index')->with('message', 'Tecnologia aggiunta con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Techonology  $techonology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        return view('admin.technology.show',compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Techonology  $techonology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        return view('admin.technology.edit',compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTechonologyRequest  $request
     * @param  \App\Models\Techonology  $techonology
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $data = $request->validated();
        $technology->slug = Str::slug($data['nome']);
        $technology->update($data);

        return to_route('admin.technologies.index')->with('message', "Tecnologia $technology->id modificata con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Techonology  $techonology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $deletedTechnology = $technology->id;

        $technology->delete();

        return to_route('admin.technologies.index')->with('message', "Tecnologia $deletedTechnology eliminata con successo");
    }
}
