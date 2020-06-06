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

    public function __construct($Image,$ImageLink,$Content)
    {
        $this->Data['Image'] = $Image;
        $this->Data['ImageLink'] = $ImageLink;
        $this->Data['Content'] = $Content;
    }

    public function handle()
    {
        UncheckedLottery::create([
            'LotteryContent' => $this->Data['Content'],
            'LotteryImage' => $this->Data['Image'],
            'LotteryImageLink' => $this->Data['ImageLink'],
            'Worker' => \Auth::user()->id
        ]);
    }
}
