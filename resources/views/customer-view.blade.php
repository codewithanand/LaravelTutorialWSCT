@extends('layouts.master')

@push('title')
    <title>View Customer</title>
@endpush

@section('main-section')
    <div class="container pt-2 pb-2">
        <div class="row mb-3">
            <form action="" method="get" class="col-9">
                <div class="form-group">
                    <input type="search" class="form-control" name="search" id="" value="{{ $search }}" placeholder="Search name or email address...">
                </div>
                <button type="submit" class="btn btn-warning">Search</button>
                <a href="{{ url('/customer/view') }}">
                    <button type="button" class="btn btn-danger">Reset</button>
                </a>
            </form>
            <div class="col-3">
                <a href="{{ route('customer.create') }}">
                    <button class="btn btn-primary float-right">Create</button>
                </a>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>S. No.</th>
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
                @php
                    $i=1;
                @endphp
                @foreach ($customers as $customer)
                    <tr>
                        <td scope="row">{{ $i }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        {{-- <td>{{get_formatted_date($customer->dob, "d-M-y")}}</td> --}}
                        <td>{{ $customer->dob }}</td>
                        <td>
                            @if ($customer->gender == 'M')
                                Male
                            @elseif ($customer->gender == 'F')
                                Female
                            @else
                                Other
                            @endif
                        </td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->city }}</td>
                        <td>{{ $customer->state }}</td>
                        <td>{{ $customer->country }}</td>
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
                            <a href="{{ route('customer.delete', ['id' => $customer->customer_id]) }}">
                                <button class="btn btn-danger">Trash</button>
                            </a>
                            <a href="{{ route('customer.edit', ['id' => $customer->customer_id]) }}">
                                <button class="btn btn-primary">Edit</button>
                            </a>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </tbody>
        </table>
        <div class="row">
            {{ $customers->links() }}
        </div>
    </div>
@endsection
