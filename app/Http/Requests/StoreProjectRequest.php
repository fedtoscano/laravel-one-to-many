<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            //
            'name' => 'required|string|max:255',
            "type_id" => "required",
            'description' => 'nullable|string',
            'client' => 'nullable|string|max:255',
            "image"=>"image",
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'nullable|string|in:in progress,completed,on hold,cancelled',
            'budget' => 'nullable|numeric|min:0',
            'repository' => 'nullable|url',
        ];
        [
            //eventuali messaggi di errore andranno qui!
        ];
    }
}
