<?php

namespace App\Console\Commands;

use App\Models\Tests\PastesFactory;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create generated paste every $sleepTime seconds';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sleepTime = 60;

        while (true) {
            $this->comment('Создание новой пасты');
            PastesFactory::new()->createOne();
            $this->info('Паста создана');
            sleep($sleepTime);
        }
    }
}
