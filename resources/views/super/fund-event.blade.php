<x-layouts.app>
    <x-gradient-hero text="Create Event"/>
    <form action="{{ route('super.fund-event.store') }}" method="POST" class="container mx-auto my-4 p-2" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="header" class="block text-gray-700 text-sm font-bold mb-2">Header:</label>
            <input type="text" name="header" id="header" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="sub_header" class="block text-gray-700 text-sm font-bold mb-2">Subheader:</label>
            <textarea name="sub_header" id="sub_header" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
        </div>
        <div class="mb-4">
            <label for="event_date" class="block text-gray-700 text-sm font-bold mb-2">Event Date:</label>
            <input type="datetime-local" name="event_date" id="event_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="event_price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
            <input type="number" name="event_price" id="event_price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="place_of_event" class="block text-gray-700 text-sm font-bold mb-2">Place of Event:</label>
            <input type="text" name="place_of_event" id="place_of_event" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="img_src" class="block text-gray-700 text-sm font-bold mb-2">Image Source:</label>
            <input type="file" name="img_src" id="img_src" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-fundy-primary hover:bg-fundy-hover-secondary text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Create Event
            </button>
        </div>
    </form>
</x-layouts.app>
