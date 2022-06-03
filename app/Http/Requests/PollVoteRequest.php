<?php

namespace App\Http\Requests;

use App\Rules\PollRules;
use Illuminate\Foundation\Http\FormRequest;

class PollVoteRequest extends FormRequest
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
            'option_id' => 'required|exists:options,id',
        ];
    }

}
