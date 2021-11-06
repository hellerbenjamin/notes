<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:50',
            'note'  => 'required|max:1000',
        ];
    }
}
