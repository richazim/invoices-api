<?php

namespace App\Actions\Invoice;

use App\Models\Invoice;
use Illuminate\Support\Str;

final class StoreInvoiceAction
{
    public function handle(string $totalPriceExcludingVat, string $totalVat, int $userId): void
    {
        Invoice::create([
            'invoice_number' => Str::uuid(),
            'total_price_excluding_vat' => $totalPriceExcludingVat,
            'total_vat' => $totalVat,
            'total_price' => (float) $totalPriceExcludingVat + (float)$totalVat,
            'user_id' => $userId
        ]);
    }
}