@foreach($instructors as $instructor)
    <a href="{{$instructor->id}}">{{ $instructor->name }}</a>
@endforeach
