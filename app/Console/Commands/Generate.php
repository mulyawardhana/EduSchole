<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use TaliumAbstract\Commads\RepositoryFileGenerator;

class Generate extends Command
{
    use RepositoryFileGenerator;

    protected $signature = 'make:gen {modelName}';

    protected $description = 'Generate model and other files';

    public function __construct()
    {
        parent::__construct();
    }
}
