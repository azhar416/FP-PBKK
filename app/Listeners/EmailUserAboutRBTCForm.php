<?php

namespace App\Listeners;
use Illuminate\Support\Facades\Mail;
use App\Events\RBTCFormSubmitted;
use App\Mail\UserSubmitFormMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailUserAboutRBTCForm
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
     * @param  object  $event
     * @return void
     */
    public function handle(RBTCFormSubmitted $event)
    {
        Mail::to($event->email)->send(new UserSubmitFormMessage());
    }
}
