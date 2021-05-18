<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiMercadoPagoController extends Controller
{
    public function success()
    {
        return view('success', [
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

    public function snotifications(Request $request)
    {

    }
}
