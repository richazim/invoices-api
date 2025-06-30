<?php

namespace App\Http\Controllers\Api\Invoice;

use App\Actions\Invoice\StoreInvoiceAction;
use App\DataTransferObjects\Invoice\InvoiceDataObject;
use App\Http\Controllers\Controller;
use App\Http\Resources\Invoice\InvoiceCollection;
use App\Models\Invoice;
use App\Responses\Invoice\InvoiceCollectionResponse;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request): InvoiceCollectionResponse
    {
        $invoiceDataObject = new InvoiceDataObject(
            strval($request->total_price_excluding_vat), 
            strval($request->total_vat), 
            intval($request->user()?->id)
        );

        (new StoreInvoiceAction())->handle(...$invoiceDataObject->toArray());  // Insèrer les données de request dans la bd

        $invoiceCollection = new InvoiceCollection(
            Invoice::query()
                ->with(['user'])
                ->where('user_id', '=', $request->user()?->id)
                ->paginate(25)
        ); // Récupérer du json de tous les factures de l'utilisateur connecté mais paginer de 25 factures


        return new InvoiceCollectionResponse($invoiceCollection, 200); // Retourner une réponse du json des factures avec un statut 200
    }
}
