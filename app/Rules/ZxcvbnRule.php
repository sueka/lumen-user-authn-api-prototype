<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use ZxcvbnPhp\Zxcvbn;

class ZxcvbnRule implements Rule
{
    private Zxcvbn $zxcvbn;

    public function __construct()
    {
        $this->zxcvbn = new Zxcvbn;
    }

    public function passes($attribute, $value)
    {
        $strength = $this->zxcvbn->passwordStrength($value);

        return $strength['score'] >= 3;
    }

    public function message()
    {
        return 'The :attribute must be stronger.';
    }
}
