<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SekolahRequest extends FormRequest
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
            'namasekolah' => 'required|string',
            // 'npsn' => 'numeric',
            // 'bentukpendidikan' => 'required',
            // 'alamat' => 'required|string',
            // 'kelurahan' => 'required|string',
            // 'kecamatan' => 'required|string',
            // 'distrik' => 'required|string',
            // 'provinsi' => 'required|string',
            // 'kodepos' => 'required|numeric',
            // 'lintang' => $request->lintang,
            // 'bujur' => $request->bujur,
            // 'telp' => $request->telp,
            // 'email' => 'email',
            // 'website' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            // 'logo' => 'image',
            
        ];
    }

    /**
    * Get custom attributes for validator errors.
    *
    * @return array
    */
    public function attributes()
    {
        return [
            'namasekolah' => 'nama sekolah',
            'bentukpendidikan' => 'bentuk pendidikan'
        ];
    }
}
