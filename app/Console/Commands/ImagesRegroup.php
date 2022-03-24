<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CameraImage;
use App\Models\CameraImageGroup;

class ImagesRegroup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:regroup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all existing image groups, and regroup existing images';

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
                $this->error('This app is set to production mode');
                $this->info('This will destroy existing groupings, but keep all existing images and regroup them.');
                $confirm = $this->ask('Are you sure you want to continue? Y/N');
            }

            if (in_array(strtoupper($confirm), ['N', 'NO'])) {
                $this->info('Image regrouping has been aborted, no data has been changed.');
                return;
            }
        }

        $this->info('Deleting existing groupings...');

        CameraImageGroup::where('id', '>', '-1')->delete();

        $this->info('done!');
        $this->newLine();
        $this->info('Re-grouping existing images...');

        CameraImage::lazyById()->each->assignGroup();

        $this->info('done!');
    }

    public function validConfirmResult($confirm) {
        $valid = ['Y', 'N', 'YES', 'NO'];
        return in_array(strtoupper($confirm), $valid);
    }
}
