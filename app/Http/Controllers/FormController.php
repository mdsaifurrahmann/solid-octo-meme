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
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;




class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $list = Form::all();

        $list = DB::table('form')->get();

        // $pageConfigs = ['myLayout' => 'blank'];
        return view('content.frontend.list',  compact('list'));
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


        // Hanfle the file name for Database
        $file_name = time() . Str::upper(Str::random(16)) . '.' . $request->file->extension();
        // move the file
        $request->file->move(public_path('student-images'), $file_name);


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
            'gender' => $request->gender,
            'file' => $file_name
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
    public function show(form $form, $id)
    {
        $single = form::findOrFail($id);

        return view('content.frontend.single', compact('single'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(form $form, $id)
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You\'re not authenticated!');
        }


        $single = form::findOrFail($id);

        $languages = json_decode($single->language);

        $hobbies = json_decode($single->hobby);

        // dd($languages);
        return view('content.frontend.update', compact('single', 'languages', 'hobbies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateformRequest  $request
     * @param  \App\Models\form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateformRequest $request, form $form, $id)
    {

        if (Auth::check()) {
            return redirect()->route('login')->with('error', 'You\'re not authenticated!');
        }

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


        // delete old image on update

        $getData = form::where('id', $id)->first();

        $imageName = $getData->file;


        if ($request->hasFile('file')) {
            if (File::exists(public_path('student-images/') . $imageName)) {
                File::delete(public_path('student-images/') . $imageName);
            }

            // Hanfle the file name for Database
            $file_name = time() . Str::upper(Str::random(16)) . '.' . $request->file->extension();
            // move the file
            $request->file->move(public_path('student-images'), $file_name);
        } else {
            $file_name = $getData->file;
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
            'gender' => $request->gender,
            'file' => $file_name
        ];


        form::findOrFail($id)->update($data + ['hobby' => $hobby_final] + ['language' => $lang_final]);

        return redirect()->back()->with('success', 'Form data saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(form $form, $id)
    {
        // delete the applicant
        if (Auth::check()) {
            if (form::where('id', $id)->exists()) {
                // remove file from storage
                $applicant = form::where('id', $id)->first();
                $image_path = $applicant->file;

                if (File::exists(public_path('student-images/') . $image_path)) {
                    File::delete(public_path('student-images/') . $image_path);
                } else {
                    return redirect()->back()->with('destroy-error', 'Images are not found associated with this Applicant!');
                }

                form::where('id', $id)->delete();
                return redirect()->route('list')->with('destroy-success', 'Applicant deleted successfully!');
            } else {
                return redirect()->route('list')->with('destroy-error', 'Applicant does not exist! So can not delete!');
            }
        } else {
            return redirect()->route('login')->with('error', 'You are not authorized to delete this applicant!');
        }
    }
}
