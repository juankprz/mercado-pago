<?php

namespace App\Http\Traits;

use App\Models\PaymentMethod;
use Carbon\Carbon;
use MercadoPago;

trait TraitMercadoPago
{

    /**
     * @param Product [product]
     * @return Preference [preference]
     */
    public function makePreference($product)
    {

        /**
         * Summary: [AccessToken setter to MercadoPago\SDK Model]
         */

        MercadoPago\SDK::setAccessToken('APP_USR-2572771298846850-120119-a50dbddca35ac9b7e15118d47b111b5a-681067803');
        MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");
        $preference = new MercadoPago\Preference();

        /**
         * New Payer Model to add on Preference
         */
        $payer = new MercadoPago\Payer();
        $payer->name = "Lalo";
        $payer->surname = "Landa";
        $payer->email = "test_user_83958037@testuser.com";
        $payer->date_created = Carbon::now();
        $payer->phone = array(
            "area_code" => "52",
            "number" => "5549737300"
        );

        $payer->identification = array(
            "type" => "DNI",
            "number" => "12345678"
        );

        $payer->address = array(
            "street_name" => "Insurgentes Sur",
            "street_number" => 1602,
            "zip_code" => "03940"
        );


        /**
         * New Item Model to add on Preference
         */
        $item = new MercadoPago\Item();
        $item->id = $product->id;
        $item->title = $product->name;
        $item->description = "Dispositivo móvil de Tienda e-commerce";
        $item->quantity = 1;
        $item->unit_price = $product->price;
        $item->picture_url = asset($product->image);

        $preference->items = array($item);
        $preference->payer = $payer;
        $preference->external_reference = "sebastianberrio45@hotmail.com";

        $preference->payment_methods = array(
            "excluded_payment_methods" => array(
                array("id" => "amex")
            ),
            "excluded_payment_types" => array(
                array("id" => "atm")
            ),
            "installments" => 6
        );
        $preference->back_urls = array(
            "success" => route('success'),
            "failure" => route('failure'),
            "pending" => route('pending'),
        );

        $preference->notification_url = route('notifications');

        $preference->auto_return = "approved";

        $preference->save();

        return $preference;
    }
}
