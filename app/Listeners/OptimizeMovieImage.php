<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Events\MovieSaved;

class OptimizeMovieImage
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
     * @param  \App\Events\MovieSaved  $event
     * @return void
     */
    public function handle(MovieSaved $event)
    {
        $image = Image::make(Storage::get($event->movie->img));
        $image->widen(400)->limitColors(255)->encode();
        Storage::put($event->movie->img, (string) $image);
    }
}
