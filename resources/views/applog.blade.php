@foreach ($activity as $activity)
        {{ $activity->description }}<br>
        {{ $activity->changes }}<br>
@endforeach