<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addresses = [
            [
                'cidade' => 'joinville',
                'uf' => 'sc',
                'logradouro' => 'rua dona francisca',
                'bairro' => 'santo antonio',
                'cep' => 89218112,
                'ddd' => 47
            ],
            [
                'cidade' => 'rio claro',
                'uf' => 'sp',
                'logradouro' => 'avenida 61',
                'bairro' => 'jardim itapua',
                'cep' => 13501613,
                'ddd' => 19
            ],
            [
                'cidade' => 'cariacica',
                'uf' => 'es',
                'logradouro' => 'rua a',
                'bairro' => 'nova brasilia',
                'cep' => 29149402,
                'ddd' => 27
            ],
        ];

        foreach ($addresses as $address) {
            Address::create($address);
        }
    }
}
