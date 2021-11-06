
@php
     $orders = DB::table('orders')->where('user_id', Auth::id())->orderBy('id', 'DESC')->limit(10)->get();
@endphp

@extends('layouts.app')

@section('content')

<div class="contact_form">
  <div class="container">
    <div class="row">
      <div class="col-8 card">
        <table class="table table-response">
          <thead>
            <tr>
              <th scope="col">Payment Type</th>
              <th scope="col">Payment ID</th>
              <th scope="col">Amount</th>
              <th scope="col">Date</th>
              <th scope="col">Status Code</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($orders as $order)
            <tr>
              <td scope="col">{{$order->payment_type}}</td>
              <td scope="col">{{$order->payment_id}}</td>
              <td scope="col">${{$order->total}}</td>
              <td scope="col">{{$order->date}}</td>
              <td scope="col">{{$order->status_code}}</td>
              <td scope="col">
              <a href="" class="btn btn-sm btn-primary">view</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-4">
        <div class="card">
          <img src="{{ asset('public/frontend/images/kaziariyan.png') }}" class="card-img-top" style="height: 90px; width:90px; margin-left:34%; margin-top:5px; border-radius:50%">
          <div class="card-body">
            <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="{{ route('password.change') }}">Change Password</a></li>
            <li class="list-group-item">line one</li>
            <li class="list-group-item">line one</li>
          </ul>
          <div class="card-body">
            <a href="{{ route('user.logout') }} " class="btn btn-danger btn-sm btn-block">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection