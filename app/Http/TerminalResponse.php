<?php

namespace App\Http;

use Illuminate\Support\HtmlString;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;

class TerminalResponse implements Responsable
{
    protected View $view;

    public function __construct(string $input) {
        $this->view = $this->convertInputToView($input);
    }

    public function with($key, $value = null): static
    {
        $this->view->with($key, $value);

        return $this;
    }

    public function convertInputToView(string $input): View
    {
        $input = new StringInput($input);
    
        $input->bind(new InputDefinition([
            new InputArgument('segments', InputArgument::IS_ARRAY),
            new InputOption('fresh', 'f'),
        ]));
    
        $view = 'output.' . implode('.', $input->getArguments()['segments']);
    
        if (!\Illuminate\Support\Facades\View::exists($view)) {
            abort('404');
        }
    
        return view($view, $input->getOptions());
    }

    public function toResponse($request)
    {
        if ($request->wantsTurboStream()) {
            return turbo_stream()
                ->append('output', $this->view)
                ->toResponse($request);
        }

        return response()->view('terminal', [
            'output' => new HtmlString($this->view->render()),
        ]);
    }
}
