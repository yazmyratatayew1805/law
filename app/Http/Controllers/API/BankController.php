<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;

use App\Http\Requests\BankRequest;
use App\Http\Resources\BankResource;
use App\Models\Bank;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BankController extends BaseController
{
    public function index(Request $request): JsonResponse
    {
        $bank = Bank::all();
        return $this->sendResponse(BankResource::collection($bank), 'Successfully.');
    }

    public function create(BankRequest $request): JsonResponse
    {
        $data = $request->validated();
        $bank = Bank::create($data);
        return $this->sendResponse(BankResource::make($bank), 'Successfully.');
    }


    public function update($id, BankRequest $request): JsonResponse
    {
        $bank = Bank::findOrFail($id);
        $data = $request->validated();
        $bank->update($data);
        return $this->sendResponse(BankResource::make($bank), 'Successfully.');
    }

    public function delete($id): JsonResponse
    {
        $bank = Bank::findOrFail($id);
        $bank->delete();
        return $this->sendResponse('Deleted', 'Successfully.');
    }

}
