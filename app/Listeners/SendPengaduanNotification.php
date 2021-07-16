<?php

namespace App\Listeners;

use App\Events\PengaduanWasCreated;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPengaduanNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle(PengaduanWasCreated $event)
    {
        $admin = User::where('id', 2)->get();

        Notifications::send($admin, new PengaduanNotification($event->pengaduan->user_id));
    }
}
