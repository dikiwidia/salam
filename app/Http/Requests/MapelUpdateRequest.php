<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MapelUpdateRequest extends Request
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
            'nama_idn'  => 'required|string|max:50',
            'nama_eng'  => 'string|max:50',
            'sks'       => 'numeric|max:10',
            'status'    => 'required|in:A,N'
        ];
    }
}
