<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class HttpClient
{
    static function fetch($method, $url, $body = [], $files = [])
    {
        $headers = [];
        $domain = "http://127.0.0.1:8001/api/";
        // Jika method get, langsung return response dengan method get
        $token = session()->get("token", "");
        if ($token != "") {
            $headers['Authorization'] = "Bearer $token";
        }
        if ($method == "GET") return Http::withHeaders($headers)->get($domain . $url)->json();

        // jika terdapat file, client berupa multipart
        if (sizeof($files) > 0) {
            $client = Http::asMultipart()->withHeaders($headers);

            // attach setiap file pada client
            foreach ($files as $key => $file) {
                $path = $file->getPathname();
                $name = $file->getClientOriginalName();

                // attach file
                $client->attach($key, file_get_contents($path), $name);
            }

            // fetch api
            return $client->post($domain . $url, $body)->json();
        }

        // fetch post
        return Http::withHeaders($headers)->post($domain . $url, $body)->json();
    }
}
