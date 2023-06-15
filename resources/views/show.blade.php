@extends('layouts.app')

@section('content')
    <div class="container">
      <h2 class="text-center mb-5">Member Details</h2>
      <div class="d-flex flex-wrap justify-content-evenly">
        <div class="order-1">
          <img src="{{ Storage::url($member->image) }}" class="img-fluid rounded img-thumbnail" width="250" alt="">
          <h4 class="my-3"><i class="fa-solid fa-id-badge"></i> ID: {{ $member->id }}</h4>
          <h5><i class="fa-solid fa-location-dot"></i> Address: {{ $member->detail }}</h5>
        </div>
        <div class="order-2">
          
          <div class="mt-4">
            <h5 class="mb-3"><i class="fa-solid fa-file-signature"></i> Name: {{ $member->name }}</h5>
          <h5 class="mb-3"><i class="fa-solid fa-phone"></i> Phone: {{ $member->phone }}</h5>

          @foreach ($member->payments as $payment) 
          <h5 class="mb-3"><i class="fa-solid fa-filter"></i> Reason: {{ $payment->type }}</h5>
          <h5 class="mb-3"><i class="fa-solid fa-calendar-days"></i> Date: {{ $payment->date->format('d M, Y')}}</h5>
          <h5 class=""><i class="fa-solid fa-bangladeshi-taka-sign"></i> Amount: <i class="fa-solid fa-bangladeshi-taka-sign"></i>{{ $payment->amount}}</h5>
          @endforeach
          </div>
        </div>
      </div>
    </div>
    
@endsection