<?php

namespace App\Console\Commands;

use App\Models\Freeze;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateFreezeExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'freeze-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set expired freeze status to expired and make registration active';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $batchSize = 100;

        do {

            $freezes = Freeze::where('status', 'active')
                ->where('freeze_end_date', '<', Carbon::today())
                ->limit($batchSize)
                ->get();

            foreach ($freezes as $freeze) {

                $registration = Registration::find($freeze->registration_id);

                if ($registration) {

                    $newEndDate = Carbon::parse($registration->end_date)->addDays($freeze->end_date_remening_days);

                    $registration->update([
                        'end_date' => $newEndDate,
                        'status' => 'active',
                    ]);
                }

                $freeze->update([
                    'status' => 'expired'
                ]);
            }

            $affectedRows = $freezes->count();
        } while ($affectedRows > 0);

        $this->info("Expired freezes processed: {$affectedRows}");
    }
}
