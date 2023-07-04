<?php

namespace App\Console\Commands;


use App\Repositories\Contracts\PasteRepositoryContract;
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
     * Hide expired Pastes after lifetime check
     * @param PasteRepositoryContract $pasteRepository
     * @return void
     */
    public function handle(PasteRepositoryContract $pasteRepository): void
    {
        $timeSleep = 60;

        $this->comment(Carbon::now()->format('j.m.o  H:i:s') . " | " . "Проверка срока жизни паст");
        $pasteRepository->hideExpired();
        $this->info("Истекшие пасты cкрыты");
        sleep($timeSleep);

    }
}
