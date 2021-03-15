<?php

namespace App\Http\Requests;

use App\Enums\CommonStatus;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OptionRequest extends FormRequest
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
            'product_id' => ['integer'],
            'color_id' => ['integer'],
            'size_id' => ['integer'],
            'quantity' => ['integer', 'min:0'],
            'status' => [Rule::in(CommonStatus::getValues())],
        ];
        if (request()->isMethod('post')) {
            $rules['product_id'] = ['required', 'integer'];
            $rules['color_id'] = ['required', 'integer'];
            $rules['size_id'] = ['required', 'integer'];
            $rules['quantity'] = ['required', 'integer', 'min:0'];
        }
        return $rules;
    }
}
