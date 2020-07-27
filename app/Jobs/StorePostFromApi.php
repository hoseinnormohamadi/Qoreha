<?php

namespace App\Jobs;

use App\UncheckedLottery;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StorePostFromApi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $Data ;

    public function __construct($Image,$Content)
    {
        $this->Data['Image'] = $Image;
        $this->Data['Content'] = $Content;
    }

    public function handle()
    {
        UncheckedLottery::create([
            'LotteryContent' => $this->Data['Content'],
            'LotteryImage' => $this->Data['Image'],
            'Worker' => 2
        ]);
    }
}
