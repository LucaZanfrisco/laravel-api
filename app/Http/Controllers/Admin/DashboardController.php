<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index (){
        $listaProgetti = Project::all();
        $listaTechnologie = Technology::all();
        $listaTipologie = Type::all();
        $listaContatti = Lead::all();
        $numeroContatti = $listaContatti ? count($listaContatti) : 0;
        $numeroTipologie = $listaTipologie ? count($listaTipologie) : 0;
        $numeroProgetti = $listaProgetti ? count($listaProgetti) : 0;
        $numeroTecnologie = $listaTechnologie ? count($listaTechnologie) : 0;

        $data = [
            "numeroProgetti" => $numeroProgetti,
            "numeroTecnologie" => $numeroTecnologie,
            "numeroTipologie" => $numeroTipologie,
            "numeroContatti" => $numeroContatti
        ];
        return view('admin.dashboard', compact("data"));
    }
}
