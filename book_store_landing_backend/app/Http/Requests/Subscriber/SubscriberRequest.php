<?php

namespace App\Http\Requests\Subscriber;

use Illuminate\Foundation\Http\FormRequest;

class SubscriberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:255',
            'question' => 'nullable|string',
            'frequency' => 'required|string|max:50',
            'new_arrivals' => 'nullable|boolean',
            'selection_by_genre' => 'nullable|boolean',
            'recommended_papers' => 'nullable|boolean',
            'discount_notifications' => 'nullable|boolean',
        ];
    }
}
