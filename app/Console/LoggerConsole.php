<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Console\OutputStyle;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\ConsoleOutput;


class LoggerConsole extends Command
{
    protected $name = 'LoggerConsole';
    protected $hidden = true;

    public ConsoleOutput $outputSymfony;
    public OutputStyle $outputStyle;

    public function __construct()
    {
        parent::__construct();

        $this->input = new StringInput("");

        $this->outputSymfony = new ConsoleOutput(decorated: true);
        $this->outputStyle = new OutputStyle($this->input, $this->outputSymfony);

        $this->output = $this->outputStyle;
    }

    public function json(array|object $value)
    {
        $time = Carbon::now();
        $this->warn("[$time] LoggerConsole Listener => ");
        $this->info(json_encode($value, JSON_PRETTY_PRINT), null);
    }

    public function log_info(string $string, $verbosity = null)
    {
        $time = Carbon::now();
        $this->warn("[$time] LoggerConsole Listener => ");
        $this->info(json_encode($string, JSON_PRETTY_PRINT), $verbosity);
    }

    public function log_warning($string, $verbosity = null)
    {
        $time = Carbon::now();
        $this->warn("[$time] LoggerConsole Listener => ");
        $this->warn(json_encode($string, JSON_PRETTY_PRINT), $verbosity);
    }

    public function log_error(string $string, $verbosity = null)
    {
        $time = Carbon::now();
        $this->warn("[$time] LoggerConsole Listener => ");
        $this->error(json_encode($string, JSON_PRETTY_PRINT), $verbosity);
    }
}

