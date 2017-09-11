<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLink;
use App\Link;
use Illuminate\Support\Facades\Redirect;

class LinkController extends Controller
{
    public function index() {
        return view('home');
    }

    public function viewLink($code) {
        $link = Link::where('code', $code);

        if ($link->exists()) {
            $link->increment('clicks');
            return Redirect::to($link->first()->url);
        }

        return route('index');
    }

    public function create(CreateLink $request) {
        $exists = Link::where('url', $request->get('url'));

        if ($exists->exists()) {
            return response(['success' => true, 'code' => url($exists->first()->code)], 200);
        }

        $created = Link::create([
            'url' => $request->get('url'),
            'code' => $this->generateUniqueCode(),
        ]);

        return response(['success' => true, 'code' => url($created->code)], 200);
    }

    function generateUniqueCode() {
        $code = str_random(6);
        $searcher = Link::where('code', $code);

        if ($searcher->exists()) {
            return $this->generateUniqueCode();
        }

        return $code;
    }
}
