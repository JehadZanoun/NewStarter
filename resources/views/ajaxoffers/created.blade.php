
@extends('layouts.app')

@section('content')
    <div class="container">
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


            <form method="POST" action="{{route('offers.store')}}" enctype="multipart/form-data">
                @csrf
                {{--                        <input name="_token" value="{{csrf_token()}}">  ---> @csrf--}}

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">{{__('messages.photo')}}</label>
                    <input type="file" class="form-control" name="photo" value="{{('photo')}}">
                    <span class="text-danger">{{ $errors->first('photo') ?? '' }}</span>

                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">{{__('messages.Enter Offer AR')}}</label>
                    <input type="text" class="form-control" name="name_ar" value="{{ old('name') }}" placeholder="{{__('messages.Enter Offer AR')}}">
                    <span class="text-danger">{{ $errors->first('name_ar') ?? '' }}</span>

                    {{--                            @error('name')--}}
                    {{--                            <small class="form-text text-danger">{{($massages)}}</small>--}}
                    {{--                            @enderror--}}
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">{{__('messages.Enter Offer EN')}}</label>
                    <input type="text" class="form-control" name="name_en" placeholder="{{__('messages.Enter Offer EN')}}">
                    <span class="text-danger">{{ $errors->first('name_en') ?? '' }}</span>

                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">{{__('messages.Price Offer')}}</label>
                    <input type="text" class="form-control" name="price" placeholder="{{__('messages.Price Offer')}}">
                    <span class="text-danger">{{ $errors->first('price') ?? '' }}</span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">{{__('messages.Details Offer AR')}}</label>
                    <input type="text" class="form-control" name="details_ar"  placeholder="{{__('messages.Details Offer AR')}}">
                    <span class="text-danger">{{ $errors->first('details_ar') ?? '' }}</span>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">{{__('messages.Details Offer EN')}}</label>
                    <input type="text" class="form-control" name="details_en" placeholder="{{__('messages.Details Offer EN')}}">
                    <span class="text-danger">{{ $errors->first('details_en') ?? '' }}</span>
                </div>

                <button type="submit" class="btn btn-primary" >{{__('messages.Save Offer')}}</button>
            </form>

        </div>
    </div>
    </div>
@stop

@section('scripts')
    <script>
        $.ajax({
            type: 'post',
            url: '{{route('ajax.offer.store')}}',
            data: {

            },
            success: function (data){

            },error: function (reject){

            }

        });
    </script>
@stop

