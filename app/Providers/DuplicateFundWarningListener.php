<?php

namespace App\Providers;

use App\Providers\DuplicateFundWarningEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Duplicate;

class DuplicateFundWarningListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\DuplicateFundWarningEvent  $event
     * @return void
     */
    public function handle(DuplicateFundWarningEvent $event)
    {
        Duplicate::create ([
            'fund_id' => $event->fund->id,
            'funds_manager_id' => $event->fund->funds_manager_id,
            'fund_name' => $event->fund->name,
            'raw_fund_insertion' => json_encode($event->fund)

        ]);
    }
}
