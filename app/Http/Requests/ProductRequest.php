<?php

namespace App\Http\Requests;

use App\Enums\CommonStatus;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['string'],
            'category_id' => ['required', 'integer'],
            'thumbnail' =>  ['required', 'string'],
            'images' =>  ['required', 'string'],
            'status' => [Rule::in(CommonStatus::getValues())],
            'options.*.size_id' => ['required', 'integer'],
            'options.*.color_id' => ['required', 'integer'],
            'options.*.quantity' => ['required', 'integer'],
            'options.*.status' => [Rule::in(CommonStatus::getValues())],
        ];
        if (request()->isMethod('post')) {
            $rules['options'] = ['required', 'array', 'min: 1'];
        }
        return $rules;
    }
}
