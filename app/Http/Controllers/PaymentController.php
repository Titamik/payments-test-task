<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatusEnum;
use App\Models\Currency;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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

        $paymentStatuses = PaymentStatusEnum::asArray();

        return Inertia::render('Payment/Edit', [
                'payment' => $payment,
                'users' => $users,
                'currencies' => $currencies,
                'paymentStatuses' => $paymentStatuses
            ]
        );
    }

    public function update(Request $request, Payment $payment): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'value' => 'required'
        ]);

        /*
         * TODO: Нормальная валидация будет при создании API метода
         */

        $payment->value = $request->value;
        $payment->save();
        sleep(1);

        return redirect()
            ->route('payments.index')
            ->with('message', 'Payment Updated Successfully');
    }

}
