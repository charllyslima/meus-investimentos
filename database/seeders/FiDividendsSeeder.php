<?php

namespace Database\Seeders;

use App\Models\FiAsset;
use App\Models\FiDividends;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FiDividendsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $funds = FiAsset::all();

        foreach ($funds as $fund) {
            $urlBase = env('URI_STS_INVEST', '');
            $apiUrl = "{$urlBase}?ticker={$fund->acronym}11&chartProventsType=2";

            // Cabeçalhos da requisição
            $headers = [
                'Accept' => 'application/json',
                'Host' => 'statusinvest.com.br',
                'User-Agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:120.0) Gecko/20100101 Firefox/120.0',
                'Accept-Language' => 'pt-BR,pt;q=0.8,en-US;q=0.5,en;q=0.3',
                'Accept-Encoding' => 'gzip, deflate, br',
                'Connection' => 'keep-alive',
                'Upgrade-Insecure-Requests' => '1',
                'Sec-Fetch-Dest' => 'document',
                'Sec-Fetch-Mode' => 'navigate',
                'Sec-Fetch-Site' => 'none',
                'Sec-Fetch-User' => '?1',
            ];
            // Use o Guzzle para fazer a requisição HTTP
            $client = new Client(['headers' => $headers]);
            $response = $client->get($apiUrl);

            // Obtenha os dados da resposta como array
            if ($response->getBody() != null) {
                $data = json_decode($response->getBody(), true);

                foreach ($data['assetEarningsModels'] ?? [] as $rendimento) {
                    try {
                        $paymentDate = Carbon::createFromFormat('d/m/Y', $rendimento['pd'])->toDateString();
                        if (!FiDividends::where('fi_id', $fund->id)
                            ->where('payment_date', $paymentDate)
                            ->exists()) {
                            FiDividends::create([
                                'fi_id' => $fund->id,
                                'payment_date' => $paymentDate,
                                'value' => $rendimento['v'],
                                'last_date_priority' => Carbon::createFromFormat('d/m/Y', $rendimento['ed'])->toDateString()
                            ]);
                        }
                    } catch (\Exception $e) {
                        // Imprime a mensagem de erro e a query
                        echo "Erro: " . $e->getMessage() . PHP_EOL;
                        echo "Query: " . $e->getSql() . PHP_EOL;
                    }
                }
            }
            sleep(1);

        }

    }
}
