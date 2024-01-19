<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use App\Models\MstPrefecture;
use App\Models\Cities;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Client $client)
    {
        // 都道府県取得
        $prefectures = MstPrefecture::all();

        foreach ($prefectures as $prefecture) {
            // 外部API全国地方公共団体コード
            $api = 'https://www.land.mlit.go.jp/webland/api/CitySearch?area=' .str_pad($prefecture->id, 2, 0, STR_PAD_LEFT);
            $response = $client->request('GET', $api, [
                'timeout' => 10, // タイムアウトを10秒に設定（必要に応じて変更）
            ]);
            $response = $client->request('GET', $api);
            $responseData = json_decode($response->getBody()->getContents(), true);

            // APIのステータスがOKなら実行
            if ($responseData['status'] === 'OK') {
                foreach ($responseData['data'] as $responseBody) {
                    // 都道府県の外部キーを指定して市区町村を登録
                    Cities::create([
                        'prefecture_id' => $prefecture->id,
                        'city_code'     => $responseBody['id'],
                        'name'          => $responseBody['name']
                    ]);
                }
            }
        }
    }
}
