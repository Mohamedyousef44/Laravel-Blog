<?php

namespace App\Jobs;

use App\Models\Post;
use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PruneOldPostsJob implements ShouldQueue
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

        $time = new DateTime('now');
        $newtime = $time->modify('-2 years');
        $posts = Post::where('created_at' ,"<", $newtime )->get();
        
        if(count($posts) > 0){

            foreach($posts as $post){

                $post->delete();
            }
        }
    }
}
