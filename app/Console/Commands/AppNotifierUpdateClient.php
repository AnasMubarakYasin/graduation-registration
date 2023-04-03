<?php

namespace App\Console\Commands;

use App\Mail\AppNotifierUpdateClient as MailAppNotifierUpdateClient;
use App\Models\AcademicActivity;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AppNotifierUpdateClient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notify-update-client {email? : The email client want to notify}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Application Updates to Client';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');
        if (!$email) {
            $email = env('MAIL_CLIENT');
        }
        if (!$email) {
            $this->error("Mail Client Empty");
            return Command::INVALID;
        }
        $this->line("Notify Update to Client: $email");

        try {
            Mail::to($email)->send(new MailAppNotifierUpdateClient());
        } catch (\Throwable $th) {
            $this->error($th->getMessage());
            return Command::FAILURE;
        }
        $this->info("Notify Update to Client success");

        return Command::SUCCESS;
    }
}
