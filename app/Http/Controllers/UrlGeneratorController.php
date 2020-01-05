<?php

namespace App\Http\Controllers;

use App\Models\ShortenUrlResponse;
use App\ShortUrlGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class UrlGeneratorController extends Controller
{
    public function create(Request $request)
    {
        $response = new ShortenUrlResponse();
        try {
            $validator = \Validator::make($request->all(), [
                "url" => "required|url",
            ], [
                "url.required" => "A url is required.",
                "url.url" => "A valid url is required.",
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                foreach ($errors->all() as $error) {
                    $response->errors[] = $error;
                }
                $response->message = "The given data was invalid.";
                return response()->json($response, 400);
            }
            $url = $request->get('url');
            $response->url = $url;
            $response->short_url = ShortUrlGenerator::Generate($url);
            $response->success = true;
            return response()->json($response);
        } catch (\Exception $ex) {
            Log::error("{$ex->getMessage()} in file: {$ex->getFile()} on line {$ex->getLine()}");
            $response->errors[] = $ex->getMessage();
            $response->success = false;
            $response->message = "Server error";
            return response()->json($response, 500);
        }
    }

    public function show($short_url)
    {
        $url = ShortUrlGenerator::Get($short_url);
        if (is_null($url)) {
            abort(404);
        }
        return Redirect::to($url, 301);
    }
}
