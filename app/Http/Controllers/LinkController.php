<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLink;
use App\Link;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index(Request $request) {
        $darkTheme = $request->cookie('dark-theme', "true") == "true";
        return view('home', compact('darkTheme'));
    }

    public function viewLink($code) {
        $link = Link::where('code', $code);

        if ($link->exists()) {
            $link->increment('clicks');
            return Redirect::to($link->first()->destination);
        }

        return redirect(route('index'));
    }

    public function statistic($code) {
        $link = Link::where('code', $code);

        if (!$link->exists()) {
            return response(['success' => false, 'errors' => ['Link not found']], 404);
        }

        $link = $link->first();

        return response([
            'success' => true,
            'code' => $link->code,
            'link' => url($link->code),
            'destination' => $link->destination,
            'clicks' => $link->clicks,
                            ], 200);
    }

    public function create(CreateLink $request) {
        $exists = Link::where('destination', $request->get('destination'));

        if ($exists->exists()) {
            return response(['success' => true, 'code' => url($exists->first()->code)], 200);
        }

        $created = Link::create([
            'destination' => $request->get('destination'),
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
