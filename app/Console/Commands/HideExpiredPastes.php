<?php

namespace App\Console\Commands;

use App\Enums\PasteStatusEnum;
use App\Models\Tests\PastesFactory;
use App\Models\Paste;
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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $pastes = Paste::query()->whereNot('status', PasteStatusEnum::STATUS_HIDDEN)->whereNotNull('hide_in')->get();

        while (true) {
            $this->comment("Проверка срока жизни паст");
            foreach ($pastes as $paste) {
                if ($paste->hide_in < Carbon::now()) {
                    $paste->status = PasteStatusEnum::STATUS_HIDDEN;
                    $paste->save();
                }
            }
            $this->info("Истекшие пасты cкрыты");
            sleep('60');
        }


    }

}
