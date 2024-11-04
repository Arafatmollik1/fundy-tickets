<x-layouts.app>
    <x-gradient-hero text="Welcome, {{ Auth::user()->name }} !"/>

    <div class="container mx-auto my-4 p-2">
        <h1 class="text-2xl font-bold text-left my-8">
            New funding event
        </h1>
        <a href="{{ route('super.fund-event.index') }}"
           class="bg-fundy-primary hover:bg-fundy-hover-secondary text-white break-keep font-bold py-2 px-4 rounded">
            Create a new funding event
        </a>
        <h1 class="text-2xl font-bold text-left my-8">
            Add you payment Info
        </h1>
        <a href="{{ route('payment-recipient-info.create') }}"
           class="bg-fundy-primary hover:bg-fundy-hover-secondary    text-white font-bold py-2 px-4 rounded mt-4">
            Add your details
        </a>
    </div>

    <div class="w-full">
        <h1 class="container mx-auto my-4 text-2xl font-bold text-left">
            All funding events
        </h1>
        @foreach($allInfo as $info)
            <div class="container flex gap-2 my-4 mx-auto shadow max-h-44">
                <div class="w-1/4">
                    <img class="w-full h-full object-cover rounded-l"
                         src="{{asset($info->img_src) }}"
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
                    <p>Time: {{ \Carbon\Carbon::parse($info->event_date)->format('d-m-Y H:i') }}</p>
                    <p>Place: {{ $info->place_of_event }}</p>
                </div>

                <div x-data="{ input: '{{ route('fund.id.set', ['id'=>$info->fund_id]) }}', showMsg: false }" class="w-1/4 flex flex-col my-auto">
                    <a href="{{ route('super.event.show', $info->fund_id) }}"
                       class="bg-fundy-primary hover:bg-fundy-hover-secondary text-white break-keep font-bold py-2 px-4 rounded w-20 flex justify-center">
                        View
                    </a>
                    <a type="button" @click="navigator.clipboard.writeText(input), showMsg = true, setTimeout(() => showMsg = false, 1000)" class="cursor-copy">
                        <button id="clipboard" class="relative pl-1 py-4 cursor-copy text-xs font-medium">Copy Link</button>
                        <div x-show="showMsg" @click.away="showMsg = false" class="fixed bottom-3 right-3 z-20 max-w-sm overflow-hidden bg-green-100 border border-green-300 rounded" style="display: none;">
                            <p class="p-3 flex items-center justify-center text-green-600">Link Copied</p>
                        </div>
                    </a>
                </div>

    </div>
        @endforeach
    </div>
</x-layouts.app>

