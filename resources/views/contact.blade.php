@extends('layouts.app')

@section('content')
    <!--Main Breadcrumbs-->
    <div class="bn-breadcrumb-policy bn-main-story">
        <img src="{{ asset('asstes/image/contact-us/contactus-banner.png') }}"
             data-src="{{ asset('asstes/image/contact-us/contactus-banner.png') }}" alt="" class="lazy">
    </div>

    <!--Main end Breadcrumbs-->
    <div class="bn-contact-us bn-main-story">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fa fa-check"></i>
                    {{ __('contact.received') }}
                </div>
            @endif
            @if(session()->has('message'))
                <div class="alert alert-danger">
                    <i class="fa fa-times"></i>
                    {{ session()->get('message') }}
                </div>
            @endif
            @if(!$errors->isEmpty())
                <div class="alert alert-danger">
                    <i class="fa fa-times"></i>
                    {{ __('contact.something_wrong') }}
                </div>
            @endif

            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="bn-contact-heading">
                        {{ __('contact.call_us') }}
                    </div>
                    <div class="bn-contact-text">
                        <span> {{ shop('bdv')->long_name }}: {{ shop('bdv')->phone }}</span>
                        <span> {{ shop('gkv')->long_name }}: {{ shop('gkv')->phone }}</span>
                        <span> {{ shop('elm')->long_name }}: {{ shop('elm')->phone }}</span>
                        <span> {{ shop('lhg')->long_name }}: {{ shop('lhg')->phone }}</span>
                        <span> {{ shop('amg')->long_name }}: {{ shop('amg')->phone }}</span>
                        <span> {{ shop('shg')->long_name }}: {{ shop('shg')->phone }}</span>
                        <span> Hovedkontor: (+45) 30 25 88 38</span>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="bn-contact-heading">
                        {{ __('contact.send_message') }}
                    </div>
                    <div class="bn-contact-form">
                        <form action="{{ route('contact.post') }}" method="post" enctype="multipart/form-data"
                              id="form1">
                            {{ csrf_field() }}
                            @error('name')
                            <span class="error">{{ $message }}</span>
                            @enderror
                            <input type="text" placeholder="{{ __('global.name') }}"
                                   class="form-control @error('name') error @enderror"
                                   name="name" value="{{ old('name') }}" required="required">

                            @error('email')
                            <span class="error">{{ $message }}</span>
                            @enderror
                            <input type="email" placeholder="{{ __('global.email') }}"
                                   class="form-control @error('email') error @enderror"
                                   name="email" value="{{ old('email') }}" required="required">

                            @error('phone')
                            <span class="error">{{ $message }}</span>
                            @enderror
                            <input type="tel" placeholder="{{ __('global.phone') }}"
                                   class="form-control @error('phone') error @enderror"
                                   name="phone" value="{{ old('phone') }}" required="required">

                            @error('comments')
                            <span class="error">{{ $message }}</span>
                            @enderror
                            <textarea placeholder="{{ __('global.message') }}" required="required"
                                      class="form-control @error('comments') error @enderror"
                                      name="comments">{{ old('comments') }}</textarea>

                            <input type="file" name="file" class="form-control">

                            {{--                            <div class="bn-captcha">--}}
                            {{--                                <span>{!! captcha_img() !!}</span>--}}
                            {{--                                <a id="reload" href="">{{ __('global.refresh_captcha') }}</a>--}}
                            {{--                            </div>--}}
                            {{--                            @error('captcha')--}}
                            {{--                            <span class="error">{{ $message }}</span>--}}
                            {{--                            @enderror--}}
                            {{--                            <input type="text" name="captcha" placeholder="Security Code"--}}
                            {{--                                   class="form-control @error('captcha') error @enderror">--}}
                            <div class="control-field">
                                <label for="birthday">Birthday</label>
                                <input type="text" name="birthday" id="birthday" value=""/>
                            </div>
                            <button type="submit" class="btn">
                                {{ __('global.send') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    {!! js('validation') !!}
    @if(getCurrentLang() === 'da')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/localization/messages_da.min.js"
                integrity="sha512-jVUoHWGGjz3AnASc4bcelHoffeTAqPPTNfubjsC4vtV9TrsJc99N4EqNFNYuBCIV2jJRq+MFW61XiFMkp7SWvw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endif
    <script>
        $(function () {
            $('#form1').validate();

            $(document)
                .on('click', 'a#reload', function (e) {
                    e.preventDefault();

                    $.ajax({
                        type: 'GET',
                        url: '{{ route('refresh_captcha') }}',
                        success: function (data) {
                            $(".bn-captcha span").html(data.captcha);
                        }
                    });
                })
        })
    </script>
@endsection
