<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index(){

        $leads = Lead::all();

        return view('admin.lead.index', compact('leads'));
    }
    
    public function destroy(Lead $lead){

        $deleteLead = $lead->id;
        $lead->delete();
        return to_route('admin.leads.index')->with('message', "Messaggio $deleteLead eliminato con successo");
    }
}
