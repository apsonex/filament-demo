<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class SeedData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dbPath = base_path('database/database.sqlite');

        if (!File::exists($dbPath)) {
            File::put(base_path('database/database.sqlite'), '');
        }

        Artisan::call("migrate:fresh --seed");
    }
}
