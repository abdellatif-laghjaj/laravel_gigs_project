<h1>
    {{ $heading }}
    @foreach($listings as $listing)
        <h1>{{$listing['title']}}</h1>
        <p>{{$listing['author']}}</p>
    @endforeach
</h1>
