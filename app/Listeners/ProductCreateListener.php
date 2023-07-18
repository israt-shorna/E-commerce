<?php

namespace App\Listeners;

use App\Events\CreateProduct;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class ProductCreateListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
       
    }

    /**
     * Handle the event.
     */
    public function handle(CreateProduct $event): void
    {
       
        if(Cache::has('users'))
        {
            Cache::forget('users');
        }
    }
}
