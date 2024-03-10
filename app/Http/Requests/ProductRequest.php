<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules(): array
    {
       $rules = [
           'name' => 'required|min:5',
           'description' => 'required|min:50',
           'quantity' => 'required|numeric',
           'price' => 'required|numeric',
       ];
       if ($this->route()->getActionMethod() === 'store') {
           $rules['image'] = 'required|image';
       }
       dd($this->route()->getActionMethod());

       return $rules;

    }
}
