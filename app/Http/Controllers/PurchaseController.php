<?php
namespace App\Http\Controllers;

use App\Offering;
use App\Purchase;

class PurchaseController extends Controller
{
    public function getPurchase()
    {
        $purchase = Purchase::with(['offering'])->get()->toArray();
        $result = [
            'purchase' => $purchase,
        ];
        return response()->json($result);
    }

    public function create()
    {
        $offerings = Offering::get()->toArray();
        $result = [
            'offering' => $offerings,
        ];
        return response()->json($result);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'offeringId' => 'required|integer',
            'customerName' => 'required',
            'quanity' => 'required|integer'
        ]);
        $requiredFields = ['offeringId', 'customerName', 'quantity'];
        $savedData = array_only($request, $requiredFields);
        $saveData = new Purchase();
        $saveData->offeringId = $request->offeringId;
        $saveData->customerName = $request->customerName;
        $saveData->quantity = $request->quantity;
        $saveData->save();
        return response()->json(['result' => 1]);

    }
}
