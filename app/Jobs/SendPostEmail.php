<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\Models\Website;
use App\Models\User;
use App\Models\Subscribe;
use App\Models\Post;
use App\Models\UserPostEmail;
use App\Mail\SendEmail;

use Illuminate\Support\Facades\Mail;

class SendPostEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info("email notification start");
        $this->sendPostNotification();
        Log::info("email notification end");
    }

    public function sendPostNotification()
    {
        $subscribe_users = Subscribe::get();
        
        foreach ($subscribe_users as $subscribe_user) {
            $posts = Post::where('website_id', $subscribe_user->website_id)
                ->whereDoesntHave('userPostEmails', function ($query) use ($subscribe_user) {
                    $query->where('user_id', $subscribe_user->user_id);
                })->get();
        
            foreach ($posts as $post) {
                Mail::to($subscribe_user->user->email)->send(new SendEmail($post));
        
                UserPostEmail::firstOrCreate([
                    'user_id' => $subscribe_user->user_id,
                    'post_id' => $post->id,
                    'website_id' => $subscribe_user->website_id,
                ]);
            }
        }
    }
}
