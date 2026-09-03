@extends('layouts.app')

@section('content')

<h3 class="mb-4 fw-bold">
    Inspirasi Hari Ini
</h3>

<div class="row">

    @foreach($pins as $pin)

    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

        <div class="card border-0 shadow-sm">

            @if($pin->media_type == 'image')
                <img src="{{ asset('storage/' . $pin->media) }}" class="card-img-top">
            @else
                <video controls class="card-img-top">
                    <source src="{{ asset('storage/' . $pin->media) }}">
                </video>
            @endif

            <div class="card-body">

                <h5>{{ $pin->title }}</h5>

                <p class="text-muted">
                    {{ $pin->description }}
                </p>

                <small class="text-secondary">
                    {{ $pin->user->name }}
                </small>

            </div>

        </div>

    </div>

    @endforeach

</div>

@endsection