<?php 

namespace App\DataTransferObjects\Invoice;

final class InvoiceDataObject
{
    public function __construct(private readonly string $totalPriceExcludingVat, private readonly string $totalVat, private readonly int $userId)
    {

    }

    public function toArray(): array
    {
        return [
            'totalPriceExcludingVat' => $this->totalPriceExcludingVat,
            'totalVat' => $this->totalVat,
            'userId' => $this->userId
        ];
    }
}