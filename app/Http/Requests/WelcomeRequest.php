<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WelcomeRequest extends FormRequest
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
            'name'=>'required|max:255',
            'excerpt'=>'required|max:255',
            'description'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:4',
            'date_of_birth'=>'required',
            'languages'=>'required',
            'expert_in'=>'required'
        ];
    }
}
