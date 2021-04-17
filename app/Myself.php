<?php

namespace App;

use App\Auth\Root;

final class Myself extends Root
{
    public $name = 'John Freeman';
    public $nickname = 'Johnny';
    public $email = 'john@johnfreeman.dev';
    public $dob = '1985-09-07';

    public function age()
    {
        return now()->diffInYears($this->dob);
    }
}
