@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">Fitness Express Gym</h2>
        
        <div class="d-grid gap-2 my-4">
            <a href="{{ url('member/create') }}" class="btn btn-success">Add New Member</a>
          </div>
        {{-- search --}}
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <form action="{{ url('/') }}" class="d-flex">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success me-2" type="submit">Search</button>
                    <a href="{{ url('/') }}" class="btn btn-outline-warning"><i class="fa-solid fa-arrows-rotate"></i></a>
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
                            <td><img src="{{ Storage::url($member->image) }}" alt="Image" width="40"
                                    style="border-radius: 50%"></td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ $member->detail }}</td>

                            <td>


                                <a class="btn btn-warning payment" data-bs-toggle="modal" data-id="{{ $member->id }}"
                                    href="#exampleModalToggle" role="button">
                                    <i class="fa-sharp fa-solid fa-bangladeshi-taka-sign"></i> Payment
                                </a>

                                <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                                    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mx-auto" id="exampleModalToggleLabel">Payment Details
                                                </h5>
                                                <button type="button"
                                                    class="btn-close position-absolute top-0 start-100 translate-middle"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>

                                            </div>
                                            {{-- error message --}}
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            {{-- error message --}}
                                            <div class="modal-body">
                                                <form action="{{ route('payment.store', $member) }}" method="post">
                                                    @csrf
                                                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2">

                                                        <div class="col mb-3">
                                                            <input type="number" name="amount" id="amount"
                                                                class="form-control" placeholder="Amount"
                                                                aria-label="Amount">
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="visually-hidden"
                                                                for="autoSizingSelect">Reason</label>
                                                            <select class="form-select" name="type" id="type"
                                                                id="autoSizingSelect">
                                                                <option selected>Choose...</option>
                                                                <option value="Admission">Admission</option>
                                                                <option value="Monthly">Monthly</option>
                                                            </select>
                                                        </div>

                                                        <div class="col mb-3">
                                                            <input type="date" name="date" id="date"
                                                                class="form-control" placeholder="Date" aria-label="Date">
                                                        </div>
                    
                                                        <div class="">
                                                            <input hidden type="number" value="" name="member_id" id="member_id" class="form-control" placeholder="Member id" aria-label="Member id">
                                                        </div>
                                                    </div>
                                                    <div class="d-grid gap-2 mb-1">
                                                        <button class="btn btn-outline-success" type="submit"
                                                            data-bs-dismiss="modal">Pay Now</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <div>
                                        <a href="{{ url('/member', $member->id) }}"><button class="btn btn-outline-primary"><i
                                            class="fa-solid fa-eye"></i></button></a>
                                    </div>
    
                                    <div>
                                        <a href="{{ route('member.edit', $member->id) }}"><button class="btn btn-outline-info"><i
                                            class="fa-solid fa-user-pen"></i></button></a>
                                    </div>
    
                                    <div>
                                        <form action="{{ route('member.destroy', $member->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Are you sure?')" class="btn btn-outline-danger"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(".payment").click(function() {
               var newpayment= $('#member_id').val($(this).data('id'));
                $('#exampleModalToggle').modal('show');
            });
        });
    </script>
@endsection
