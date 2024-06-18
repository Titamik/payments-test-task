<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatusEnum;
use App\Http\Requests\PaymentUpdateRequest;
use App\Models\Currency;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PaymentController extends Controller
{
    public function index(Request $request): Response
    {

        $payments = Payment::query()
            ->with('currency', 'user')
            ->paginate(20);

        return Inertia::render('Payment/Index', [
            'payments' => $payments,
        ]);
    }

    public function edit(Payment $payment): Response
    {
        $users = User::query()
            ->pluck('email', 'id')
            ->toArray();

        $currencies = Currency::query()
            ->pluck('title', 'id')
            ->toArray();

        $paymentStatuses = PaymentStatusEnum::asSelectArray();

        return Inertia::render('Payment/Edit', [
                'payment' => $payment,
                'users' => $users,
                'currencies' => $currencies,
                'paymentStatuses' => $paymentStatuses
            ]
        );
    }

    public function update(PaymentUpdateRequest $request, Payment $payment): RedirectResponse
    {
        $payment->update($request->validated());

        return redirect()
            ->route('payments.index')
            ->with('message', 'Payment Updated Successfully');
    }

}
