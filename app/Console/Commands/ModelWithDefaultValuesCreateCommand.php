<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class ModelWithDefaultValuesCreateCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:modeld';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new model with default data';

    /**
     * Class type that is being created.
     *
     * @var string
     */
    protected $type = 'Model';

    /**
     * Specify your Stub's location.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return base_path() . '/stubs/model.default.data.stub';
    }

    /**
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Models';
    }
}
