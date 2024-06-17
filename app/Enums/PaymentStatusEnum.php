<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @var string $Paid Опдачен
 * @var string $NotPaid Не оплачен
 */
final class PaymentStatusEnum extends Enum
{
    const Paid = 'PAID';

    const NotPaid = 'NOT_PAID';
}
