<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class TodoRequest extends FormRequest
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
        if($this->todo != null)
            $rules = [
                'name' => 'string|min:3',
            ];
        else
            $rules = [
                'name' => 'required|string|min:3',
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
