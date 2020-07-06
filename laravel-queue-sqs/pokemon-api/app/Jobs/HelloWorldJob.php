<?php

namespace App\Jobs;

class HelloWorldJob extends Job
{
    protected $uuid;
    protected $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($uuid, $message)
    {
        $this->uuid = $uuid;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo "Running an hello world job ...\n";
        echo "Queue Broker: AWS SQS\n";
        echo "Processing message: ";
        echo $this->uuid->toString()."\n";
        echo $this->message."\n";
        echo "Finished at: ".date("Y-m-d H:i:s")."\n";
    }
}
