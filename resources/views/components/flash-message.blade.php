@if(session()->has('message'))
    <div class="fixed top-0 left-1/2 text-white px-6 py-3 -translate-x-1/2 transform bg-laravel">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif
