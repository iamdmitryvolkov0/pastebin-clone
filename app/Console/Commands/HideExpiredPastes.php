<?php

namespace App\Console\Commands;


use App\Domain\Paste\Actions\HideExpiredPastesAction;
use Carbon\Carbon;
use Illuminate\Console\Command;

class HideExpiredPastes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:hideExpiredPastes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hide expired pastes';


    /**
     * Execute the console command.
     *
     * @param HideExpiredPastesAction $action
     * @return void
     */
    public function handle(HideExpiredPastesAction $action): void
    {
        $timeSleep = 60;

        $this->comment(Carbon::now()->format('j.m.o  H:i:s') . " | " . "Проверка срока жизни паст");
        $action->execute();
        $this->info("Истекшие пасты cкрыты");
        sleep($timeSleep);

    }
}
