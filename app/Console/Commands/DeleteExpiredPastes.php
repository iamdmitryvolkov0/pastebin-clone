<?php

namespace App\Console\Commands;

use App\Models\Tests\PastesFactory;
use App\Models\Paste;
use Egulias\EmailValidator\Result\Reason\CommaInDomain;
use Illuminate\Console\Command;

class DeleteExpiredPastes extends Command
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
            $this->comment("Проверка срока жизни паст");
            //command
            $this->info("Истекшие пасты удалены");
            sleep(60);
        }
    }

}
