<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;

class RedirectToCommandController
{
    public function __invoke(Request $request)
    {
        $input = new StringInput($request->string('input'));

        $input->bind(new InputDefinition([
            new InputArgument('segments', InputArgument::IS_ARRAY),
            new InputOption('fresh', 'f'),
        ]));

        return redirect(implode('/', $input->getArguments()['segments']));
    }
}
