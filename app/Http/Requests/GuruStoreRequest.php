<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GuruStoreRequest extends Request
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
            'niptk'          => 'numeric|unique:guru,niptk',
            'nama'           => 'required|string|max:100',
            'jenis_kelamin'  => 'in:L,P|required',
            'status_perkawinan'  => 'in:BM,M,J,D|required',
            'kode_pos'       => 'numeric'
        ];
    }
}
