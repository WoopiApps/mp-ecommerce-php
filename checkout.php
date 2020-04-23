<?php

require __DIR__ . '/vendor/autoload.php';

// MercadoPago\SDK::setAccessToken("YOUR_ACCESS_TOKEN");      // On Production
// MercadoPago\SDK::setAccessToken("TEST-1253253487638612-071919-d9c45a800adb762aa4677dafef58faac__LB_LC__-52244110"); // On Sandbox
MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-090914-5c508e1b02a34fcce879a999574cf5c9-469485398"); // On Sandbox

$preference_data = array(
    "items" => array(
        array(
            "shortname" => 'iPhoneX',
            "title" => 'Mi telefono',
            "quantity" => 1,
            "currency_id" => "ARS",
            "unit_price" => (float)1,
        )
    ),
    "payer" => [
        "name" => "Lalo",
        "surname" => "Landa",
        "email" => "test_user_63274575@testuser.com",
        "phone" => [
            "area_code" => "11",
            "number" => "2222-3333"
        ],
        "identification" => [
            "type" => "DNI",
            "number" => "22333444"
        ],
        "address" => [
            "street_name" => "Falsa",
            "street_number" => 123,
            "zip_code" => "1111"
        ],
    ],
    "payment_methods" => [
        "installments" => 6,
        "excluded_payment_types" => [
            [
                "id" => "atm"//Excluimos los pagos offline
            ],
        ],
        "excluded_payment_methods" => [
            [
                "id" => "amex"
            ]
        ],
    ],
    "notification_url" => 'http://www.mp-ecommerce-php.local/ipn.php',
    "external_reference" => 'ABCD1234',
    "binary_mode" => true, //Fuerza a que la transacción sea exitosa o falle. Nunca queda en pending. De esta forma es instantáneo
    "back_urls" => [
        "success" => 'http://www.mp-ecommerce-php.local/congrats.php?meemompresult=success',
        "failure" => 'http://www.mp-ecommerce-php.local/congrats.php?meemompresult=error',
        "pending" => 'http://www.mp-ecommerce-php.local/congrats.php?meemompresult=error'
    ],
    "auto_return" => "approved",
);

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference($preference_data);
// var_dump($preference);
// Crea un ítem en la preferencia
// $item = new MercadoPago\Item();
// $item->title = 'Mi producto';
// $item->quantity = 1;
// $item->unit_price = 75.56;
// $preference->items = array($item);
$preference->save();


// echo "<a href='$preference->sandbox_init_point'> Pagar </a>";
// header('Location: '. $preference->sandbox_init_point);
header('Location: ' . $preference->init_point);