<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormRequest;
use App\Http\Resources\FormResource;
use App\Models\Form;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FormResource::collection(Form::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFormRequest $request)
    {
        $validator = $request->validated();
        $formExists = Form::where("user_id", $validator["user_id"])->where("formable_id", $validator["formable_id"])->where("formable_type", $validator["formable_type"])->first();

        if (!$formExists) {
            $form = Form::create($validator);


            foreach ($validator["answers"] as $answer) {
                $form->questions()->attach($answer["question_id"], ["answer" => $answer["answer"]]);
            }

            return new FormResource($form);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Form $form)
    {
        return new FormResource($form);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form $form)
    {
        //
    }
}
