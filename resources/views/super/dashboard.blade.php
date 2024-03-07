<x-layouts.app>

    <div
        class="container flex flex-col md:rounded-2xl items-left justify-center bg-gradient-to-r from-green-400 to-blue-500 mx-auto px-4 h-28 sm:px-8">
        <p class="uppercase font-bold text-white text-center"> Welcome, {{ Auth::user()->name }} ! </p>
    </div>
    @foreach($eventInfo as $info)
        <div class="container flex gap-2 my-4 mx-auto shadow">
            <div class="w-1/4">
                <img class="w-full h-full object-cover rounded-l"
                     src="{{$info->img_src}}"
                     alt="Image of {{ $info->header }}"
                     loading="lazy"
                >
            </div>
            <div class="w-2/4 flex flex-col justify-start items-start py-4">
                <h2 class="font-bold">{{ $info->header }}</h2>
                <p>Event id: {{ $info->fund_id }}</p>
                <p>Event time: {{ $info->event_date }}</p>
                <p>Event place: {{ $info->place_of_event }}</p>
            </div>
            <div class="w-1/4 my-auto">
                {{--<a href="{{ route('super.event.show', $info->id) }}"--}}
                <a href="#"
                   class="bg-fundy-primary hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    View
                </a>
            </div>

        </div>

    @endforeach
</x-layouts.app>

