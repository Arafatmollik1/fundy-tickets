<x-layouts.app>
    <div class="container mx-auto flex justify-center h-screen mt-10 mb-10">
        <div class="flex flex-col bg-transparent justify-evenly w-[300px] lg:w-full">

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="flex flex-col bg-white lg:flex-row shadow-lg rounded">
                <div class="lg:max-w-md">
                    <img class="w-full h-full object-cover rounded-t lg:rounded"
                         src="{{ asset($post_content->img_src) }}"
                         loading="lazy"
                    >
                </div>
                <div class="p-4 lg:max-w-md">
                    <h1 class="text-xl font-bold text-left my-4">
                        {{$post_content->header}}
                    </h1>
                    <p class="text-left mb-4">
                        {{$post_content->subheader}}
                    </p>
                    <div class="flex flex-col pb-6 gap-2">
                        <div
                            class="w-fit bg-gray-100 text-gray-800 text-xs font-medium me-2 p-2 rounded-full"
                        >
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                            Price: {{$post_content->ticket_price}}€
                        </div>
                        <div
                            class="w-fit bg-gray-100 text-gray-800 text-xs font-medium me-2 p-2 rounded-full"
                        >
                            <i class="fa fa-location-arrow" aria-hidden="true"></i>
                            Location: {{$post_content->place_of_event}}
                        </div>
                        <div
                            class="w-fit bg-gray-100 text-gray-800 text-xs font-medium me-2 p-2 rounded-full"
                        >
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            Date and time : {{\Carbon\Carbon::parse($post_content->event_date)->format('d-m-Y H:i') }}
                        </div>
                    </div>
                    <a
                        href="{{ route('tickets.showPayByFundId', ['fund_id' => session('fund_id')]) }}"
                        class="bg-fundy-primary hover:bg-fundy-hover-primary text-white font-bold py-2 px-4 rounded"
                    >
                        Book Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
