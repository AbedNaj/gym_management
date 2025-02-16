<?php

namespace App\Console\Commands;

use App\Models\registration;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateExpiredRegistrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registrations:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Expired Registrations Each Day';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $batchSize = 100;

        do {

            $affectedRows = registration::where('status', 'active')
                ->limit($batchSize)
                ->where('end_date', '<', Carbon::today())
                ->update(['status' => 'expired']);
        } while ($affectedRows > 0);


        $this->info("expired registrations updated { $affectedRows}");
    }
}
