<?php

namespace App\Http\Requests;

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
        // Rule::unique('products')->ignore($this->product->id)

        $rule =  [
            'name'  => ['required', 'min:5'],
            'harga' => 'required|numeric',
            'stock' => 'required|numeric',
        ];
        if ($this->product) {
            $rule['name'][] = Rule::unique('products')->ignore($this->product->id);
        } else {
            $rule['name'][] = 'unique:products';
        }


        return $rule;
    }

    public function messages()
    {
        return [
            'name.min' => 'Nama produk tidak boleh kurang dari 5 kata'
        ];
    }
}
