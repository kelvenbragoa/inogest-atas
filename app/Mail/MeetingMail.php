<?php

namespace App\Mail;

use App\Models\MeetingParticipant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MeetingMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(MeetingParticipant $user, $msg, $pdf)
    {
        //
        $this->user = $user;
        $this->msg = $msg;
        $this->pdf = $pdf;
    }

    public function build()
    {
        $this->subject('Nova notificação de Acta da Reunião');
        $this->to($this->user->email,$this->user->name);

        return $this->markdown('mail.meeting',[
            'user'=>$this->user,
            'msg'=>$this->msg,

        ])->attachData($this->pdf->output(), 'acta_reuniao.pdf');;

        // ->attach(public_path('meeting/sample.pdf'), [
        //     'as' => 'acta-da-reuniao.pdf',
        //     'mime' => 'application/pdf',
        // ])
    }

    // /**
    //  * Get the message envelope.
    //  *
    //  * @return \Illuminate\Mail\Mailables\Envelope
    //  */
    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Meeting Mail',
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  *
    //  * @return \Illuminate\Mail\Mailables\Content
    //  */
    // public function content()
    // {
    //     return new Content(
    //         view: 'manager.meeting.meeting',
            
    //     );
    // }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array
    //  */
    // public function attachments()
    // {
    //     return [];
    // }
}
