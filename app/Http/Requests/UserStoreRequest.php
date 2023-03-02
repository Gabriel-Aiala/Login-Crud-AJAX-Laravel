<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
    protected function failedAuthorization()
    {
        if ($this->ajax()) {
            return response()->json([
                'message' => 'Authorization failed'
            ], 403);
        }
        // If it's not an AJAX request, fall back to the default behavior
        parent::failedAuthorization();
    }
}
