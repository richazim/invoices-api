<?php

namespace App\Http\Controllers\Api\Invoice;

use App\Http\Controllers\Controller;
use App\Http\Resources\Invoice\InvoiceCollection;
use App\Models\Invoice;
use App\Responses\Invoice\InvoiceCollectionResponse;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request): InvoiceCollectionResponse
    {
        $invoiceCollection = new InvoiceCollection(
            Invoice::query()
                ->with(['user'])
                ->where('user_id', '=', $request->user()?->id)
                ->paginate(25)
        );

        $invoiceCollectionResponse = new InvoiceCollectionResponse($invoiceCollection, 200);

        return $invoiceCollectionResponse;
    }
}
