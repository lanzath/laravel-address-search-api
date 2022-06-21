<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use App\Traits\FetchAddressTrait;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
{
    use FetchAddressTrait;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(AddressResource::collection(Address::all()), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AddressRequest $request
     * @return JsonResponse
     */
    public function store(AddressRequest $request): JsonResponse
    {
        return response()->json(Address::create($request->validated()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  Address $address
     * @return JsonResponse
     */
    public function show(Address $address): JsonResponse
    {
        return response()->json(new AddressResource($address), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AddressRequest $request
     * @param  Address $address
     * @return JsonResponse
     */
    public function update(AddressRequest $request, Address $address): JsonResponse
    {
        return response()->json($address->update($request->validated()), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Address $address
     * @return JsonResponse
     */
    public function destroy(Address $address): JsonResponse
    {
        $address->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    public function searchAddressFromExternalApi()
    {
        $data = $this->getAddress(89218112);

        return response()->json(new AddressResource($data), 200);
    }
}
