<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use GuzzleHttp\Client;

class InstagramController extends Controller
{
    protected $limit = 8;

    public function index($page = null) {
        $data = $this->getData();
        $page = $page ?: 1;
        $total = count( $data );
        $totalPages = ceil( $total/ $this->limit );
        $collection = collect($data);
        $items = $collection->forPage($page, $this->limit);
        return [
            'current_page' => $page,
            'next_page_url' => $page < $totalPages ? sprintf('/api/instagram/%d', $page + 1) : null,
            'last_page' => $totalPages,
            'prev_page_url' => $page > 1 ? sprintf('/api/instagram/%d', $page - 1) : null,
            'items' => $items->toArray()
        ];
    }

    private function getData() {
        $data = [];
        if (Cache::has('instagram')) {
            $data = Cache::get('instagram');
        }
        else {
            $guzzle = new Client();
            $res = $guzzle->get('https://www.instagram.com/asmakalbasha/media');
            $data = json_decode((string) $res->getBody(), true)['items'];
            $minutes = Carbon::now()->addDay();
            Cache::put('instagram', $data, $minutes);
        }

        return $data;
    }
}