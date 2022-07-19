@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
         class="fixed top-0 left-1/2 text-white px-6 py-3 -translate-x-1/2 transform bg-green-500">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif
