<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Takeaway Invoice {{ $order->id }}</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <style>
        * {
            font-family: 'Roboto', sans-serif;
        }

        @media print {
            @page {
                size: auto;   /* auto is the initial value */
                margin: 1mm 5mm;  /* this affects the margin in the printer settings */
            }
        }

        table.table_lines {
            border-collapse: collapse;
            width: 100%;
        }

        table.table_lines td {
            padding: 7px;
            border: 1px solid #c0c0c0;
        }
    </style>
</head>
<body>
<table style="width: 100%">
    <tr>
        <td style="color:#666666;font-size:small;width: 150px; vertical-align: top">
            <img src="{{ asset('asstes/image/invoice_logo.gif') }}" alt=""/>
            <br>
            <p>
                Bindia {!! $order->shopAddress() !!}<br><br>
                <a href="mailto:bindia@bindia.dk">office@bindia.dk</a><br>
                <a href="https://www.bindia.dk">www.bindia.dk</a><br><br>
                tlf. {{ $order->shopPhone() }}<br><br>
                {{ $order->shopCompany() }}<br>
                CVR: {{ $order->getShopCVR() }}<br><br>
                Danske Bank<br>
                Reg.: 3409<br>
                Konto: {{ $order->getShopAccountNumber() }}<br>
                IBAN: {{ $order->getShopIban() }}<br>
                SWIFT: DABADKKK
            </p>
        </td>
        <td style="font-size:small;vertical-align: top;width: 510px">
            @if ($order->is_custom_order)
                <h2 style="color:#f36a5a">INVOICE # {{ $order->id }}</h2>
            @else
                <h2 style="color:#f36a5a">TAKEAWAY INVOICE</h2>
            @endif
            <table style="width:100%">
                <tr>
                    <td style="vertical-align: top">
                        @if (!$order["is_custom_order"])
                            Invoice # {{ $order->id}} <br>
                        @endif
                        Date: {{ $order->order_time }}<br>
                    </td>
                    <td style="vertical-align: top">
                        <div style="width: 100%"><b style="text-decoration: underline">Customer:</b></div>
                        <div
                            style="width: 100%">{{ $order->shipping_first_name . " " . $order->shipping_last_name }}</div>
                        <div style="width: 100%">{{ $order->shipping_email }}</div>
                        {!! !blank($order->shipping_address) ? '<div style="width: 100%">' . $order->shipping_address . "</div>" : "" !!}
                        {!! !blank($order->shipping_city) ? '<div style="width: 100%">' . $order->shipping_city . "</div>" : "" !!}
                        {!! !blank($order->shipping_postal_code) ? '<div style="width: 100%">' . $order->shipping_postal_code . "</div>" : "" !!}
                        <a href="tel:{{ $order->customer->customer_phone }}">{{ $order->customer->customer_phone }}</a>
                    </td>
                </tr>
            </table>
            <br>
            <table class="table_lines">
                @if (!$order->is_custom_order)
                    <tr style="background-color: #C9C9C9;color: #000000;font-weight: bold;font-size: 12px;">
{{--                        <td {{ isset($_GET['noprint']) ? 'width="10%"' : "" }}>Code</td>--}}
                        <td {{ isset($_GET['noprint']) ? 'width="53%"' : "" }}>Item</td>
                        <td
                            style="text-align: center" {{ isset($_GET['noprint']) ? 'width="17%"' : "" }}>
                            Qty x Price
                        </td>
                        <td style="text-align: right;" {{ isset($_GET['noprint']) ? 'width="20%"' : "" }}>
                            Total
                        </td>
                    </tr>
                @endif

                @foreach ($order->items as $order1)
                    <tr>
{{--                        <td>--}}
{{--                            {{ $order1->code }}--}}
{{--                        </td>--}}
                        <td>
                            {{ $order1->qty }} x {{ $order1->item_title }}

                            {{--                            //echo Spice::to_html($order1["item_title"], $order1["spice"], $order1["qty"]);--}}
                            {!! empty($order1->itemDetail->portion) ? '' : ' (<i style="font-size: 90%">' . $order1->itemDetail->portion . '</i>)' !!}

                            @if (!blank($order1->spiceHtml()))
                                <br>
                                {{ $order1->spiceHtml() }}
                            @endif
                        </td>
                        <td style="text-align: center">
                            {{ $order1["qty"] }} x {{ $order1->price }}</td>
                        <td style="font-weight:bold;text-align:right">
                            {{ number_format2($order1->qty * $order1->price, 2) }} DKK
                        </td>
                    </tr>
                @endforeach

                @if (isset($order['gift_card_discount']) && $order['gift_card_discount'] > 0)
                    <tr style="font-weight: bold">
                        <td colspan="3" style="text-align:right">Gift card discount:</td>
                        <td style="text-align:right">- {{ number_format2($order->gift_card_discount, 2) }} DKK
                        </td>
                    </tr>
                @endif

                @if ($order->is_delivery && !$order->is_custom_order)
                    <tr style='text-align: right;font-style: italic'>
                        <td colspan="3">Delivery Fee:</td>
                        <td>{{ number_format2($order->delivery_fee, 2) }} DKK</td>
                    </tr>
                @endif

                @if ($order->discount > 0)
                    <tr style="font-weight: bold">
                        <td colspan="3" style="text-align:right">Discount:</td>
                        <td style="text-align:right">- {{ number_format2($order->dynamic_discount, 2) }} DKK
                        </td>
                    </tr>
                @endif

                <tr style="font-weight: bold">
                    <td colspan="2" style="text-align:right">Total:</td>
                    <td style="text-align:right">
                        {{ number_format2($order->total_amount, 2) }} DKK
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: right;">
                        (<b>{{ $order->total_amount * 0.2 }} DKK</b> VAT included)
                    </td>
                </tr>
            </table>
            <table style="margin-top: 5px;width: 100%">
                <tr>
                    <td style="vertical-align: top">
                        <h2 style="margin-bottom: 5px">
                            @if (!$order->isDelivery())
                                Pick up Info
                            @else
                                Delivery Info
                            @endif
                        </h2>
                        <table style="border-collapse: collapse" class="table_lines">
                            @if ($order->isOnlinePayment())
                                <tr>
                                    <td>Payment type</td>
                                    <td>Online</td>
                                </tr>
                            @endif
                            <tr style='background-color:#C9C9C9'>
                                <td>Paid</td>
                                <td>{{ $order->paid ? "Yes" : "No" }}</td>
                            </tr>
                            <!--Paid Time-->
                            @if (!$order->is_custom_order && $order->paid)
                                <tr>
                                    <td>Paid Time:</td>
                                    <td>{{ $order->paid_time ? $order->paid_time->format(config('app.long_date_time_format')) : '' }}</td>
                                </tr>
                            @endif

                            @if ($order->is_delivery)
                                <tr>
                                    <td>Order Type:</td>
                                    <td>Delivery</td>
                                </tr>
                                @if (!$order->is_custom_order)
                                    <tr style='font-weight:bold'>
                                        <td>Pick up Time for Takeout</td>
                                        <td>{{ $order->etakeaway_pickup_time ? $order->etakeaway_pickup_time->format('M, d Y (D) H:i') : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Delivery Time for customer</td>
                                        <td>{{ $order->delivery_datetime ? $order->delivery_datetime->format('M, d Y (D) H:i') : '' }}</td>
                                    </tr>
                                @else
                                    @if ($order->etakeaway_pickup_time)
                                        <tr style='font-weight:bold'>
                                            <td>Pick up Time for Takeout</td>
                                            <td>{{ $order->etakeaway_pickup_time ? $order->etakeaway_pickup_time->format('M, d Y (D) H:i') : '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Delivery Time for customer</td>
                                            <td>{{ $order->delivery_datetime ? $order->delivery_datetime->format('M, d Y (D) H:i') : '' }}</td>
                                        </tr>
                                    @elseif (!empty($order["pickup_datetime"]))
                                        <tr style='font-weight:bold'>
                                            <td>Pick up Time</td>
                                            <td>{{ $order->pickup_datetime ? $order->pickup_datetime->format('M, d Y (D) H:i') : '' }}</td>
                                        </tr>
                                    @endif
                                @endif

                                @if ($order["is_custom_order"] <> "1")
                                    <tr style='font-weight:bold'>
                                        <td>Delivery Fee:</td>
                                        <td>DKK {{ $order->delivery_fee }}</td>
                                    </tr>
                                @endif
                                @if (empty($order->etakeaway_id) && !$order->is_custom_order)
                                    <tr>
                                        <td>Takeout ID:</td>
                                        <td style="font-style: italic;">-- No takeout ID available --</td>
                                    </tr>
                                @elseif ($order["is_custom_order"] <> "1")
                                    <tr>
                                        <td>Takeout ID:</td>
                                        <td>{{ $order->etakeaway_id }}</td>
                                    </tr>
                                @endif
                            @else
                                <tr>
                                    <td>Order Type:</td>
                                    <td>{{ $order->isDelivery() ? 'Delivery' : 'Pick Up' }}</td>
                                </tr>
                                <tr>
                                    <td>Pickup Date Time:</td>
                                    <td>{{ $order->pickup_datetime ? $order->pickup_datetime->format(config('app.long_date_time_format')) : '' }}</td>
                                </tr>
                            @endif

                            @if ($order->is_delivery)
                                @if (!($order->is_custom_order && !$order->paid))
                                    <tr>
                                        <th colspan="2">Shipping Details</th>
                                    </tr>
                                    <tr>
                                        <td>Name:</td>
                                        <td>{{ $order->shipping_first_name . " " . $order->shipping_last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td>{{ $order->shipping_email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address:</td>
                                        <td>{{ $order->shipping_address }}</td>
                                    </tr>
                                    <tr>
                                        <td>City:</td>
                                        <td>{{ $order->shipping_city }}</td>
                                    </tr>
                                    <tr>
                                        <td>Postal Code:</td>
                                        <td>{{ $order->shipping_postal_code }}</td>
                                    </tr>
                                @endif
                            @else
                                <tr>
                                    <td>Pickup Location:</td>
                                    <td>
                                        Bindia {{ $order->shopNameLong() }}</td>
                                </tr>
                            @endif

                            @if ($order->is_custom_order)
                                <tr>
                                    <td style="font-weight: bold">Paid Time:</td>
                                    <td style="font-weight: bold">
                                        @if ($order["paid"])
                                            {{ $order->paid_time ? $order->paid_time->format(config('app.long_date_time_format')) : '' }}
                                        @else
                                            <i>-- Not paid yet --</i>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </td>
                </tr>
            </table>

            @if (!blank($order->comments))
                <div style="margin-top: 10px;">
                    <b>Customer Comments</b><br>
                    {!! nl2br($order->comments) !!}
                </div>
            @endif
        </td>
    </tr>
</table>
</body>
</html>
