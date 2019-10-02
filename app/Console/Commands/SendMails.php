<?php

namespace App\Console\Commands;

use App\Article;
use App\Mail\ArticleInformation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {article : The ID of the article}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Article Information Mail with all active Articles';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $article = Article::find($this->argument('article'))->with('categorie', 'manufacturer')->active()->first();

        Mail::to('activeArticle@test.com')->send(new ArticleInformation($article));

        $this->info('Send Mail to activeArticle@test.com');
    }
}
