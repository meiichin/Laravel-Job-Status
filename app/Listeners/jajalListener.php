<?php

namespace App\Listeners;

use App\Events\JajalEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Controllers\Controller;
use App\Jobs\SendUsers;

class jajalListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  JajalEvent  $event
     * @return void
     */
    public function handle(JajalEvent $event)
    {
        // $job = new SendUsers([], 'jangken');
        // $this->dispatch($job);
        // dd($event->action);
        dispatch(new SendUsers([], $event->action));
        // $jobStatusId = $job->getJobStatusId();
    }

}
