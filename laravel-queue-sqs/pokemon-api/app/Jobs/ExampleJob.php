<?php

namespace App\Jobs;

class ExampleJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo "Running an example job ...\n";
        echo "Queue Broker: AWS SQS\n";
    }
}
