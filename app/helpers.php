<?php

function convertInputToRedirect(string $input): \Illuminate\Http\RedirectResponse
{
    $input = new \Symfony\Component\Console\Input\StringInput($input);

    $input->bind(new \Symfony\Component\Console\Input\InputDefinition([
        new \Symfony\Component\Console\Input\InputArgument('segments', \Symfony\Component\Console\Input\InputArgument::IS_ARRAY),
        new \Symfony\Component\Console\Input\InputOption('fresh', 'f'),
    ]));

    return redirect(implode('/', $input->getArguments()['segments']));
}