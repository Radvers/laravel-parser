<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckNewArrivals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:checkNewArrivals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check new arrivals on sites which pointed at db';

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
        $this->info('Arrivals checked');
    }
}
