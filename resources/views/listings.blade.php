<h2>{{ $heading }}</h2>

{{--@if(count($listings) === 0)--}}
{{--    <p>No listings found yet</p>--}}
{{--@endif--}}


@unless(count($listings) == 0)
    @foreach($listings as $listing)
        <h1>
            <a href="/listing/{{$listing['id']}}">{{$listing['title']}}</a>
        </h1>
        <p>{{$listing['description']}}</p>
    @endforeach
@else
    <p>No listings found</p>
@endunless
