
@extends('layouts.app')

@section('content')
    <div class="container">




    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 text-center">
            <h3>جدول المستشفيات</h3>

            <table class="table">
                <thead>

                <tr>

                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">address</th>
                    <th scope="col">procedures</th>
                </tr>

                </thead>
                <tbody>

                @if(isset($hosbital) && $hosbital -> count() > 0)

                    @foreach($hosbital as $hosbitals)
                <tr>
                    <th scope="row">{{$hosbitals->id}}</th>
                    <td>{{$hosbitals->name}}</td>
                    <td>{{$hosbitals->address}}</td>
                    <td>
                        <a href="{{route('hospital.doctors',$hosbitals->id)}}" class="btn btn-success">عرض الأطباء</a>
                        <a href="{{route('hospital.delete',$hosbitals->id)}}" class="btn btn-danger">حذف</a>
                    </td>
                </tr>
                    @endforeach
                @endif
                </tbody>
            </table>


        </div>
    </div>
    </div>
@stop



