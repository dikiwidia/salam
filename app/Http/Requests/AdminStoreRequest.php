<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminStoreRequest extends Request
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
            'nickname'      => 'required|string|regex:/^\S+$/|max:6|unique:admin,nickname',
            'nama'          => 'required|string|max:100',
            'mod_santri'    => 'required|in:N,Y',
            'mod_pendidik'  => 'required|in:N,Y',
            'mod_akademik'  => 'required|in:N,Y'
        ];
    }
}
