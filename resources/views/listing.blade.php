@extends('layout')

@section('content')
<h1>{{$listing['title']}}</h1>
<p>{{$listing['description']}}</p>
<p>{{$listing['website']}}</p>
<p>{{$listing['email']}}</p>
<p>{{$listing['tags']}}</p>
@endsection
