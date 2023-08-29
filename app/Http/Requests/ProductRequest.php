<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->slug ?? $this->name),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(Request $request): array
    {
        return [
            'name' => ['required', 'string', 'between:3,255'],
            'slug' => ['required', 'string', 'between:3,255', Rule::unique('products')->ignore($this->product)],
            'discount_price' => ['nullable', 'integer', 'min:10', 'max:100000'],
            'description' => ['required', 'string', 'min:10'],
            'image' => [Rule::requiredIf($request->isMethod('post')), 'image'],
            'price' => ['required', 'integer', 'min:10', 'max:100000'],
            'stock' => ['required', 'integer', 'min:0', 'max:1000'],
        ];
    }
}
