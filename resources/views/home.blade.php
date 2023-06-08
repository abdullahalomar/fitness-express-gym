@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Fitness Express Gym</h2>
    <div class="d-grid gap-2 col-6 mx-auto my-4">
        <a href="{{ url('/create') }}" class="btn btn-success">ADD NEW MEMBER</a>
      </div>
      {{-- search --}}
      <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <form action="{{ url('/') }}" class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
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
                <td><img src="/images/{{ $member->image }}" alt="Image" width="59px"></td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->phone }}</td>
                <td>{{ $member->detail }}</td>
                <td><i class="fa-sharp fa-solid fa-bangladeshi-taka-sign"></i>{{ $member->payment }}</td>

                <td>
                  <a href="{{ url('/show' , $member->id) }}"><button class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i> Show</button></a>
                  <a href=""><button class="btn btn-outline-info"><i class="fa-solid fa-user-pen"></i> Edit</button></a>
                  <a href=""><button class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i> Delete</button></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection
