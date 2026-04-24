<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $code;

    public function __construct($name, $code)
    {
        $this->name = $name;
        $this->code = $code;
    }

    public function envelope(): Envelope // Добавь для Laravel 9+
    {
        return new Envelope(
            subject: 'Online-School',
        );
    }

    public function content(): Content // Добавь
    {
        return new Content(
            view: 'mail.welcom', // Исправил: welcome (с 'e')
            with: [
                'name' => $this->name,
                'code' => $this->code,
            ],
        );
    }

    // Если Laravel <9, оставь build() как есть, но с welcome
    public function build()
    {
        return $this->subject('Online-School')
                    ->view('mail.welcom') // Исправил имя
                    ->with([
                        'name' => $this->name,
                        'code' => $this->code,
                    ]);
    }
}