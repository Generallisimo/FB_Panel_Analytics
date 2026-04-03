<?php

namespace App\Http\Controllers\Meta;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class FanPageController extends Controller
{
    public function getFanPages()
    {
        $proxy = 'http://FodaqwertymN6:3e86ffcH7@74.201.73.4:10387';
        $token = 'EAABsbCS1iHgBRNrVuZCdUjI1LTTN798zAkGkcvXyJ855DxFE95Do4ZB1xcO0H0EtihUg4Lsa4eVgevHJxueZCk1uau6tJ9Atlx8Vc7x6lZALV7a2QVQNZCPmOAa3jvjwopmT6lhRvkb7MojFJdJNsKQ8vfZAEc0qRwuh3QM7fcmgcd7y8wa0gcg0y5YzcHqQZDZD';

        $cookiesArray = [
            ["name" => "dbln","value"=> "%7B%22100065362282415%22%3A%22vqHJpSsg%22%7D","domain"=>".facebook.com","path"=>"/login/device-based/","httpOnly"=>true,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "datr","value"=> "6m4LabwM3MWgXEa-XUYypzNW","domain"=>".facebook.com","path"=>"/","httpOnly"=>true,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "sb","value"=> "6m4LacDNnr-cVjym4LEGlSER","domain"=>".facebook.com","path"=>"/","httpOnly"=>true,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "ps_l","value"=> "1","domain"=>".facebook.com","path"=>"/","httpOnly"=>true,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"lax"],
            ["name" => "ps_n","value"=> "1","domain"=>".facebook.com","path"=>"/","httpOnly"=>true,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "locale","value"=> "en_US","domain"=>".facebook.com","path"=>"/","httpOnly"=>false,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "dpr","value"=> "1.25","domain"=>".facebook.com","path"=>"/","httpOnly"=>false,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "wd","value"=> "1520x687","domain"=>".facebook.com","path"=>"/","httpOnly"=>false,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"lax"],
            ["name" => "c_user","value"=> "100065362282415","domain"=>".facebook.com","path"=>"/","httpOnly"=>false,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "xs","value"=> "27%3A4RdEwCjJ7o12IQ%3A2%3A1775050010%3A-1%3A-1%3A%3AAcz-kl_I8bgAU2ExwEnMmqSunTBBawhpwiYZMSXa6g","domain"=>".facebook.com","path"=>"/","httpOnly"=>true,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "fr","value"=> "1C9xETy2UEJphnjYy.AWeUBiIhqV8ai9Um5FYQIyPSnyWcwtWLo2lgJput58ASu1PCerU.BpzR11..AAA.0.0.BpzR11.AWesuPeWg-479-KVFc5pQcPgYIU","domain"=>".facebook.com","path"=>"/","httpOnly"=>true,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "GCL_AW_P","value"=> "GCL.1775050101.EAIaIQobChMIwMq88eDMkwMVa3J_AB36BwLTEAAYASAAEgIoc_D_BwE","domain"=>".googleadservices.com","path"=>"/","httpOnly"=>true,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction","CookiePartitionKey"=>"https://facebook.com"],
            ["name" => "ar_debug","value"=> "1","domain"=>".facebook.com","path"=>"/","httpOnly"=>true,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "presence","value"=> "C%7B%22t3%22%3A%5B%5D%2C%22utc3%22%3A1775050170363%2C%22v%22%3A1%7D","domain"=>".facebook.com","path"=>"/","httpOnly"=>false,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"unspecified"]
        ];

        $cookies = implode('; ', array_map(function ($c) {
            return "{$c['name']}={$c['value']}";
        }, $cookiesArray));
        
        $baseUrl = 'https://graph.facebook.com/v25.0';

        $response = Http::withOptions([
                            'proxy'=> $proxy
                        ])
                        ->withHeaders([
                            'User-Agent' => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.7390.55 Safari/537.36",
                            'Cookie' => $cookies
                        ])
                        ->timeout(20)
                        ->get("{$baseUrl}/me/accounts", [
                            // 'fields' => 'id,name',
                            'access_token' => $token
                        ]);
        
        return $response->json();
    }

    public function getFanPage()
    {
        $proxy = 'http://FodaqwertymN6:3e86ffcH7@74.201.73.4:10387';
        $token = 'EAABsbCS1iHgBRNrVuZCdUjI1LTTN798zAkGkcvXyJ855DxFE95Do4ZB1xcO0H0EtihUg4Lsa4eVgevHJxueZCk1uau6tJ9Atlx8Vc7x6lZALV7a2QVQNZCPmOAa3jvjwopmT6lhRvkb7MojFJdJNsKQ8vfZAEc0qRwuh3QM7fcmgcd7y8wa0gcg0y5YzcHqQZDZD';

        $cookiesArray = [
            ["name" => "dbln","value"=> "%7B%22100065362282415%22%3A%22vqHJpSsg%22%7D","domain"=>".facebook.com","path"=>"/login/device-based/","httpOnly"=>true,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "datr","value"=> "6m4LabwM3MWgXEa-XUYypzNW","domain"=>".facebook.com","path"=>"/","httpOnly"=>true,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "sb","value"=> "6m4LacDNnr-cVjym4LEGlSER","domain"=>".facebook.com","path"=>"/","httpOnly"=>true,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "ps_l","value"=> "1","domain"=>".facebook.com","path"=>"/","httpOnly"=>true,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"lax"],
            ["name" => "ps_n","value"=> "1","domain"=>".facebook.com","path"=>"/","httpOnly"=>true,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "locale","value"=> "en_US","domain"=>".facebook.com","path"=>"/","httpOnly"=>false,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "dpr","value"=> "1.25","domain"=>".facebook.com","path"=>"/","httpOnly"=>false,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "wd","value"=> "1520x687","domain"=>".facebook.com","path"=>"/","httpOnly"=>false,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"lax"],
            ["name" => "c_user","value"=> "100065362282415","domain"=>".facebook.com","path"=>"/","httpOnly"=>false,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "xs","value"=> "27%3A4RdEwCjJ7o12IQ%3A2%3A1775050010%3A-1%3A-1%3A%3AAcz-kl_I8bgAU2ExwEnMmqSunTBBawhpwiYZMSXa6g","domain"=>".facebook.com","path"=>"/","httpOnly"=>true,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "fr","value"=> "1C9xETy2UEJphnjYy.AWeUBiIhqV8ai9Um5FYQIyPSnyWcwtWLo2lgJput58ASu1PCerU.BpzR11..AAA.0.0.BpzR11.AWesuPeWg-479-KVFc5pQcPgYIU","domain"=>".facebook.com","path"=>"/","httpOnly"=>true,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "GCL_AW_P","value"=> "GCL.1775050101.EAIaIQobChMIwMq88eDMkwMVa3J_AB36BwLTEAAYASAAEgIoc_D_BwE","domain"=>".googleadservices.com","path"=>"/","httpOnly"=>true,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction","CookiePartitionKey"=>"https://facebook.com"],
            ["name" => "ar_debug","value"=> "1","domain"=>".facebook.com","path"=>"/","httpOnly"=>true,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"no_restriction"],
            ["name" => "presence","value"=> "C%7B%22t3%22%3A%5B%5D%2C%22utc3%22%3A1775050170363%2C%22v%22%3A1%7D","domain"=>".facebook.com","path"=>"/","httpOnly"=>false,"secure"=>true,"session"=>true,"expires"=>1806588234,"sameSite"=>"unspecified"]
        ];

        $cookies = implode('; ', array_map(function ($c) {
            return "{$c['name']}={$c['value']}";
        }, $cookiesArray));
        
        
        $pageId = '109995968784414';
        $pageToken = 'EAABsbCS1iHgBRAJIcght7iAAYjDkXbhUovVN7bmRCVc0ZCP67Uagm43fPDNdVlVAnYjN0y9scZBPiYjqkHZAdYavM3F9wR5hDGq7LMy3cRkhi8iViu1Fg0xSZAEKNAIDQx0TixgI9XZAMmT1LCg6BxAOinsuvF2udSJ4gCJ5Q4e2oqHVStKHTJ2WbuyAs3JORZCdPY';
        $baseUrl = 'https://graph.facebook.com/v25.0{$pageToken}';

        // Get Page

        $response = Http::withOptions([
                            'proxy'=> $proxy
                        ])
                        ->withHeaders([
                            'User-Agent' => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.7390.55 Safari/537.36",
                            'Cookie' => $cookies
                        ])
                        ->timeout(20)
                        ->get("https://graph.facebook.com/v25.0/{$pageId}", [
                            'fields' => 'id,name,category,fan_count,followers_count',
                            'access_token' => $pageToken
                        ]);
        
        return $response->json();

        // Get Status IS_PUBLISHED

        // $response = Http::withOptions([
        //                     'proxy'=> $proxy
        //                 ])
        //                 ->withHeaders([
        //                     'User-Agent' => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.7390.55 Safari/537.36",
        //                     'Cookie' => $cookies
        //                 ])
        //                 ->timeout(20)
        //                 ->get("https://graph.facebook.com/v25.0/{$pageId}/settings", [
        //                     'setting' => 'IS_PUBLISHED',
        //                     'access_token' => $pageToken
        //                 ]);
        
        // return $response->json();

        
        
        //Get A Picture 

        // $response = Http::withOptions([
        //             'proxy'=> $proxy
        //         ])
        //         ->withHeaders([
        //             'User-Agent' => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.7390.55 Safari/537.36",
        //             'Cookie' => $cookies
        //         ])
        //         ->timeout(20)
        //         ->get("https://graph.facebook.com/v25.0/{$pageId}/picture", [
        //             'redirect' => 'false',
        //             'type' => 'large',
        //             'access_token' => $pageToken,
        // ]);

        // $imageUrl = $response->json()['data']['url'];

        // return $imageUrl;
    }

}
