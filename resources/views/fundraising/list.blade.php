<x-layouts.app>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold text-left my-8">All Fundraising Events</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($events as $event)
                <div class="flex flex-col bg-white shadow-lg rounded">
                    <img class="w-full h-48 object-cover rounded-t"
                         src="{{ asset($event->img_src) }}"
                         loading="lazy"
                    >
                    <div class="p-4">
                        <h2 class="text-xl font-bold text-left my-2">
                            {{$event->header}}
                        </h2>
                        <p class="text-left mb-4 line-clamp-3">
                            {{$event->subheader}}
                        </p>
                        <a
                            href="{{ route('fundraising.showByFundId', ['fund_id' => $event->fund_id]) }}"
                            class="bg-fundy-primary hover:bg-fundy-hover-primary text-white font-bold py-2 px-4 rounded"
                        >
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.app>
