<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendUsers;
use App\Events\JajalEvent;

class testCon extends Controller
{
    public function index(){

        event(new JajalEvent ('jungken'));
        // $job = new SendUsers([], 'jangken');
        // $this->dispatch($job);
        // $jobStatusId = $job->getJobStatusId();

        // dd($jobStatusId);
        // SendUsers::dispatch('jaja');
        return view('welcome');
    }
}
