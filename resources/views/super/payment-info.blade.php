<x-layouts.app>
    <x-gradient-hero text="Payments status"/>
    @foreach($paymentInfo as $info)
        <div
            class="container flex gap-2 my-4 p-4 mx-auto shadow border-l-8 border-l-{{$statusColorBG[$info->status] }}">
            <div class="w-3/4 flex flex-col gap-2 justify-start items-start py-4">
                <h2 class="font-bold">{{ $info->payers_name }}</h2>
                <p>
                    Email:
                    <span class="bg-gray-100 px-2 leading-4 font-medium rounded-2xl">
                        {{ $info->payers_email }}
                    </span>
                </p>
                <p>Phone: {{ $info->payers_phone }}</p>
                <p>
                    Ref No:
                    <span class="bg-gray-100 px-2 leading-4 font-medium rounded-2xl">
                        {{ $info->ref_no }}
                    </span>
                </p>
                <p>participant No: {{ $info->participant_no }}</p>
                <p>Amount paid: {{ $info->amount }}</p>
            </div>
            <div class="w-1/4 my-auto">
                <div class="flex w-1/4 justify-start md:justify-center items-center">
                    <div class="bg-{{ $statusColorBG[$info->status] }} rounded-3xl px-4 py-2">
                        {{$info->status}}
                    </div>
                </div>
            </div>

        </div>

    @endforeach
</x-layouts.app>

