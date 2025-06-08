<?php

namespace App\Responses\Invoice;

use App\Http\Resources\Invoice\InvoiceCollection;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;

final class InvoiceCollectionResponse implements Responsable // Interface Responsable pour nous forcer a implementer la methode toResponse
{
    public function __construct(private readonly InvoiceCollection $invoiceCollection, private readonly int $status)
    {

    }

    public function toResponse($request): JsonResponse
    {
        return response()
            ->json($this->invoiceCollection, $this->status);
    }
}