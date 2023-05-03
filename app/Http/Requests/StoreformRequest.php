<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreformRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'full_name' => 'string|required',
            'roll' => 'int|required',
            'student_id' => 'int|required',
            'dob' => 'string|required',
            'fathers_name' => 'string|required',
            'mothers_name' => 'string|required',
            'department' => 'string|required',
            'semester' => 'string|required',
            'blood' => 'string|required',
            'country' => 'string|required',
            'language' => 'array|required',
            'phone' => 'string|required',
            'email' => 'email|required',
            'gender' => 'string|required',
            'hobby' => 'array|required',
            'file' => 'image|file|required|max:1024'
        ];
    }

    public function messages()
    {
        return [
            'full_name.string' => 'Full Name Must be a String.',
            'full_name.required' => 'Full name is required.',
            'roll.int' => 'Roll must be intiger',
            'roll.requireed' => 'roll is required',
            'student_id.int' => 'student id must be intiger',
            'student_id.required' => 'student id is required',
            'dob.string' => 'date of birth must be string',
            'dob.required' => 'date of birth is required',
            'fathers_name.required' => 'father\'s name is required',
            'fathers_name.string' => 'father\'s must be string',
            'mothers_name.string' => 'mother\'s must be string',
            'mothers_name.required' => 'mother\'s name is required',
            'department.string' => 'department must be string',
            'department.required' => 'department is required',
            'semester.required' => 'semseter is required',
            'somester.string' => 'semseter must be string',
            'blood.required' => 'blood group is required',
            'blood.string' => 'blood group must be string',
            'country.string' => 'country must be string',
            'country.required' => 'country is required',
            'language.required' => 'language is required',
            'language.array' => 'language must be array',
            'phone.required' => 'phone number is requied',
            'phone.string' => 'phone number must be string',
            'email.email' => 'email must be email',
            'email.required' => 'email is required',
            'gender.string' => 'gender must be string',
            'gender.required' => 'gender is required',
            'hobby.required' => 'hobby is required',
            'hobby.array' => 'hobby must be array',
            'file.file' => 'file must be type of file',
            'file.image' => 'file must be image',
            'file.required' => 'you must choose a file',
            'file.size' => 'max file size is 1024KB'
        ];
    }
}
