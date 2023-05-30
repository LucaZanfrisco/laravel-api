<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request){

        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'messagge' => 'nullable|string'
        ]);

        $lead =  new Lead();
        $lead->nome = $data['name'];
        $lead->email = $data['email'];
        $lead->messaggio = $data['messagge'];
        $lead->save();

        
    }
}
