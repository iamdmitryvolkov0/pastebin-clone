<?php

namespace App\Console\Commands;

use App\Models\Tests\PastesFactory;
use App\Models\Paste;
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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        while (true) {
            $this->comment("Создание новой пасты");
            PastesFactory::new()->createOne();
            $this->info("Паста создана");
            sleep(5);
        }
    }

}
