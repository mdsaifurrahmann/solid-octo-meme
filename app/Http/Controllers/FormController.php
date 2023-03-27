<?php

namespace App\Http\Controllers;

use App\Models\form;
use App\Http\Requests\StoreformRequest;
use App\Http\Requests\UpdateformRequest;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;




class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // if (!Auth::check() || !Auth::user()->hasRole('admin')) {
        //     return redirect()->route('login');
        // }


        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.frontend.form', ['pageConfigs' => $pageConfigs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreformRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreformRequest $request)
    {

        $request->validated();

        $language_data = [];
        $hobby_data = [];

        if (!empty($request->language)) {

            foreach ($request->language as $language) {
                $language_data[] = $language;
            };

            $lang_final = json_encode($language_data);
        }
        if (!empty($request->hobby)) {

            foreach ($request->hobby as $hbby) {
                $hobby_data[] = $hbby;
            };

            $hobby_final = json_encode($hobby_data);
        }


        $data = [
            'full_name' => $request->full_name,
            'roll' => $request->roll,
            'student_id' => $request->student_id,
            'dob' => $request->dob,
            'fathers_name' => $request->fathers_name,
            'mothers_name' => $request->mothers_name,
            'department' => $request->department,
            'semester' => $request->semester,
            'blood' => $request->blood,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
            'gender' => $request->gender
        ];


        form::create($data + ['hobby' => $hobby_final] + ['language' => $lang_final]);

        return redirect()->back()->with('success', 'Form data saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateformRequest  $request
     * @param  \App\Models\form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateformRequest $request, form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(form $form)
    {
        //
    }
}
