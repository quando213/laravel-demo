<?php

namespace App\Http\Requests;

use App\Enums\OrderStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
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
            'customer_name' => ['required', 'string'],
            'city_id' => ['required', 'integer'],
            'district_id' => ['required', 'integer'],
            'address' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'string', 'min:7', 'max:15'],
        ];
        if (request()->isMethod('put')) {
            $rules['is_paid'] = ['boolean'];
            $rules['status'] = [Rule::in(OrderStatus::getValues())];
        }
        return $rules;
    }
}
