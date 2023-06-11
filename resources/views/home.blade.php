@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Fitness Express Gym</h2>
    <div class="d-grid gap-2 col-6 mx-auto my-4">
        <a href="{{ url('member/create') }}" class="btn btn-success">ADD NEW MEMBER</a>
      </div>
      {{-- search --}}
      <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <form action="{{ url('/') }}" class="d-flex">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success me-2"  type="submit">Search</button>
            <a href="{{ url('/') }}" class="btn btn-outline-warning">Reset</a>
          </form>
        </div>
      </nav>
      {{-- search --}}

    <div class="table-responsive">
        <table class="table">
            <thead>
              <tr class="table-primary">
                <th scope="col">Id</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Details</th>
                <th scope="col">Payment</th>
                {{-- <th scope="col">Activity</th> --}}
              </tr>
            </thead>
            <tbody class="table-secondary">
              @foreach ($members as $member)
              <tr>
                <td>{{ $member->id }}</td>
                <td><img src="{{Storage::url($member->image) }}" alt="Image" width="40" style="border-radius: 50%"></td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->phone }}</td>
                <td>{{ $member->detail }}</td>

                <td>
                  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title mx-auto" id="exampleModalToggleLabel">Payment Details</h5>
                          <button type="button" class="btn-close position-absolute top-0 start-100 translate-middle" data-bs-dismiss="modal" aria-label="Close"></button>
                          
                        </div>
                        <div class="modal-body">
                          <form action="" method="post">
                            @csrf
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2">
              
                              <div class="col mb-3">
                                <input type="number" name="amount" id="amount" class="form-control" placeholder="Amount" aria-label="Amount">
                              </div>
                              <div class="col mb-3">
                                <label class="visually-hidden" for="autoSizingSelect">Reason</label>
                                <select class="form-select" name="type" id="type" id="autoSizingSelect">
                                  <option selected>Choose...</option>
                                  <option value="1">Admission</option>
                                  <option value="2">Monthly</option>
                                </select>
                              </div>
                              <div class="col mb-3">
                                <input type="number" name="member_id" id="member_id" class="form-control" placeholder="Member id" aria-label="Member id">
                              </div>
                              <div class="col mb-3">
                                <input type="date" name="date" id="date" class="form-control" placeholder="Date" aria-label="Date">
                              </div>
                              <div class="">
                                <input type="hidden" value="{{ $member->id }}" name="id" id="id" class="form-control" placeholder="Id" aria-label="Id">
                              </div>
                            </div>
                            <div class="d-grid gap-2 mb-1">
                              <button class="btn btn-outline-success" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Pay Now</button>
                            </div>
                          </form>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  
                  <a class="btn btn-warning" data-bs-toggle="modal" href="#exampleModalToggle" role="button">
                    <i class="fa-sharp fa-solid fa-bangladeshi-taka-sign"></i> Payment
                  </a>
                </td>

                <td>
                  <a href="{{ url('/member' , $member->id) }}"><button class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i> See</button></a>

                  <a href="{{ route('member.edit', $member->id) }}"><button class="btn btn-outline-info"><i class="fa-solid fa-user-pen"></i> Edit</button></a>

                  <form action="{{ route('member.destroy', $member->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <button onclick="return confirm('Are you sure?')" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection
