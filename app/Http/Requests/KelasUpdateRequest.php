<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\Salam\Guru;

class KelasUpdateRequest extends Request
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
        $guru = new Guru;
        foreach($guru->get() as $guru){
            $arr[] = $guru->id;
        }
        $g = implode(', ', $arr);

        return [
            'nama'      => 'required|string|max:50',
            'kapasitas' => 'required|numeric|max:100',
            'jenjang'   => 'required|in:SD,SMP,SMA',
            'wali_kelas'=> 'required|in:'.$g,
        ];
    }
}
