@if(empty($item->id) || empty($cartItems[$item->id]))
    <img src="{{ asset('asstes/image/take-away/min-grey.svg') }}" alt="" style="cursor: default !important;">
@else
    <img data-id="{{ $item->id }}" class="addItem" data-inc="-1" src="{{ asset('asstes/image/take-away/min.svg') }}"
         alt="">
@endif
<span>
    @if(!empty($item->id) && !empty($cartItems[$item->id]))
        <span data-id="{{ $item->id }}" class="span_qty">
            x{{ $cartItems[$item->id] }}
        </span>
    @endif
</span>
@if (isset($item->id))
    <img data-id="{{ $item->id }}" class="addItem" data-inc="+1" src="{{ asset('asstes/image/take-away/max.svg') }}"
         alt="">
@elseif(isset($id))
    <img data-id="{{ $id }}" class="addItem" data-inc="+1" src="{{ asset('asstes/image/take-away/max.svg') }}"
         alt="">
@endif
