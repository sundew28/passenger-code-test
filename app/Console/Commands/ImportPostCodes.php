<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use JustSteveKing\LaravelPostcodes\Service\PostcodeService;
use App\Models\PostCodes;

class ImportPostCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-post-codes';

    /**
     * The variable to assign.
     *
     * @var string
     */
    protected $postcodes;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to import UK post code';


    /**
     * Constructor.
     *
     * @var string
     */
    public function __construct(PostcodeService $service)
    {
        parent::__construct();
        $this->postcodes = $service;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $postcode = $this->ask('What is the postcode details you want to import?');

        if(!empty($postcode)){

            $location = $this->postcodes->getPostcode($postcode);

            $bar = $this->output->createProgressBar(1);
     
            $bar->start();

            $insertPostCode = PostCodes::create([
                    'postcode' => $location->postcode,
                    'latitude' => $location->latitude,
                    'longitude' => $location->longitude,
                    'region' => $location->region,
                    'pfa' => $location->pfa,
                    'country' => $location->country,
            ]);

            $bar->finish();
            
            $this->info(" Postcode details of ".$postcode." downloaded and stored to database". PHP_EOL);

        } else {
            $this->error('No input received. Need to enter a postcode.');
        }
    }
}
