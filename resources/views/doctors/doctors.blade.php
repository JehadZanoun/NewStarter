
@extends('layouts.app')

@section('content')
    <div class="container">




        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 text-center">
                <h3>جدول الأطباء</h3>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">title</th>
                        <th scope="col">opration</th>

                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($doctors) && $doctors -> count() > 0)
                        @foreach($doctors as  $doctor)

                        <tr>
                        <th scope="row">{{$doctor->id}}</th>
                        <td>{{$doctor->name}}</td>
                        <td>{{$doctor->title}}</td>
                         <td><a href="{{route('doctors.services',$doctor->id)}}" class="btn btn-success">عرض الخدمات</a></td>

                        </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>


            </div>
        </div>
    </div>
@stop



