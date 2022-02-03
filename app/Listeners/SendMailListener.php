<?php

namespace App\Listeners;

use App\Mail\ContactUs;
use App\Events\MailEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailListener
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
     * @param  \App\Events\MailEvent  $event
     * @return void
     */
    public function handle(MailEvent $event)
    {
        
        Mail::to("info@admin.com")->send(new ContactUs($event->data));
    }
}
