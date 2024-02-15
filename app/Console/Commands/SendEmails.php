<?php

namespace App\Console\Commands;

use App\Mail\SlipEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending slip email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();

        foreach($users as $user) {
            Mail::to($user->email)->send(new SlipEmail());
        }
        $this->info('Email sent succesfully!');
    }
}
