<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentApiStoreRequest;
use App\Http\Requests\PaymentUpdateRequest;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(PaymentApiStoreRequest $request): JsonResponse
    {
        $payment = Payment::query()->create($request->validated());

        return response()->json([
            'data' => new PaymentResource($payment)
        ], 201);
    }
}
