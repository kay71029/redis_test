<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class RedisConnect extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:ping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'redis ping ';

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
        try {

            for ($i = 0; $i < 100000; $i++) {
                Redis::set($i, $i);
                echo "$i\n";
                sleep(1);
            }

        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(),'<br>';
        }
    }
        
}
