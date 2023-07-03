@extends('layouts.master')

@push('title')
<title>Trash</title>
@endpush

@section('main-section')
<div class="container pt-2 pb-2">
    <a href="{{route('customer.create')}}">
        <button class="btn btn-primary float-right">Create</button>
    </a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td scope="row">{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                {{-- <td>{{get_formatted_date($customer->dob, "d-M-y")}}</td> --}}
                <td>{{$customer->dob}}</td>
                <td>
                    @if ($customer->gender == "M")
                    Male
                    @elseif ($customer->gender == "F")
                    Female
                    @else
                    Other
                    @endif
                </td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->city}}</td>
                <td>{{$customer->state}}</td>
                <td>{{$customer->country}}</td>
                <td>
                    @if ($customer->status == 1)
                    <a href="">
                        <span class="badge badge-success">Active</span>
                    </a>
                    @else
                    <a href="">
                        <span class="badge badge-danger">Inactive</span>
                    </a>
                    @endif
                </td>
                <td>
                    {{-- <a href="{{url('/customer/delete')}}/{{$customer->customer_id}}">
                        <button class="btn btn-danger">Delete</button>
                    </a> --}}
                    <a href="{{route('customer.forceDelete', ['id' => $customer->customer_id])}}">
                        <button class="btn btn-danger">Delete</button>
                    </a>
                    <a href="{{route('customer.restore', ['id' => $customer->customer_id])}}">
                        <button class="btn btn-primary">Restore</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection