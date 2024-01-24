<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class PurgePublicImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:purge';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Purge public images directory';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $publicImagePath = public_path('images');
        if (File::exists($publicImagePath)) {
            File::cleanDirectory($publicImagePath);
            $this->info('Public images purged successfully.');
        } else {
            $this->info('Public images directory does not exist.');
        }
    }
}
