<?php

use App\Console\Commands\UpdateExpiredRegistrations;
use App\Console\Commands\UpdateFreezeExpired;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command(UpdateExpiredRegistrations::class)->daily();
Schedule::command('auth:clear-resets')->everyFifteenMinutes();
Schedule::command(UpdateFreezeExpired::class)->daily();
