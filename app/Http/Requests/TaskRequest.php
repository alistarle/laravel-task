<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class TaskRequest extends FormRequest
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
        if($this->is('api/todo/*'))
            $rules = [
                'content' => 'required|string|min:3',
                'todo_id' => 'required|integer|min:1',
                'priority' => 'integer'
            ];
        else
            $rules = [
                'content' => 'string|min:3',
                'todo_id' => 'integer|min:1',
                'priority' => 'integer'
            ];

        return $rules;
    }

    public function response(array $errors)
    {
        if($this->is("api/*"))
            return new JsonResponse($errors, 422);
        else
            return $this->redirector->to($this->getRedirectUrl())
                ->withInput($this->except($this->dontFlash))
                ->withErrors($errors, $this->errorBag);
    }
}
