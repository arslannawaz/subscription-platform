<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SendPostEmail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email of new posts to subscribed users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //dispatch job to send post email
        SendPostEmail::dispatch();
    }
}
