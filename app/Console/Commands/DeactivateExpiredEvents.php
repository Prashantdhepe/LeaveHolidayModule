<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use Carbon\Carbon;

class DeactivateExpiredEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'events:deactivate-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate events whose event_date is in the past';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = Event::where('event_date', '<', Carbon::today())
            ->where('is_active', true)
            ->update(['is_active' => false]);

        $this->info("Deactivated {$count} expired event(s).");
    }
}

