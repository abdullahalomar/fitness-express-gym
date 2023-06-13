@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <div class="row px-3 py-3">
            <div class="col-12 col-md-4 col-lg-4">
                
            </div>
            <div class="col-12 col-md-4 col-lg-4">
                <img src="{{ Storage::url($member->image) }}" width="100" style="border-radius: 10%" alt="">
                <p>Id: {{ $member->id }}</p>
                <p>Name: {{ $member->name }}</p>
                <p>Phone: {{ $member->phone }}</p>
                <p>Detail: {{ $member->detail }}</p>
            </div>
            <div class="col-12 col-md-4 col-lg-4">

            </div>
        </div> --}}
        <div class="mb-3" style="max-width: 540px;">
            <div class="">
              <div></div>
              <div class="g-0">
                <div class="col-md-4">
                  <img src="{{ Storage::url($member->image) }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Name: {{ $member->name }}</h5>
                    <p class="card-text">Id: {{ $member->id }}</p>
                    <p class="card-text">Phone: {{ $member->phone }}</p>
                    <p class="card-text">Detail: {{ $member->detail }}</p>
   
                    @foreach ($member->payments as $payment) 
                      <p>Type: {{ $payment->type }}</p>
                      <p>Date: {{ $payment->date->format('d M, Y')}}</p>
                      <p>Amount: {{ $payment->amount}}</p>
                    @endforeach
                        
                  </div>
                </div>
              </div>
              <div></div>
            </div>
          </div>
        
    </div>
    
@endsection