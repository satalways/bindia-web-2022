<table class="table table-sm">
    <thead>
    <tr class="heading">
        <th>Code</th>
        <th>Item</th>
        <th>Price</th>
        <th>Amount</th>
    </tr>
    </thead>
    @foreach($order->items as $item)
        <tr>
            <td>
                {{ $item->code }}
            </td>
            <td>
                {{ $item->qty }} x
                {{ $item->item_title }}
            </td>
            <td class="right">
                {{ $item->price }},-
            </td>
            <td class="right">
                {{ $item->price * $item->qty }},-
            </td>
        </tr>
    @endforeach
</table>
