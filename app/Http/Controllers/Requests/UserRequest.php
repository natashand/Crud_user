<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 05.03.2019
 * Time: 21:24
 */

namespace App\Http\Controllers\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];
    }
}