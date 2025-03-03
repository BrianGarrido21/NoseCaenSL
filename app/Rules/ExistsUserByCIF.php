<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class ExistsUserByCIF implements Rule
{
    protected $cif;
    protected $phone;

    public function __construct($cif)
    {
        $this->cif = $cif;
    }

    public function passes($attribute, $value)
    {
        $user = User::where('cif', $this->cif)->where('phone', $value)->first();
        return $user !== null;
    }

    public function message()
    {
        return __('The CIF and the telephone number do not match the same user in the system.');
    }
}
