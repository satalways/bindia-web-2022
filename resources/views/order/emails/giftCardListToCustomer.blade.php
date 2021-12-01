Dear <b>{{ $giftCards->first()->customer_name }}</b>,

<p>Please find complete history and list of your gift cards.</p>

<table class="table table-sm">
    <thead>
    <tr class="heading">
        <th style="width: 150px">Card ID</th>
        <th>Valid Upto</th>
        <th>Value</th>
    </tr>
    </thead>
    <tbody>
    @foreach($giftCards as $giftCard)
        <tr class="{{ $giftCard->getStatusName()==='Redeemed' || $giftCard->isExpired()?'mute':'' }}">
            <td>{{ $giftCard->card_number }}</td>
            <td>
                {{ $giftCard->valid_date->format(config('app.date_format')) }}
                @if($giftCard->getStatusName()==='Redeemed')
                    <br><label class="label label-info pull-right">Redeemed</label>
                @elseif($giftCard->isExpired())
                    <br><label class="label label-info pull-right">Expired</label>
                @else
                    {{--                    <br>{{ $giftCard->valid_date->diffInDays( \Carbon\Carbon::today() ) }} Days Left--}}
                    <br><b>{{ $giftCard->valid_date->diffForHumans() }}</b>
                @endif
            </td>
            <td>
                @if(!$giftCard->isExpired())
                    @if(!empty($giftCard->balance))
                        @if($giftCard->is_percent_card)
                            Amount: <b>{{ $giftCard->balance }}%</b> of order amount
                            <br>{{ $giftCard->occurrence_time }} times
                        @else
                            Amount: {{ number_format($giftCard->balance,0) }},-
                        @endif
                        <br><br>
                    @endif
                    @if (!empty($giftCard->selected_items_names))
                        <b>Attached Items</b>
                        @foreach($giftCard->selected_items_names as $itemName => $qty)
                            <br><i>{{ $qty }} x {{ $itemName }}</i>
                        @endforeach
                    @endif
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
