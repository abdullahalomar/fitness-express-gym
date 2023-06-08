@extends('layouts.app')

@section('content')
    <div class="container card">
        <h2 class="text-center mb-4"><i class="fa-solid fa-user-plus"></i> Add New Member</h2>
        <form action="{{ url('/') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                  <label for="exampleInputName" class="form-label">Name</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Name" >
                </div>

                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <label for="exampleInputPhone" class="form-label">Phone</label>
                  <input type="number" name="phone" id="phone" class="form-control" placeholder="Phone">
                </div>

                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <label for="exampleInputImage" class="form-label">Upload Image</label>
                  <input type="file" name="image" id="image" class="form-control">
                </div>
                
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <label for="exampleInputPayment" class="form-label">Payment</label>
                  <input type="number" name="payment" id="payment" class="form-control" placeholder="Payment">
                </div>

                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <label for="exampleInputDetail" class="form-label">Address</label>
                  <textarea class="form-control" name="detail" id="detail" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
              </div>

            <button type="submit" class="btn btn-primary mb-3">Submit</button>
          </form>
    </div>
@endsection