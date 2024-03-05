<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;

use App\Http\Requests\BeliefRequest;
use App\Http\Requests\IntensionRequest;
use App\Http\Resources\BeliefResource;
use App\Http\Resources\IntensionResource;
use App\Models\Belief;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeliefController extends BaseController
{
    public function index(Request $request): JsonResponse
    {
        $beliefs = Belief::all();
        return $this->sendResponse(BeliefResource::collection($beliefs), 'Successfully.');
    }

    public function create(BeliefRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $belief = Belief::create($data);
        return $this->sendResponse(BeliefResource::make($belief), 'Successfully.');
    }


    public function update($id, BeliefRequest $request): JsonResponse
    {
        $belief = Belief::findOrFail($id);
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $belief->update($data);
        return $this->sendResponse(BeliefResource::make($belief), 'Successfully.');
    }

    public function delete($id): JsonResponse
    {
        $belief = Belief::findOrFail($id);
        $belief->delete();
        return $this->sendResponse('Deleted', 'Successfully.');
    }

}
