
@extends('layouts.app')

@section('content')
    <div class="container">






        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                            <li class="nav-item">
                                <a class="nav-link active" href="{{LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                            </li>
                        @endforeach


                    </ul>

                </div>
            </div>
        </nav>

        <div id="success_msg" class="alert alert-success text-center" style="display:none" >
            <h3>تم الحفظ بنجاح</h3>
        </div>



        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 text-center">
                <div class="flex  justify-center items-center">
                    <h1>{{__('messages.update Your Offer')}}</h1>
                </div>

                @if(Session::has('success_update'))
                    <div class="alert alert-success" role="alert">
                        {{__(Session::get('success_update'))}}
                    </div>
                @endif


                <form method="POST" id="offerFormUpdate" action="{{route('ajax.offer.update', $offer_select -> id)}}" enctype="multipart/form-data">
                    @csrf
                    {{--                        <input name="_token" value="{{csrf_token()}}">  ---> @csrf--}}
                    <input type="text" class="form-control" style="display: none" name="offer_id" value="{{$offer_select->id}}">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">{{__('messages.Enter Offer AR')}}</label>
                        <input type="text" class="form-control" name="name_ar" value="{{$offer_select->name_ar}}" placeholder="{{__('messages.Enter Offer AR')}}">
                        <span class="text-danger">{{ $errors->first('name_ar') ?? '' }}</span>

                        {{--                            @error('name')--}}
                        {{--                            <small class="form-text text-danger">{{($massages)}}</small>--}}
                        {{--                            @enderror--}}
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">{{__('messages.Enter Offer EN')}}</label>
                        <input type="text" class="form-control" name="name_en" value="{{$offer_select->name_en}}" placeholder="{{__('messages.Enter Offer EN')}}">
                        <span class="text-danger">{{ $errors->first('name_en') ?? '' }}</span>

                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">{{__('messages.Price Offer')}}</label>
                        <input type="text" class="form-control" name="price" value="{{$offer_select->price}}" placeholder="{{__('messages.Price Offer')}}">
                        <span class="text-danger">{{ $errors->first('price') ?? '' }}</span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">{{__('messages.Details Offer AR')}}</label>
                        <input type="text" class="form-control" name="details_ar" value="{{$offer_select->details_ar}}"   placeholder="{{__('messages.Details Offer AR')}}">
                        <span class="text-danger">{{ $errors->first('details_ar') ?? '' }}</span>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">{{__('messages.Details Offer EN')}}</label>
                        <input type="text" class="form-control" name="details_en" value="{{$offer_select->details_en}}"   placeholder="{{__('messages.Details Offer EN')}}">
                        <span class="text-danger">{{ $errors->first('details_en') ?? '' }}</span>
                    </div>

                    <button id="update_offer" class="btn btn-primary" >{{__('messages.Save Offer')}}</button>
                </form>

            </div>
        </div>
        @stop

        @section('scripts')
            <script>
                $(document).on('click', '#update_offer', function (e){
                    e.preventDefault();
                    var formData = new FormData($('#offerFormUpdate')[0]);

                    $.ajax({
                        type: 'post',
                        enctype: 'multipart/form-data',
                        url: '{{route('ajax.offer.update')}}',
                        data: formData,
                        processData: false,
                        contentType: false,
                        cache: false,

                        success: function (data){

                            if(data.status == true){

                                $('#success_msg').show();

                                // alert(data.msg)
                            }

                        },error: function (reject){

                        }

                    });

                });









                {{--$(document).on('click', '#save_offer', function (e){--}}
                {{--    e.preventDefault();--}}

                {{--    $.ajax({--}}
                {{--        type: 'post',--}}
                {{--        url: '{{route('ajax.offer.store')}}',--}}
                {{--        data: {--}}
                {{--            '_token': '{{csrf_token()}}',--}}
                {{--            'name_ar': $("input[name='name_ar']").val(),--}}
                {{--            'name_en':$("input[name='name_en']").val(),--}}
                {{--            'price':$("input[name='price']").val(),--}}
                {{--            'details_ar':$("input[name='details_ar']").val(),--}}
                {{--            'details_en':$("input[name='details_en']").val(),--}}
                {{--     'photo':$("input[name='photo']").val(),--}}


                {{--},--}}
                {{--        success: function (data){--}}

                {{--        },error: function (reject){--}}

                {{--        }--}}

                {{--    });--}}

                {{--});--}}
            </script>
@stop


