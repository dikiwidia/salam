<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\Salam\Pengguna;
use App\Salam\Guru;

class PenggunaStoreRequest extends Request
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
        $cePeng = Pengguna::get();
        if($cePeng->count() == 0){ 
            $ceGuru = Guru::where('status','A')->get();
        } else {
            foreach($cePeng as $t){
                $arr[] = $t->guru;
            }
            $ceGuru = Guru::whereNotIn('id',$arr)->where('status','A')->get();
        }
        
        foreach($ceGuru as $r){
            $final[] = $r->id;
        }
        $g = implode(', ', $final);

        return [            
            'nickname'      => 'required|string|regex:/^\S+$/|max:6|unique:pengguna,nickname',
            'guru'          => 'required|in:'.$g
        ];
    }
}
