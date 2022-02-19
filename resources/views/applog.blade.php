@extends('layouts.layoutTable')

@include('inc.routes')

@section('layout_content')
<div class="row">
        <p class="display-6">Logs</p>
        
        <ul class="list-group list-group-flush m-3">
                @foreach ($activity as $activity)
                @if($activity->created_at >= \Carbon\Carbon::today())
                        <li class="list-group-item mt-3 mb-3">
                                {{ $activity->description }}
                                <h6 class="m-b-20">{{ $activity->created_at }}</h6>
                                <span>{{ $activity->causer_type }} : {{ $activity->causer_id }}</span>
                        </li>
                @endif
                @endforeach
        </ul>
</div>
@endsection