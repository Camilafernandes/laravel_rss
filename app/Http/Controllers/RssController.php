<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Feeds;
class RssController extends Controller
{
    private $url_rss = 'https://g1.globo.com/rss/g1/economia/';

    public function index() {
        try {
            $feed = Feeds::make($this->url_rss);
            $items = $feed->get_items();
        
            if (!$items) {
                return response()->json(
                    'Não foi possivel ler RSS', 
                    400
                );
            }

            foreach ($items as $key => $item) {
                $news[] = array(
                    'title' => $item->get_title(),
                    'link'  => $item->get_link(),
                    'data'  => $item->get_date()
                );             
            }

            uasort($news, function($date1, $date2){
                $try1 = strtotime($date1['data']);
                $try2 = strtotime($date2['data']);
                if ($try1 === $try2) return 0;
                return ($try1 > $try2) ? -1 : 1;
            });

            return response()->json(
                $news, 
                200
            );
        } catch (\Exception $e) {
            return response()->json(
                $e->getMessage(), 
                500
            );
        }
        
    }
}
