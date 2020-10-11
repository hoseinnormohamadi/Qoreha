<?php

namespace App\Jobs;

use App\UncheckedLottery;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use InstagramScraper\Instagram;
use Phpfastcache\CacheManager;
use Phpfastcache\Helper\Psr16Adapter;

class DadeKavy implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $Text;
    protected $Tedad;
    public function __construct($Text,$Tedad)
    {
        $this->Text = $Text;
        $this->Tedad = $Tedad;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $instagram = Instagram::withCredentials(env('INSTAGRAMUSERNAME'), env('INSTAGRAMPASSWORD'),new Psr16Adapter('Files'));
        $instagram->login();
        $instagram->saveSession();
        $new_count=(int)$this->Tedad;
        try {
            $medias = $instagram->getMediasByTag($this->Text, $new_count);
        } catch (\InstagramScraper\Exception\InstagramException $e) {

        } catch (\InstagramScraper\Exception\InstagramNotFoundException $e) {
            return 0;
        }
        foreach ($medias as $media) {
            $Link = $media->getImageHighResolutionUrl();
            $ImageId = $media->getId();
            $Text = $media->getCaption();

                $Post = UncheckedLottery::where('LotteryImage', $ImageId.'jpg')->first();
                if ($Post != null && !empty($Post) && $Post->Count > 0) {
                    die();
                }
                $Image = $this->GetImage($Link, $ImageId.'.jpg', 'public/Downloads/');
                if ($Image === null) {
                    die();
                }
                StorePostFromApi::dispatch($Image, $Text);
        }
    }















    private function GetImage($Link, $Name, $Folder)
    {

        $client = new \GuzzleHttp\Client();
            $myFile = fopen($Folder . $Name, 'w');
            $client->request('GET', $Link, ['save_to' => $myFile]);
            if (is_file($Folder . $Name)) {
                return $Folder . $Name;
            }
        return null;
    }


}
