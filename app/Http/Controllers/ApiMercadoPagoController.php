<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiMercadoPagoController extends Controller
{
    public function success()
    {
        return view('success', [
            'payment_type' => $_REQUEST['payment_type'],
            'payment_id' => $_REQUEST['payment_id'],
            'external_reference' => $_REQUEST['external_reference'],
        ]);
    }

    public function pending()
    {
        return view('pending');
    }

    public function failure()
    {
       return view('failure');
    }

    public function notifications(Request $request)
    {
        Log::info($request);
        return response()->json([
            'status' => 'success',
        ], 200);
    }
}
