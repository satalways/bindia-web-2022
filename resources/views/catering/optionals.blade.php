@extends('layouts.app')

@section('content')
    <!--Main Breadcrumbs-->
    <div class="bn-breadcrumb-catering d-none d-sm-block">
        <div>
            <img src="{{ asset('asstes/image/catering-menu/catering-menu-op.jpg') }}" data-src="{{ asset('asstes/image/catering-menu/catering-menu-op.png') }}" alt="" class="lazy">

        </div>
    </div>
    <!--End Main Banner-->
    <!--Email send box-->
    <div id="html">
        @include('catering.ajax.optionals')
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $(document)
                .on('click', '.addSide', function () {
                    var Code = $(this).attr('data-code');
                    var Add = $(this).attr('data-add');

                    if (Add === "-1" && $(this).next().text() === 'x0') return;

                    show();
                    $.ajax({
                        url: "{{ route('catering.post') }}",
                        method: 'post',
                        data: {action: 'updatePortionSideCart', code: Code, add: Add},
                        error: function (e1, e2, e3) {
                            hide();
                            alert(e3);
                        }
                    }).done(function (data) {
                        hide();
                        $('#html').html(data);
                    });
                })
        });
    </script>
@endsection
