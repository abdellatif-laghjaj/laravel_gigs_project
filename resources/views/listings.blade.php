<h2>{{ $heading }}</h2>

{{--@if(count($listings) === 0)--}}
{{--    <p>No listings found yet</p>--}}
{{--@endif--}}


@unless(count($listings) == 0)
    @foreach($listings as $listing)
        <h1>{{$listing['title']}}</h1>
        <p>{{$listing['author']}}</p>
    @endforeach
@else
    <p>No listings found</p>
@endunless
