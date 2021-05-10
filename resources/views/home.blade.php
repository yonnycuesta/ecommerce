
@php
      $users = DB::table('users')->get();    
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
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Phone</th>
              <th scope="col">Email</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($users as $use)
            <tr>
              <td scope="col"></td>
              <td scope="col">{{$use->name}}</td>
              <td scope="col">{{$use->phone}}</td>
              <td scope="col">{{$use->email}}</td>
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