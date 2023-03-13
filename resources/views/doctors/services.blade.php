
@extends('layouts.app')

@section('content')
    <div class="container">




        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 text-center">
                <h3>جدول الخدمات</h3>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>

                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($services) && $services -> count() > 0)
                        @foreach($services as  $services)

                        <tr>
                        <th scope="row">{{$services->id}}</th>
                        <td>{{$services->name}}</td>

                        </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>


                <br><br>

                <form id="offerForm" method="POST" action="">
                    @csrf
                    {{--                        <input name="_token" value="{{csrf_token()}}">  ---> @csrf--}}


                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">اختر طبيب</label>
                        <input type="text" class="form-control" name="name_ar" value="{{ old('name') }}" placeholder="اختر طبيب">

                        <select class="form-control" name="doctor_id">

                                @foreach($doctors as $doctor)

                            <option value="{{$doctor->id}}">{{$doctor->name}}</option>


                                @endforeach
                        </select>


                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">اختر الخدمات</label>
                        <input type="text" class="form-control" name="name_ar" value="{{ old('name') }}" placeholder="اختر الخدمات">

                        <select class="form-control" name="servicesIds">

                                @foreach($allServices as $allService)
                            <option value="{{$allService->id}}">{{$allService->name}}</option>
                                @endforeach
                        </select>


                    </div>


                    <button id="save_offer" class="btn btn-primary">{{__('messages.Save Offer')}}</button>
                </form>



            </div>
        </div>
    </div>
@stop



