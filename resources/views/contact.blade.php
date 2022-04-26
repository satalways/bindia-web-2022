@extends('layouts.app')

@section('content')
    <!--Main Breadcrumbs-->
    <div class="bn-breadcrumb-policy bn-main-story">
        <img src="{{ asset('asstes/image/contact-us/contactus-banner.jpg') }}"
             alt="" class="">
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
                        <table>
                            <tr>
                                <td><span>{{ shop('amg')->name }}:</span></td>
                                <td style="padding-left: 15px;"><span>{{ shop('amg')->phone }}</span></td>
                            </tr>
                            <tr>
                                <td><span>{{ shop('gkv')->name }}:</span></td>
                                <td style="padding-left: 15px;"><span>{{ shop('gkv')->phone }}</span></td>
                            </tr>
                            <tr>
                                <td><span>{{ shop('lhg')->name }}:</span></td>
                                <td style="padding-left: 15px;"><span>{{ shop('lhg')->phone }}</span></td>
                            </tr>
                            <tr>
                                <td><span>{{ shop('elm')->name }}:</span></td>
                                <td style="padding-left: 15px;"><span>{{ shop('elm')->phone }}</span></td>
                            </tr>
                            <tr>
                                <td><span>{{ shop('shg')->name }}:</span></td>
                                <td style="padding-left: 15px;"><span>{{ shop('shg')->phone }}</span></td>
                            </tr>
                            <tr>
                                <td><span>{{ shop('bdv')->name }}:</span></td>
                                <td style="padding-left: 15px;"><span>{{ shop('bdv')->phone }}</span></td>
                            </tr>
                            <tr>
                                <td><span>{{ __('global.main_office') }}:</span></td>
                                <td style="padding-left: 15px;"><span>(+45) 30 25 88 38</span></td>
                            </tr>
                        </table>
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

                            <div class="position-relative">
                                <span class="bn-file-attachment-label form-control" id="bn-file-attachment-label">Attach File...</span>
                                <input type="file" placeholder="Attach File..." id="bn-file-attachment"
                                       class="form-control bn-file-attachment" name="file">
                            </div>

                            {{--                            <input type="file" name="file" class="form-control">--}}

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
                .on('submit', '#form1', function () {
                    showLoader();
                });
        })
    </script>
@endsection
