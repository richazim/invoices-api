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
        ); // Récupérer du json de tous les factures de l'utilisateur connecté mais paginer de 25 factures

        $invoiceCollectionResponse = new InvoiceCollectionResponse($invoiceCollection, 200);

        return $invoiceCollectionResponse; // Retourner une réponse du json des factures avec un statut 200
    }
}
