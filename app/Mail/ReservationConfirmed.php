<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReservationConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;
    public $user;

    public function __construct($reservation, $user)
    {
        $this->reservation = $reservation;
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('emails.reservation_confirmed')
                    ->subject('Reservation Confirmation')
                    ->with([
                        'reservation' => $this->reservation,
                        'user' => $this->user,
                    ]);
    }
}
