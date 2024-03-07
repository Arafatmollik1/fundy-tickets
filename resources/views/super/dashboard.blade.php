<x-layouts.app>

    <x-gradient-hero text="Welcome, {{ Auth::user()->name }} !"/>
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
                <p>
                    ID:
                    <span class="bg-gray-100 px-2 leading-4 font-medium rounded-2xl">
                        {{ $info->fund_id }}
                    </span>
                </p>
                <p>Time: {{ $info->event_date }}</p>
                <p>Place: {{ $info->place_of_event }}</p>
            </div>
            <div class="w-1/4 my-auto">
                <a href="{{ route('super.event.show', $info->fund_id) }}"
                   class="bg-fundy-primary hover:bg-fundy-hover-secondary text-white break-keep font-bold py-2 px-4 rounded">
                    View
                </a>
            </div>

        </div>

    @endforeach
</x-layouts.app>

