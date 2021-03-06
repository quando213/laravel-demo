<?php

namespace App\Http\Requests;

use App\Enums\CommonStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => ['required', 'min:6'],
            'dob' => ['date'],
            'avatar' => ['string'],
            'status' => [Rule::in(CommonStatus::getValues())],
        ];
        if (request()->isMethod('put')) {
            $rules['email'] = ['required', 'email', Rule::unique('users')->ignore($this->id)];
            $rules['password'] = ['min:6'];
        }
        return $rules;
    }
}
