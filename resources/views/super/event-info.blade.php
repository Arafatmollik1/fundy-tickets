<x-layouts.app>
    <x-gradient-hero text="Event Info"/>
    <div class="container flex flex-col gap-5 my-4 p-4 mx-auto shadow lg:flex-row lg:justify-between">
        <div class=" flex flex-col justify-start items-start ">
            <h2 class="font-bold">{{ $eventInfo->header }}</h2>
            <p>
                ID:
                <span class="bg-gray-100 px-2 leading-4 font-medium rounded-2xl">
                        {{ $eventInfo->fund_id }}
                </span>
            </p>
            <p>
                Sub Header:
                <span class="px-2 leading-4 font-medium">
                        {{ $eventInfo->subheader }}
                </span>
            </p>
            <p>
                Time:
                <span class="px-2 leading-4 font-medium">
                        {{ \Carbon\Carbon::parse($eventInfo->event_date)->format('d-m-Y H:i') }}
                </span>
            </p>
            <p>
                Place:
                <span class="px-2 leading-4 font-medium">
                        {{ $eventInfo->place_of_event }}
                </span>
            </p>
            <p>
                Price:
                <span class="px-2 leading-4 font-medium">
                        {{ $eventInfo->ticket_price }}€
                </span>
            </p>
        </div>
        <div class="my-auto">
            <a href="{{ route('super.event.payments', $eventInfo->fund_id) }}"
               class="bg-fundy-primary text-nowrap hover:bg-fundy-hover-secondary text-white font-bold py-2 px-4 rounded mx-4">
                View Payments
            </a>
            <form id="delete-form" action="{{ route('super.event.remove', $eventInfo->fund_id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="button" onclick="confirmDeletion()" class="text-nowrap text-fundy-danger font-bold py-2 px-4 rounded mx-4">
                    Delete
                </button>
            </form>
            <script>
                function confirmDeletion() {
                    if (confirm('Are you sure you want to delete this event?')) {
                        document.getElementById('delete-form').submit();
                    }
                }
            </script>
        </div>

    </div>
</x-layouts.app>

