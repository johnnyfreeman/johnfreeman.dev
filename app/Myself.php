<?php

namespace App;

use App\Auth\Root;
use Carbon\Carbon;

final class Myself extends Root
{
    public $name = 'John Freeman';

    public $nickname = 'John';
    
    public $email = 'john@johnfreeman.dev';

    public function birth(): Carbon
    {
        return new Carbon('1985-09-07');
    }

    public function rvLife(): Carbon
    {
        return new Carbon('2018-07-01');
    }

    public function codingPassion(): Carbon
    {
        return new Carbon('1999-01-01');
    }
}
