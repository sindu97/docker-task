<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
        $methodName = $this->route()->getActionMethod();

        return match ($methodName) {
            'store' => $this->createValidation(),
            'update' => $this->updateValidation(),
            default => [],
        };
    }


    private function createValidation(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:0,1,2',
            'priority' =>  'required|in:0,1,2',
            'due_date' => 'required|date',
        ];
    }

    private function updateValidation(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:0,1,2',
            'priority' =>  'required|in:0,1,2',
            'due_date' => 'required|date',
        ];
    }
}
