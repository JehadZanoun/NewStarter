<?php

namespace App\Listeners;

use App\Events\VideoViwer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncraesCounter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(VideoViwer $event)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }
}
