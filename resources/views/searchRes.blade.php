@extends('layout.app')


@section('site-title', 'Home')

@section('content')
    
    <div class="container">
        {{-- @if ($result == array())
            @foreach ($result as $item)
                <h1>{{$item->title}}</h1>
            @endforeach
        @else
            <h1>No data found</h1>
        @endif --}}

        @foreach ($result as $item)
            <h1>{{$item->title}}</h1>
        @endforeach
    </div>

@endsection