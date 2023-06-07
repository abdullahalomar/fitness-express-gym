@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Fitness Express Gym</h2>
    <div class="d-grid gap-2 col-6 mx-auto my-4">
        <button class="btn btn-success" type="button">ADD NEW MEMBER</button>
      </div>
    <div>
        <table class="table">
            <thead>
              <tr class="table-primary">
                <th scope="col">Id</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Details</th>
                <th scope="col">Payment</th>
              </tr>
            </thead>
            <tbody class="table-secondary">
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                
              </tr>
              <tr>
                <th scope="row">3</th>
               
              </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection
