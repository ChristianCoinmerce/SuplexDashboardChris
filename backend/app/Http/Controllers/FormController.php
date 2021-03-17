<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormStoreRequest;
use App\Models\Forms;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class FormController extends Controller
{
    public function create(Request $request)
    {

        if (auth()->user()) {
            return view('forms.create');}
        else {
            return redirect('/')->withErrors('You have not sufficient permissions for writing post');
        }
    }

    public function store(FormStoreRequest $request)
    {
        $opening_days = $request['opening_days'];
        $total_hours = $request['total_hours'];
        $validated = $request->validated();
        $hours1="";$hours2="";
        foreach($total_hours as $day1 => $hour){
            if (isset($hour)){
            $hours1.= $day1 . $hour . ',';
            };}foreach($opening_days as $key => $day2){
            if (isset($day2)){
            $hours2.= $day2 . ',';
            };
        }
        $validated['total_hours']=$hours1;
        $validated['opening_days']=$hours2;
        Forms::create($validated);
    }
}
