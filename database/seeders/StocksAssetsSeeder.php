<?php

namespace Database\Seeders;

use App\Models\StockAsset;
use GuzzleHttp\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StocksAssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $urlBase = env('URI_B3', '');

        // Configuração do cliente Guzzle
        $client = new Client();

        // Inicializa a página como 1
        $pageNumber = 1;

        do {
            // Parâmetros em JSON
            $params = [
                'language' => 'pt-br',
                'pageNumber' => $pageNumber,
                'pageSize' => 20,
            ];

            // Codifica os parâmetros para Base64
            $base64Code = base64_encode(json_encode($params));

            // URL da API
            $apiUrl = "{$urlBase}/listedCompaniesProxy/CompanyCall/GetInitialCompanies/{$base64Code}";

            // Faz a requisição HTTP
            $response = $client->get($apiUrl);

            // Decodifica a resposta JSON
            $data = json_decode($response->getBody(), true);

            // Insere os dados na tabela
            foreach ($data['results'] as $item) {
                StockAsset::create([
                    'codeCVM' => $item['codeCVM'],
                    'issuingCompany' => $item['issuingCompany'],
                    'companyName' => $item['companyName'],
                    'tradingName' => $item['tradingName'],
                    'cnpj' => $item['cnpj'],
                    'marketIndicator' => $item['marketIndicator'],
                    'typeBDR' => $item['typeBDR'],
                    'dateListing' => $item['dateListing'],
                    'status' => $item['status'],
                    'segment' => $item['segment'],
                    'segmentEng' => $item['segmentEng'],
                    'type' => $item['type'],
                    // Adicione outros campos conforme necessário
                ]);
            }

            // Incrementa o número da página
            $pageNumber++;

            // Verifica se há mais páginas a serem recuperadas
        } while ($pageNumber <= $data['page']['totalPages']);
    }
}
