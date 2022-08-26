<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AmenityScheduled extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     * https://github.com/kirschbaum-development/nova-mail
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('kortby@gmail.com')
            ->to('renter@gmail.com')
            ->subject('Amenity Scheduled')
            ->markdown('emails.amenity_scheduled');
    }
}
