@extends('layouts.app')

@section('content')
    <div class="container card border-0 shadow-lg">
        <h2 class="text-center my-4"><i class="fa-solid fa-user-pen"></i> Edit Member Details</h2>

            {{-- error message --}}
      {{-- @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif --}}
        {{-- error message --}}
        
        <form action="{{ route('member.update', $member->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                  <label for="exampleInputName" class="form-label">Name</label>
                  <input type="text" value="{{ $member->name }}" name="name" id="name" class="form-control" placeholder="Name" >
                </div>

                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <label for="exampleInputPhone" class="form-label">Phone</label>
                  <input type="number" value="{{ $member->phone }}" name="phone" id="phone" class="form-control" placeholder="Phone">
                </div>

                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <label for="exampleInputImage" class="form-label">Upload Image</label>
                  <input type="file" value="{{ $member->image }}" name="image" id="image" class="form-control">
                </div>
                
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <label for="exampleInputPayment" class="form-label">Payment</label>
                  <input type="number" value="{{ $member->payment }}" name="payment" id="payment" class="form-control" placeholder="Payment">
                </div>

                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <label for="exampleInputDetail" class="form-label">Address</label>
                  <textarea class="form-control" name="detail" id="detail" id="exampleFormControlTextarea1" rows="3">{{ $member->detail }}</textarea>
                </div>
              </div>
              
              <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary mb-3" type="submit">Save</button>
              </div>
            
          </form>
    </div>
@endsection