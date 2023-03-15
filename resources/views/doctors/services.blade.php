
@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 text-center">
                <h3>{{$doctor->name}} : جدول الخدمات للطبيب  </h3>

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

                <form id="offerForm" method="POST" action="{{route('save.doctors.services')}}">
                    @csrf
                    {{--                        <input name="_token" value="{{csrf_token()}}">  ---> @csrf--}}


                    <div class="form-group">
                        <label for="exampleInputEmail1">اختر طبيب</label>
                        <select class="form-select" name="doctor_id">

                                @foreach($doctors as $doctor)

                            <option value="{{$doctor->id}}">{{$doctor->name}}</option>


                                @endforeach
                        </select>


                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">اختر الخدمات</label>

                        <select class="form-select" name="servicesIds[]" multiple>

                                @foreach($allServices as $allService)
                            <option value="{{$allService->id}}">{{$allService->name}}</option>
                                @endforeach
                        </select>


                    </div>


                    <button id="save_offer" class="btn btn-primary" style="margin-top: 30px">Save Service</button>
                </form>



            </div>
        </div>
    </div>
@stop



