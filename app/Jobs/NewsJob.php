<?php

namespace App\Jobs;

use App\Contracts\Parser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $categoryId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Parser $parser)
    {
        $parser->storeParsedNews($this->categoryId);
    }
}
