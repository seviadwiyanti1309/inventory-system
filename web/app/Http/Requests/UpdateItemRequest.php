<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => 'sometimes|required|string|max:255',
            'category_id' => 'sometimes|required|exists:categories,id',
            'stock'       => 'sometimes|required|integer|min:0',
            'unit'        => 'nullable|string|max:50',
            'price'       => 'sometimes|required|numeric|min:0',
            'description' => 'nullable|string',
        ];
    }
}
