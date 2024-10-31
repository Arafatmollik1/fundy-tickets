<!-- Modal -->
<div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full"
     x-on:click.self="showModal = false">
    <!-- Modal content -->
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <!-- Close modal button -->
        <div class="flex justify-end">
            <button @click="showModal = false" type="button">&times;</button>
        </div>
        <!-- Modal header -->
        <h3 class="text-lg font-bold">Are you sure that you have paid?</h3>
        <!-- Modal body -->
        <p class="my-4">You will be sent an confirmation email after payment confirmed</p>
        <div class="w-full">

            <button type="submit"
                    class="w-full bg-fundy-primary hover:bg-fundy-hover-primary text-white font-bold py-2 px-4 rounded">
                I have paid the amount
            </button>
            <button
                type="button"
                @click="showModal = false"
                class="w-full bg-fundy-secondary hover:bg-fundy-hover-secondary text-white font-bold py-2 px-4 my-4 rounded"
            >
                No, I have not paid yet.
            </button>
        </div>
    </div>
</div>
