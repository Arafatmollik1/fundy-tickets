<x-layouts.app>
    <x-gradient-hero text="Event Info"/>
    <div class="container flex flex-col gap-5 my-4 p-4 mx-auto shadow lg:flex-row">
        <div class="w-3/4 flex flex-col justify-start items-start ">
            <h2 class="font-bold">{{ $eventInfo->header }}</h2>
            <p>
                ID:
                <span class="bg-gray-100 px-2 leading-4 font-medium rounded-2xl">
                        {{ $eventInfo->fund_id }}
                    </span>
        </div>
        <div class="w-1/4 my-auto">
            <a href="{{ route('super.event.payments', $eventInfo->fund_id) }}"
               class="bg-fundy-primary text-nowrap hover:bg-fundy-hover-secondary text-white font-bold py-2 px-4 rounded">
                View Payments
            </a>
        </div>

    </div>
</x-layouts.app>

