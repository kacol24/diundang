<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeployCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deploy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'cache:clear, config:cache, lightouse:cache, route:cache, view:cache, optimize, opcache:compile';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('cache:clear');
        $this->call('config:cache');
        $this->call('lighthouse:cache');
        $this->call('route:cache');
        //$this->call('view:cache');
        $this->call('optimize');
        $this->call('opcache:compile', ['--force']);
    }
}
