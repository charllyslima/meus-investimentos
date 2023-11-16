<?php

namespace Database\Seeders;

use App\Models\Funds;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Seeder;
use GuzzleHttp\Client;

class FundsSeeder extends Seeder
{
    const FII = 7;
    const FIAGRO = 34;

    /**
     * Run the database seeds.
     * @throws GuzzleException
     */
    public function run(): void
    {
        $this->seedTrusts(self::FII);
        $this->seedTrusts(self::FIAGRO);
    }

    /**
     * Seed trusts based on fund type.
     *
     * @param int $fundType
     * @throws GuzzleException
     */
    private function seedTrusts(int $fundType): void
    {
        $params = [
            'typeFund' => $fundType,
            'pageNumber' => 1,
            'pageSize' => 100,
        ];

        $encodeData = base64_encode(json_encode($params));

        $apiUrl = "https://sistemaswebb3-listados.b3.com.br/fundsProxy/fundsCall/GetListedFundsSIG/$encodeData";

        // Use o Guzzle para fazer a requisição HTTP
        $client = new Client();
        $response = $client->get($apiUrl);

        // Obtenha os dados da resposta como array
        $data = json_decode($response->getBody(), true);

        // Itera sobre os resultados
        foreach ($data['results'] as $item) {
            // Verifica se o registro já existe na tabela
            $existingTrust = Funds::where('acronym', $item['acronym'])->first();

            // Se não existir, cria um novo registro
            if (!$existingTrust) {
                Funds::create([
                    'acronym' => $item['acronym'],
                    'fundName' => $item['fundName'],
                    'companyName' => $item['companyName'],
                    'type' => $fundType === self::FII ? 'FII' : 'FIAGRO',
                ]);
            }
        }
    }
}
