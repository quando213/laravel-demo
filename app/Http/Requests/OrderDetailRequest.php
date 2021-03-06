<?php

namespace App\Http\Requests;

use App\Enums\OrderStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderDetailRequest extends FormRequest
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
            'option_id' => ['required', 'integer'],
            'quantity' => ['required', 'integer'],
        ];
        if (request()->isMethod('post')) {
            $rules['order_id'] = ['required', 'integer'];
            $rules['product_id'] = ['required', 'integer'];
        }
        return $rules;
    }
}
