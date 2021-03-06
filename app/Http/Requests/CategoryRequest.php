<?php

namespace App\Http\Requests;

use App\Enums\CommonStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        return [
            'name' => ['required', 'string'],
            'sort_number' => ['numeric'],
            'parent_id' => ['numeric'],
            'size_id' => ['numeric'],
            'status' => [Rule::in(CommonStatus::getValues())],
        ];
    }
}
