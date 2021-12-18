@extends('layouts.app')
@section('title',' Customers List')
@section('content')
<h3>Customer List <a href="{{ url("/customers/create") }}">Create</a></h3>
@if(Session::get('message') != null)
@component('alert', ['errors' => [],'status_class'=>'alert-success'])
    {{ Session::get('message') }}
@endcomponent
@endif
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Willing TO Work</th>
        <th>Languages</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @if(count($customers))
        @foreach($customers as $customer)
    <tr>
        <td>{{ $customer->full_name }}</td>
        <td>{{ $customer->age }}</td>
        <td>{{ $customer->gender }}</td>
        <td>{{ $customer->willing_to_work }}</td>
        <td>{{ $customer->languages }}</td>
        <td><a href="{{ url("/customers/edit/".$customer->id) }}">Edit</a><a href="{{ url('/customers/delete/'.$customer->id) }}" onclick="return confirm('Are you sure, want to delete')">Delete</a></td>
    </tr>
    @endforeach
        @else
        <tr>
            <td colspan="5">No Data Found</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection