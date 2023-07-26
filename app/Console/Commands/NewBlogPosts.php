<?php

namespace App\Console\Commands;

use App\Mail\NewBlogPosts as EmailBlogPosts;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NewBlogPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'new-blog-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //change email or add to config
        Mail::to('d.oliver@gmail.com')
            ->send(new EmailBlogPosts());
        echo("Email sent");
    }
}
