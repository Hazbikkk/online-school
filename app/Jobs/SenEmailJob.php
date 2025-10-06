<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable; // Исправленный импорт
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\UserMail;
use Illuminate\Support\Facades\Mail;
use App\Models\AuthUsers;

class SenEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $name;
    protected $code;
    public $tries = 3; // Ограничение попыток

    public function __construct($email, $name, $code)
    {
        $this->email = $email;
        $this->name = $name;
        $this->code = $code;
    }

    public function handle()
    {
        try {
            Mail::to($this->email)->send(new UserMail($this->name, $this->code));
        } catch (\Exception $e) {
            \Log::error('Ошибка отправки письма: ' . $e->getMessage());
            $this->fail();
        }
    }
}
