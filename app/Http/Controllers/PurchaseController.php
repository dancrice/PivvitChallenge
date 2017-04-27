<?php
namespace App\Http\Controllers;

use App\Offering;
use App\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function getPurchase()
    {
        $purchase = Purchase::with(['offering'])->get()->toArray();
        $result = [
            'purchases' => $purchase
        ];

        return response()->json($result);
    }

    public function create()
    {
        $offerings = Offering::get()->toArray();
        $result = [
            'offerings' => $offerings,
        ];
        return response()->json($result);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'offeringID' => 'required|integer',
            'customerName' => 'required',
            'quantity' => 'required|integer'
        ]);
        $saveData = new Purchase();
        $saveData->offeringId = $request->offeringID;
        $saveData->customerName = $request->customerName;
        $saveData->quantity = $request->quantity;
        $saveData->save();
        return response()->json(['result' => 1]);
    }
}
