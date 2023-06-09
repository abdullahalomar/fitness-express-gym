@extends('layouts.app')

@section('content')
    <div class="container card">
        <div class="px-3 py-3">
            <div class="col-md-6 col-lg-6">
                <img src="{{ Storage::url($member->image) }}" width="60" alt="">
            </div>
            <div class="col-md-6 col-lg-6">
                <p>Id: {{ $member->id }}</p>
                <p>Name: {{ $member->name }}</p>
                <p>Phone: {{ $member->phone }}</p>
                <p>Detail: {{ $member->detail }}</p>
            </div>
        </div>
    </div>
@endsection