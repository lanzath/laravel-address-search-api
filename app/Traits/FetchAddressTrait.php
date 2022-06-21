<?php

namespace App\Traits;

use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Support\Facades\Http;

/**
 * Handle external API address search
 */
trait FetchAddressTrait
{
    /**
     * Get address by Cep
     *
     * @param  int $cep
     * @return Json
     */
    protected function getAddress(int $cep)
    {
        $data = (array) json_decode(Http::get("viacep.com.br/ws/$cep/json/")->body());
        $address = new Address($data);

        // Attribute 'cidade' from external api is coming as 'localidade'.
        $address->cidade = $data['localidade'];

        return $address;
    }
}

