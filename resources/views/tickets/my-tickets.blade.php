<x-layouts.app>
    <div
        class="container flex flex-col md:rounded-2xl items-left justify-center bg-gradient-to-r from-green-400 to-blue-500 mx-auto px-4 h-28 sm:px-8"
    >
        <p class="text-2xl font-bold text-white">My Tickets</p>
    </div>
    @foreach($ticketInfo as $ticket)
        <div class="container mx-auto ">
            <div class="flex flex-col-reverse gap-2 md:flex-row bg-white lg:flex-row shadow-lg rounded-xl p-8 my-4">
                <div class="flex flex-col gap-1 md:w-3/4">
                    <p>Name: {{$ticket->ticket_user_name}}</p>
                    <p>Participants: {{$ticket->ticket_quantity}}</p>
                    <p>Event: {{$eventName}}</p>
                    <p class="line-clamp-1">
                        Payment ID:
                        <span class="bg-gray-100 p-1 rounded-3xl"> {{$ticket->ticket_payment_id}}</span>
                    </p>
                </div>
                <div class="flex w-1/4 justify-start md:justify-center items-center">
                    <div class="{{ $ticketStatusBG[$ticket->status] }} rounded-3xl px-4 py-2">
                        {{$ticket->status}}
                    </div>
                </div>
            </div>
        </div>

    @endforeach
</x-layouts.app>
