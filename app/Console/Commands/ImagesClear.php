<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CameraImage;

class ImagesClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove all existing images in the database';

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
     * @return int
     */
    public function handle()
    {
        if (config('app.env') === 'production') {

            $confirm = '';
            while (!$this->validConfirmResult($confirm)) {
                $this->error('This app is set to production mode, this will destroy data');
                $confirm = $this->ask('Are you sure you want to continue? Y/N');
            }

            if (in_array(strtoupper($confirm), ['N', 'NO'])) {
                $this->info('Image deletion has been aborted, no data has been changed.');
                return;
            }
        }

        foreach (CameraImage::lazyById() as $image) {
            $image->delete();
        }

        $this->info('All images have been deleted.');
    }

    public function validConfirmResult($confirm) {
        $valid = ['Y', 'N', 'YES', 'NO'];
        return in_array(strtoupper($confirm), $valid);
    }
}
