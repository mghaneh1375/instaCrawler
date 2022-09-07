<?php

namespace App\Http\Controllers;

use App\Instagram;
use Instagram\Api;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class HomeController extends Controller
{
    public static function test() {
        $cachePool = new FilesystemAdapter('Instagram', 0, __DIR__ . '/../cache');

        $api = new Api($cachePool);
        $api->login('09214915905', '810193467');
        $profile = $api->getProfile('hivadcenter');
        $profile = $api->getMoreMedias($profile);
        foreach($profile->getMedias() as $itr) {
            Instagram::create([
                "date" => $itr->getDate(),
                "thumb" => $itr->getThumbnailSrc(),
                "link" => $itr->getLink(),
                "caption" => $itr->getCaption(),
                "image" => $itr->getDisplaySrc(),
                "video" => ($itr->getVideoUrl() != null) ? $itr->getVideoUrl() : null
            ]);
        }
    }

}
?>