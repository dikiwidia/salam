<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MapelStoreRequest extends Request
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
            'kode_mapel'=> 'required|string|max:10|unique:mapel,kode_mapel',
            'nama_idn'  => 'required|string|max:50',
            'nama_eng'  => 'string|max:50',
            'sks'       => 'numeric|max:10',
        ];
    }
}
