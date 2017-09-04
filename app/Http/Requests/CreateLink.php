<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class CreateLink extends FormRequest
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
        return [
            'url' => 'required|url|max:255'
        ];
    }

    public function response(array $errors) {
        if ($this->expectsJson()) {
            // Return JSON when expected via 'Accept: application/json' header or ?return=json, ?return=json_on_error in the url
                return new JsonResponse([
                    'errors' => $errors,
                    'success' => false,
                    ], 200);
            }
            return $this->redirector->to($this->getRedirectUrl())
                                    ->withInput($this->except($this->dontFlash))
                                    ->withErrors($errors, $this->errorBag);
    }
}
