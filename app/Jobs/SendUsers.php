<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Imtigger\LaravelJobStatus\Trackable;
use App\User;
use Carbon\Carbon;

class SendUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Trackable;

    public $jaja;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $params, $jaja)
    {
        $this->prepareStatus();
        $this->params = $params; // Optional
        $this->setInput($this->params); // Optional
        $this->jaja = $jaja;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $max = mt_rand(5, 30);
        $this->setProgressMax($max);

        for ($i = 0; $i <= $max; $i += 1) {
            sleep(1); // Some Long Operations
            $this->setProgressNow($i);
        }

        $this->setOutput(['total' => $max, 'other' => 'parameter']);


        for ($i=0; $i <1 ; $i++) {
        $flight = new User;
        $flight->name = $this->jaja.Carbon::now().$i;
        $flight->email = "lala".Carbon::now().$i;
        $flight->password = "lala";
        $flight->save();
        }

    }
}
