@extends('layouts.app')

@section('content')
    <!--Main Breadcrumbs-->
    <div class="bn-banner-catering d-none d-sm-block">
        <div>
            <img src="{{ asset('asstes/image/catering-menu/catering-menu-drink.jpg') }}" alt="" class="">
        </div>
    </div>
    <!--End Main Banner-->
    <!--Email send box-->
    <div id="html">
        @include('catering.ajax.drinks')
    </div>
@endsection


@section('js')
    <script>
        $(function () {
            $(document)
                .on('click', '.addToCart', function () {
                    var Code = $(this).attr('data-code');
                    var Add = $(this).attr('data-add');

                    if (Add === '-1' && $(this).next().text() == 'x0') {
                        return;
                    }

                    showLoader();
                    $.ajax({
                        url: "{{ route('catering.post') }}",
                        method: 'post',
                        data: {action: 'addItemToCart', code: Code, add: Add},
                        error: function (e1, e2, e3) {
                            hideLoader();
                            alert(a3);
                        }
                    }).done(function (data) {
                        hideLoader();
                        $('#html').html(data);
                    });
                })
        });
    </script>
@endsection
