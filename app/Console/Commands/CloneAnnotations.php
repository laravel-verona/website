<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CloneAnnotations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lmv:clone';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clone Annotations Repository locally';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = config('website.annotations.path');
        $repository = config('website.annotations.repository');

        if (is_dir($path)) {
            $this->info('Pulling from repository ...');
            exec("cd {$path} && git pull");
        } else{
            $this->info('Cloning repository ...');
            exec("git clone {$repository} {$path}");
        }

        $this->comment('Done.');
    }
}
