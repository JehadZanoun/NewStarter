
@extends('layouts.app')

@section('content')


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>   <link href="toastr.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">


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
                 <h3>تم الحذف بنجاح</h3>
        </div>





@if(app()->getLocale()=='ar')
    <table class="table" style="direction: rtl">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('messages.Name Offer')}}</th>
            <th scope="col">{{__('messages.Price Offer')}}</th>
            <th scope="col">{{__('messages.Details Offer')}}</th>
            <th scope="col">{{__('messages.offerPhoto')}}</th>
            <th scope="col">{{__('messages.operation')}}</th>

        </tr>
        </thead>
        <tbody>

        @foreach($viewOffer as $Offer)
            <tr class="offerRow{{$Offer->id}}">
                <th scope="row">{{$Offer->id}}</th>
                <td>{{$Offer->name}}</td>
                <td>{{$Offer->price}}</td>
                <td>{{$Offer->details}}</td>
                <td><img style="width: 65px ; height: 50px" src="{{asset('images/offers').'/'.$Offer->photo}}"></td>
                <td>
                    <a href="{{url('offers/edit/'.$Offer->id)}}" class="btn btn-success">{{__('messages.update')}}</a>
                    <a href="{{route('offers.delete',$Offer->id)}}" class="btn btn-danger">{{__('messages.delete')}}</a>
                    <a href="offer_id={{$Offer->id}}" class="delete_btn btn btn-danger">{{__('messages.deleteAjax')}}</a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <table class="table" style="direction: ltr">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('messages.Name Offer')}}</th>
            <th scope="col">{{__('messages.Price Offer')}}</th>
            <th scope="col">{{__('messages.Details Offer')}}
            <th scope="col">{{__('messages.offerPhoto')}}</th>
            <th scope="col">{{__('messages.operation')}}</th>


        </tr>
        </thead>
        <tbody>

        @foreach($viewOffer as $Offer)
            <tr class="offerRow{{$Offer->id}}">
                <th scope="row">{{$Offer->id}}</th>
                <td>{{$Offer->name}}</td>
                <td>{{$Offer->price}}</td>
                <td>{{$Offer->details}}</td>
                <td><img style="width: 65px ; height: 50px" src="{{asset('images/offers').'/'.$Offer->photo}}"></td>
                <td>
                    <a href="{{url('offers/edit/'.$Offer->id)}}" class="btn btn-success">{{__('messages.update')}}</a>
                    <a href="{{route('offers.delete',$Offer->id)}}" class="btn btn-danger">{{__('messages.delete')}}</a>
                    <a href="" offer_id="{{$Offer->id}}" class="delete_btn btn btn-danger">{{__('messages.deleteAjax')}}</a>
                    <a href="{{route('ajax.offer.edit', $Offer->id)}}" class="btn btn-success">تعديل</a>

                </td>



            </tr>
        @endforeach
        </tbody>
    </table>
@endif


@stop

@section('scripts')
    <script>
        $(document).on('click', '.delete_btn', function (e){
            e.preventDefault();
           var offer_id =  $(this).attr('offer_id');

            $.ajax({
                type: 'post',
                url: '{{route('ajax.offer.delete')}}',
                data: {
                    '_token': "{{csrf_token()}}",
                    id: offer_id,
                },
                success: function (data){

                    if(data.status == true){

                        // $('#success_msg').show();
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "1000",
                            "hideDuration": "1000",
                            "timeOut": "30000",
                            "extendedTimeOut": "60000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };
                        toastr.success('deleted');
                    }
                    $('.offerRow'+data.id).remove();

                },error: function (reject){

                }

            });

        });









    </script>
@stop
