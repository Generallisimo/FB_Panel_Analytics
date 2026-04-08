<?php

namespace App\Http\Requests\Admin\Teams;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string',
            'buyer_owner_id'=>[
                'required',
                'integer',
                'exists:users,id',
                function($attribute, $value, $fail){
                    if(! User::isBuyer($value)){
                        $fail('Это не Баер');
                    }
                }
            ]
        ];
    }


}
