<?php
include __DIR__ . '/config.php';
require __DIR__ . '/vendor/autoload.php';

// MercadoPago\SDK::setAccessToken("YOUR_ACCESS_TOKEN");      // On Production
// MercadoPago\SDK::setAccessToken("TEST-1253253487638612-071919-d9c45a800adb762aa4677dafef58faac__LB_LC__-52244110"); // On Sandbox
MercadoPago\SDK::setAccessToken($mp_access_token); // On Sandbox

$payment = MercadoPago\Payment::find_by_id($_GET["collection_id"]);
$merchant_order = MercadoPago\MerchantOrder::find_by_id($_GET["merchant_order_id"]);
$paid_amount = 0;
foreach ($merchant_order->payments as $pay) {
    if ($pay->status == 'approved'){
        $paid_amount += $pay->transaction_amount;
    }
}
?>
<!DOCTYPE html>
<html class="supports-animation supports-columns svg no-touch no-ie no-oldie no-ios supports-backdrop-filter as-mouseuser"
      lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=1024">
    <title>Tienda e-commerce</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="format-detection" content="telephone=no">

    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/category-landing.css" media="screen, print">

    <link rel="stylesheet" href="assets/category.css" media="screen, print">

    <link rel="stylesheet" href="assets/merch-tools.css" media="screen, print">

    <link rel="stylesheet" href="assets/fonts" media="">
    <style>
        .as-filter-button-text {
            font-size: 26px;
            font-weight: 700;
            color: #333;
        }

        .row.as-fixed-nav {
            border-bottom: 1px solid #ddd;
        }

        .as-producttile-tilehero.with-paddlenav.with-paddlenav-onhover {
            height: 330px;
        }

        .as-footnotes {
            background: #333;
            color: #fff;
            padding: 16px 40px;
        }
    </style>
    <style type="text/css"> @keyframes loading-rotate {
                                100% {
                                    transform: rotate(360deg);
                                }
                            }

        @keyframes loading-dash {
            0% {
                stroke-dasharray: 1, 200;
                stroke-dashoffset: 0;
            }
            50% {
                stroke-dasharray: 100, 200;
                stroke-dashoffset: -20px;
            }
            100% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -124px;
            }
        }

        @keyframes loading-fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .mp-spinner {
            position: absolute;
            top: 100px;
            left: 50%;
            font-size: 70px;
            margin-left: -35px;
            animation: loading-rotate 2.5s linear infinite;
            transform-origin: center center;
            width: 1em;
            height: 1em;
        }

        .mp-spinner-path {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
            animation: loading-dash 1.5s ease-in-out infinite;
            stroke-linecap: round;
            stroke-width: 2px;
            stroke: #009ee3;
        } </style>
    <style type="text/css"> .mercadopago-button {
            padding: 0 1.7142857142857142em;
            font-family: "Helvetica Neue", Arial, sans-serif;
            font-size: 0.875em;
            line-height: 2.7142857142857144;
            background: #009ee3;
            border-radius: 0.2857142857142857em;
            color: #fff;
            cursor: pointer;
            border: 0;
        } </style>
    <style type="text/css"> @keyframes loading-rotate {
                                100% {
                                    transform: rotate(360deg);
                                }
                            }

        @keyframes loading-dash {
            0% {
                stroke-dasharray: 1, 200;
                stroke-dashoffset: 0;
            }
            50% {
                stroke-dasharray: 100, 200;
                stroke-dashoffset: -20px;
            }
            100% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -124px;
            }
        }

        @keyframes loading-fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .mp-spinner {
            position: absolute;
            top: 100px;
            left: 50%;
            font-size: 70px;
            margin-left: -35px;
            animation: loading-rotate 2.5s linear infinite;
            transform-origin: center center;
            width: 1em;
            height: 1em;
        }

        .mp-spinner-path {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
            animation: loading-dash 1.5s ease-in-out infinite;
            stroke-linecap: round;
            stroke-width: 2px;
            stroke: #009ee3;
        } </style>
    <style type="text/css"> .mercadopago-button {
            padding: 0 1.7142857142857142em;
            font-family: "Helvetica Neue", Arial, sans-serif;
            font-size: 0.875em;
            line-height: 2.7142857142857144;
            background: #009ee3;
            border-radius: 0.2857142857142857em;
            color: #fff;
            cursor: pointer;
            border: 0;
        } </style>
    <style type="text/css"> @keyframes loading-rotate {
                                100% {
                                    transform: rotate(360deg);
                                }
                            }

        @keyframes loading-dash {
            0% {
                stroke-dasharray: 1, 200;
                stroke-dashoffset: 0;
            }
            50% {
                stroke-dasharray: 100, 200;
                stroke-dashoffset: -20px;
            }
            100% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -124px;
            }
        }

        @keyframes loading-fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .mp-spinner {
            position: absolute;
            top: 100px;
            left: 50%;
            font-size: 70px;
            margin-left: -35px;
            animation: loading-rotate 2.5s linear infinite;
            transform-origin: center center;
            width: 1em;
            height: 1em;
        }

        .mp-spinner-path {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
            animation: loading-dash 1.5s ease-in-out infinite;
            stroke-linecap: round;
            stroke-width: 2px;
            stroke: #009ee3;
        } </style>
    <style type="text/css"> .mercadopago-button {
            padding: 0 1.7142857142857142em;
            font-family: "Helvetica Neue", Arial, sans-serif;
            font-size: 0.875em;
            line-height: 2.7142857142857144;
            background: #009ee3;
            border-radius: 0.2857142857142857em;
            color: #fff;
            cursor: pointer;
            border: 0;
        } </style>
    <style type="text/css"> @keyframes loading-rotate {
                                100% {
                                    transform: rotate(360deg);
                                }
                            }

        @keyframes loading-dash {
            0% {
                stroke-dasharray: 1, 200;
                stroke-dashoffset: 0;
            }
            50% {
                stroke-dasharray: 100, 200;
                stroke-dashoffset: -20px;
            }
            100% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -124px;
            }
        }

        @keyframes loading-fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .mp-spinner {
            position: absolute;
            top: 100px;
            left: 50%;
            font-size: 70px;
            margin-left: -35px;
            animation: loading-rotate 2.5s linear infinite;
            transform-origin: center center;
            width: 1em;
            height: 1em;
        }

        .mp-spinner-path {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
            animation: loading-dash 1.5s ease-in-out infinite;
            stroke-linecap: round;
            stroke-width: 2px;
            stroke: #009ee3;
        } </style>
    <style type="text/css"> .mercadopago-button {
            padding: 0 1.7142857142857142em;
            font-family: "Helvetica Neue", Arial, sans-serif;
            font-size: 0.875em;
            line-height: 2.7142857142857144;
            background: #009ee3;
            border-radius: 0.2857142857142857em;
            color: #fff;
            cursor: pointer;
            border: 0;
        } </style>
    <style type="text/css"> @keyframes loading-rotate {
                                100% {
                                    transform: rotate(360deg);
                                }
                            }

        @keyframes loading-dash {
            0% {
                stroke-dasharray: 1, 200;
                stroke-dashoffset: 0;
            }
            50% {
                stroke-dasharray: 100, 200;
                stroke-dashoffset: -20px;
            }
            100% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -124px;
            }
        }

        @keyframes loading-fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .mp-spinner {
            position: absolute;
            top: 100px;
            left: 50%;
            font-size: 70px;
            margin-left: -35px;
            animation: loading-rotate 2.5s linear infinite;
            transform-origin: center center;
            width: 1em;
            height: 1em;
        }

        .mp-spinner-path {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
            animation: loading-dash 1.5s ease-in-out infinite;
            stroke-linecap: round;
            stroke-width: 2px;
            stroke: #009ee3;
        } </style>
    <style type="text/css"> .mercadopago-button {
            padding: 0 1.7142857142857142em;
            font-family: "Helvetica Neue", Arial, sans-serif;
            font-size: 0.875em;
            line-height: 2.7142857142857144;
            background: #009ee3;
            border-radius: 0.2857142857142857em;
            color: #fff;
            cursor: pointer;
            border: 0;
        } </style>
    <style type="text/css"> @keyframes loading-rotate {
                                100% {
                                    transform: rotate(360deg);
                                }
                            }

        @keyframes loading-dash {
            0% {
                stroke-dasharray: 1, 200;
                stroke-dashoffset: 0;
            }
            50% {
                stroke-dasharray: 100, 200;
                stroke-dashoffset: -20px;
            }
            100% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -124px;
            }
        }

        @keyframes loading-fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .mp-spinner {
            position: absolute;
            top: 100px;
            left: 50%;
            font-size: 70px;
            margin-left: -35px;
            animation: loading-rotate 2.5s linear infinite;
            transform-origin: center center;
            width: 1em;
            height: 1em;
        }

        .mp-spinner-path {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
            animation: loading-dash 1.5s ease-in-out infinite;
            stroke-linecap: round;
            stroke-width: 2px;
            stroke: #009ee3;
        } </style>
    <style type="text/css"> .mercadopago-button {
            padding: 0 1.7142857142857142em;
            font-family: "Helvetica Neue", Arial, sans-serif;
            font-size: 0.875em;
            line-height: 2.7142857142857144;
            background: #009ee3;
            border-radius: 0.2857142857142857em;
            color: #fff;
            cursor: pointer;
            border: 0;
        } </style>
</head>


<body class="as-theme-light-heroimage">

<div class="stack">

    <div class="as-search-wrapper" role="main">
        <div class="as-navtuck-wrapper">
            <div class="as-l-fullwidth  as-navtuck" data-events="event52">
                <div>
                    <div class="pd-billboard pd-category-header">
                        <div class="pd-l-plate-scale">
                            <div class="pd-billboard-background">
                                <img src="assets/music-audio-alp-201709" alt="" width="1440" height="320"
                                     data-scale-params-2="wid=2880&amp;hei=640&amp;fmt=jpeg&amp;qlt=95&amp;op_usm=0.5,0.5&amp;.v=1503948581306"
                                     class="pd-billboard-hero ir">
                            </div>
                            <div class="pd-billboard-info">
                                <h1 class="pd-billboard-header pd-util-compact-small-18">Felicitaciones</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="as-search-results as-filter-open as-category-landing as-desktop" id="as-search-results">

            <div id="accessories-tab" class="as-accessories-details">
                <div class="as-accessories" id="as-accessories">
                    <div class="as-accessories-header">
                        <div class="as-search-results-count">
                            <span class="as-search-results-value"></span>
                        </div>
                    </div>
                    <div class="as-searchnav-placeholder" style="height: 77px;">
                        <div class="row as-search-navbar" id="as-search-navbar" style="width: auto;">
                            <div class="as-accessories-filter-tile ">
                                <style>
                                    .done{
                                        width:100px;
                                        height:100px;
                                        position:relative;
                                        left: 0;
                                        right: 0;
                                        top:-20px;
                                        margin:auto;
                                    }
                                </style>
                                <div style="text-align: center; margin-top: 20px;">
                                    <div class="done">
                                        <svg version="1.1" id="tick" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 37 37" style="enable-background:new 0 0 37 37;"
                                             xml:space="preserve">
<path class="circ path" style="fill:#0cdcc7;stroke:#07a796;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;"
      d="
	M30.5,6.5L30.5,6.5c6.6,6.6,6.6,17.4,0,24l0,0c-6.6,6.6-17.4,6.6-24,0l0,0c-6.6-6.6-6.6-17.4,0-24l0,0C13.1-0.2,23.9-0.2,30.5,6.5z"
/>
                                            <polyline class="tick path"
                                                      style="fill:none;stroke:#fff;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;"
                                                      points="
	11.6,20 15.9,24.2 26.4,13.8 "/>
</svg>
                                    </div>
                                    <h2 class=" as-filter-button-text">
                                        ¡Compra Exitosa!
                                    </h2>
                                    <div style="text-align: center">
                                        <h3>Numero de Orden del Pedido:</h3>
                                        <span><?= $_GET['merchant_order_id'] ?></span>
                                    </div>
                                    <div style="text-align: center">
                                        <h3>ID de Pago de MercadoPago:</h3>
                                        <span><?= $_GET['collection_id'] ?></span>
                                    </div>
                                    <div style="text-align: center">
                                        <h3>Monto Pagado:</h3>
                                        <span>$<?= $paid_amount ?></span>
                                    </div>
                                    <div style="text-align: center">
                                        <h3>Método de pago:</h3>
                                        <span><?= $payment->payment_method_id ?></span>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>