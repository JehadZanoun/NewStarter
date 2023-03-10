
@extends('layouts.app')

@section('content')
    <div class="container">

        <div id="success_msg" class="alert alert-success text-center" style="display:none" >
            <h3>تم الحفظ بنجاح</h3>
        </div>





    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 text-center">
            <div class="flex  justify-center items-center">
                <h1>{{__('messages.Add Your Offer')}}</h1>
            </div>

            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{__(Session::get('success'))}}
                </div>
            @endif


            <form id="offerForm" method="POST" action="{{route('ajax.offer.create')}}" enctype="multipart/form-data">
                @csrf
                {{--                        <input name="_token" value="{{csrf_token()}}">  ---> @csrf--}}

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">{{__('messages.photo')}}</label>
                    <input type="file" class="form-control" name="photo" value="{{('photo')}}">
{{--                    <span class="text-danger">{{ $errors->first('photo') ?? '' }}</span>--}}
                    <small id="photo_error" class="form-text text-danger"></small>

                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">{{__('messages.Enter Offer AR')}}</label>
                    <input type="text" class="form-control" name="name_ar" value="{{ old('name') }}" placeholder="{{__('messages.Enter Offer AR')}}">
{{--                    <span class="text-danger">{{ $errors->first('name_ar') ?? '' }}</span>--}}
                    <small id="name_ar_error" class="form-text text-danger"></small>



                    {{--                            @error('name')--}}
                    {{--                            <small class="form-text text-danger">{{($massages)}}</small>--}}
                    {{--                            @enderror--}}
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">{{__('messages.Enter Offer EN')}}</label>
                    <input type="text" class="form-control" name="name_en" placeholder="{{__('messages.Enter Offer EN')}}">
{{--                    <span class="text-danger">{{ $errors->first('name_en') ?? '' }}</span>--}}

                    <small id="name_en_error" class="form-text text-danger"></small>

                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">{{__('messages.Price Offer')}}</label>
                    <input type="text" class="form-control" name="price" placeholder="{{__('messages.Price Offer')}}">
{{--                    <span class="text-danger">{{ $errors->first('price') ?? '' }}</span>--}}
                    <small id="price_error" class="form-text text-danger"></small>

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">{{__('messages.Details Offer AR')}}</label>
                    <input type="text" class="form-control" name="details_ar"  placeholder="{{__('messages.Details Offer AR')}}">
{{--                    <span class="text-danger">{{ $errors->first('details_ar') ?? '' }}</span>--}}

                    <small id="details_ar_error" class="form-text text-danger"></small>

                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">{{__('messages.Details Offer EN')}}</label>
                    <input type="text" class="form-control" name="details_en" placeholder="{{__('messages.Details Offer EN')}}">
{{--                    <span class="text-danger">{{ $errors->first('details_en') ?? '' }}</span>--}}

                    <small id="details_en_error" class="form-text text-danger"></small>

                </div>

                <button id="save_offer" class="btn btn-primary">{{__('messages.Save Offer')}}</button>
            </form>

        </div>
    </div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).on('click', '#save_offer', function (e){

            $('#photo_error').text('');
            $('#name_ar_error').text('');
            $('#name_en_error').text('');
            $('#price_error').text('');
            $('#details_ar_error').text('');
            $('#details_en_error').text('');



            e.preventDefault();
            var formData = new FormData($('#offerForm')[0]);

            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: '{{route('ajax.offer.store')}}',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,

                success: function (data){

                    if(data.status == true)

                        $('#success_msg').show();

                       // alert(data.msg)


                },error: function (reject){
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors,function (key,val) {
                        $("#"+ key + "_error").text(val[0]);

                    });

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


