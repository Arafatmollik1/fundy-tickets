<x-layouts.app>
    <x-gradient-hero text="You payment details"/>

    <form action="{{ route('payment-recipient-info.store') }}" method="POST" class="container mx-auto m-4 space-y-4">
        @csrf
        <div>
            <label for="recipient_name" class="block font-bold">Recipient Name</label>
            <input type="text" name="recipient_name" id="recipient_name" required class="w-full p-2 border rounded"
                   value="{{ old('recipient_name', $paymentRecipientInfo->recipient_name ?? '') }}">
        </div>

        <div>
            <label for="recipient_bank_acc" class="block font-bold">Recipient Bank Account</label>
            <input type="text" name="recipient_bank_acc" id="recipient_bank_acc" required class="w-full p-2 border rounded"
                   value="{{ old('recipient_bank_acc', $paymentRecipientInfo->recipient_bank_acc ?? '') }}">
        </div>

        <div>
            <label for="recipient_mobilepay" class="block font-bold">Recipient MobilePay</label>
            <input type="text" name="recipient_mobilepay" id="recipient_mobilepay" class="w-full p-2 border rounded"
                   value="{{ old('recipient_mobilepay', $paymentRecipientInfo->recipient_mobilepay ?? '') }}">
        </div>

        <button type="submit" class="bg-fundy-primary hover:bg-fundy-hover-secondary text-white font-bold py-2 px-4 rounded">
            Submit
        </button>
    </form>
</x-layouts.app>
