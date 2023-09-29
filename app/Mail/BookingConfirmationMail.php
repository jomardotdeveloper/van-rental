<?php

namespace App\Mail;

use App\Models\Van;
use App\Models\Booked;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user_name;
    public $booking_id;
    public $vehicle_name;
    public $driver_name;
    public $pickup;
    public $dropoff;
    public $booking_date;
    public $total_amount;
    public $status;

    /**
     * Create a new message instance.
     */
    public function __construct($user_name, $booking_id,$pickup,$dropoff, $booking_date)
    {
        $this->user_name = $user_name;
        $this->booking_id = $booking_id;
        // $this->vehicle_name = $vehicle_name;
        $this->pickup = $pickup;
        $this->dropoff = $dropoff;
        $this->booking_date = $booking_date;

        // $id = substr($booking_id, 4);
        // dd($id);
        $van = Van::where('user_id', Auth::user()->id)->first();
        if($van){
            $this->vehicle_name = $van->model;
            $this->driver_name = $van->fullname;
            $this->total_amount = '₱1000';
            $this->status = 'Secured your slot proceed to payments';

            $booked = Booked::where('user_id',Auth::user()->id)->first();
            if($booked){
                $booked->status = 'payment';
                $booked->save();
            }

        }
        // dd($van);
        

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking Confirmation Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'booking.verify-booked',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
