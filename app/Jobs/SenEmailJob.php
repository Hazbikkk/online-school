<?php

    namespace App\Jobs;




    use Illuminate\Bus\Queueable;

    use Illuminate\Contracts\Queue\ShouldQueue;

    use Illuminate\Foundation\Bus\Dispatchable;

    use Illuminate\Queue\InteractsWithQueue;

    use Illuminate\Queue\SerializesModels;

    use App\Mail\UserMail;

    use Illuminate\Support\Facades\Mail;

    use Illuminate\Support\Facades\Log; // Добавь для логов




    class SenEmailJob implements ShouldQueue

    {

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;




    protected $code;

    protected $name;

    protected $email;




    public function __construct($code, $name, $email)

        {

    $this->code = $code;

    $this->name = $name;

    $this->email = $email;

        }




    public function handle()

        {

    try {

    Mail::to($this->email)->send(new UserMail($this->name, $this->code));

    Log::info('Email sent to: ' . $this->email); // Для дебага

            } catch (\Exception $e) {

    Log::error('Email job failed: ' . $e->getMessage()); // Логируем ошибку

    throw $e; // Перебрасываем, чтобы job failed

            }

        }




    // Добавь: что делать при фейле

    public function failed(\Throwable $exception)

        {

    Log::error('SenEmailJob failed: ' . $exception->getMessage());

        }

    }