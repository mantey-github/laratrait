<?php

namespace Mantey\Laratrait\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class TraitMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'make:trait
                        {name : The name of the trait}
                        {--path= : The path for the trait}
                        {--func= : List of functions (separated by ,) in trait}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new trait';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Trait';


    protected $functionStub = "\tpublic function {DummyFunction}()\n\t{\n\n\t}\n\n";

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/trait.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        $pathName = rtrim($this->option('path'), '/');
        return $rootNamespace . ($pathName ? "\\" . $pathName : "") . '\Traits';
    }

    /**
     * Execute the console command.
     *
     * @return bool|null
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        $name = $this->qualifyClass(trim($this->argument('name')));
        $path = $this->getPath($name);

        $func = $this->option('func');

        // First we will check to see if the class already exists. If it does, we don't want
        // to create the class and overwrite the user's code. So, we will bail out so the
        // code is untouched. Otherwise, we will continue generating this class' files.
        if ((!$this->hasOption('force') || !$this->option('force')) && $this->alreadyExists(trim($this->argument('name')))) {
            $this->error($this->type . ' already exists!');

            return false;
        }

        // Next, we will generate the path to the location where this class' file should get
        // written. Then, we will build the class and make the proper replacements on the
        // stub files so that it gets the correctly formatted namespace and class name.
        $this->makeDirectory($path);

        $this->files->put($path, $this->buildTrait($name, $func));

        $this->info($this->type . ' created successfully.');
    }


    /**
     * Build the trait with the given name.
     *
     * @param  string $name
     * @param null $func
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildTrait($name, $func = null)
    {
        $stub = $this->files->get($this->getStub());

        $stub = $this->replaceFunction($stub, $func);

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }


    public function replaceFunction($stub, $func)
    {
        $functionNames = explode(',', $func);

        $functionList = "";
        foreach ($functionNames as $functionName) {
            $functionList .= str_replace('{DummyFunction}', $functionName, $this->functionStub);
        }

        $stub = str_replace('{DummyFunctions}', rtrim($functionList, "\n"), $stub);

        return $stub;
    }


}
