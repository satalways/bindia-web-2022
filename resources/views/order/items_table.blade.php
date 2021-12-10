<table class="table table-bordered table-sm">
    <tr style="background-color: #23292c;color: #fff;">
        <th>Product</th>
        <th>Unit Price</th>
        <th>Amount</th>
    </tr>
    @php($total = 0)
    @foreach($order->items as $item)
        @php($total = $total + ($item->price * $item->qty))
        <tr>
            <td>
                {{ $item->qty }} x {{ $item->item_title }}
                {{ $item->spiceHtmlBrackets() }}
            </td>
            <td class="right">{{ number_format2($item->price) }} DKK</td>
            <td class="right">{{ number_format2($item->qty * $item->price) }} DKK</td>
        </tr>
    @endforeach

    <tr style="font-style: italic;" class="right">
        <td colspan="2">Total:</td>
        <td>{{ number_format2($total) }} DKK</td>
    </tr>

    @if ($order->discount>0)
        @php($total -= $order->discount)
        <tr style="font-style: italic" class="right">
            <td colspan="2">Discount:</td>
            <td>-{{ number_format2($order->discount) }} DKK</td>
        </tr>
    @endif

    @if ($order->gift_card_discount > 0)
        @php($total -= $order->gift_card_discount)
        <tr style="font-style: italic;" class="right">
            <td colspan="2">Gift card discount:</td>
            <td>-{{ number_format2($order->gift_card_discount) }} DKK</td>
        </tr>
    @endif

    @if ($order->is_delivery)
        @php($total += round($order->delivery_fee, 0))
        <tr class="right bold">
            <td colspan="2">Delivery Fee:</td>
            <td>{{ round($order->delivery_fee,0) }} DKK</td>
        </tr>
    @endif

    <tr class="right bold">
        <td colspan="2">Grand Total:</td>
        <td>{{ number_format2($total) }} DKK</td>
    </tr>
</table>
