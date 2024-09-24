<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GifController extends Controller
{
    private $api_key = 'UDwIvI7Lu7kvQ4gef8EUCy3HoXxDAZmK';

    public function search(Request $request)
    {
        $query = $request->input('query');
        $response = Http::get("https://api.giphy.com/v1/gifs/search", [
            'api_key' => $this->api_key,
            'q' => $query,
            'limit' => $request->input('limit') || 10,
            'offset' => $request->input('offset') || 0,
        ]);

        return response()->json($response->json());
    }

    public function show($id)
    {
        $response = Http::get("https://api.giphy.com/v1/gifs/{$id}", [
            'api_key' => $this->api_key,
        ]);

        return response()->json($response->json());
    }

    public function favorite(Request $request)
    {
        $request->validate([
            'gif_id' => 'required|string',
        ]);

        $user = auth()->user();
        $user->favorites()->attach($request->gif_id);

        return response()->json(['message' => 'Gif added to favorites'], 201);
    }
}
