<?php

namespace App\Http\Requests\Admin\Users;

use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $sellerRoleId = Role::where('role', 'seller')->value('id');

        return [
            'name'=>'required|string',
            'role_id'=>'required|integer|exists:roles,id',
            'password'=>[
                Rule::requiredIf((int) $this->role_id !== (int) $sellerRoleId),
                'nullable',
                'string'
            ],
            'team_id'=>'nullable|integer|exists:teams,id',
            'support_id'=>[
                'nullable',
                'integer',
                'exists:users,id',
                function($attribute, $value, $fail){
                    if(!$value){
                        return;
                    }

                    if(! User::isSupport((int) $value)){
                        $fail('Это не саппорт');
                    }
                }
            ]
        ];
    }


}
