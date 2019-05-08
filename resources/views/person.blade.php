
<h1>Person Page</h1>

@foreach($results as $result)


    <p>{{$result->name}} : {{$result->email}}</p>

@endforeach