<?php

namespace App\Console\Commands;

use App\Actions\HideExpiredPastesAction;
use Illuminate\Console\Command;

class HideExpiredPastes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:hide-expired-pastes {--time-sleep=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected const DEFAULT_TIME_SLEEP = 60;

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(HideExpiredPastesAction $action): void
    {
        $timeSleep = $this->argument('time-sleep') ?? self::DEFAULT_TIME_SLEEP;

        while (true) {
            $this->comment("Проверка срока жизни паст");
            $action->execute();
            $this->info("Истекшие пасты cкрыты");
            sleep($timeSleep);
        }
    }

}
