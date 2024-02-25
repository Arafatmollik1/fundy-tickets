<x-layouts.app>
    <div class="container mx-auto flex justify-center">
        <div class="flex flex-col bg-transparent w-[300px] lg:w-full h-auto mb-10">
            <h1 class="text-2xl font-bold text-left my-8">
                Pay for the tickets
            </h1>
            <form
                action="{{ route('tickets.payments.set' , ['fund_id' => $fund_id]) }}"
                method="POST"
                class="max-w-md"
            >
                @csrf
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="payers_name" id="floating_name"
                           class="block py-2.5 px-0 w-full text-sm text-fundy-text bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-fundy-primary peer"
                           placeholder=" " required/>
                    <label for="floating_name"
                           class="peer-focus:font-medium absolute text-sm text-fundy-text duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-fundy-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">
                        Your name
                    </label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="email" name="payers_email" id="floating_email"
                           class="block py-2.5 px-0 w-full text-sm text-fundy-text bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-fundy-primary peer"
                           placeholder=" " required/>
                    <label for="floating_email"
                           class="peer-focus:font-medium absolute text-sm text-fundy-text duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-fundy-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">
                        Your email
                    </label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="tel" name="payers_phone" id="floating_phone"
                           class="block py-2.5 px-0 w-full text-sm text-fundy-text bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-fundy-primary peer"
                           placeholder=" " required/>
                    <label for="floating_phone"
                           class="peer-focus:font-medium absolute text-sm text-fundy-text duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-fundy-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">
                        Your phone number
                    </label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" name="participants" id="floating_phone"
                           class="block py-2.5 px-0 w-full text-sm text-fundy-text bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-fundy-primary peer"
                           placeholder=" " required/>
                    <label for="floating_phone"
                           class="peer-focus:font-medium absolute text-sm text-fundy-text duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-fundy-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">
                        Participant number
                    </label>
                </div>
                <h1 class="text-2xl font-bold text-left my-4">
                    Send money to this account
                </h1>
                <div class="my-4">
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">
                        Reference number
                    </label>
                    <input type="text" id="first_name"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                           placeholder="E45JARAFATMOLLIK3695" readonly/>
                </div>
                <div class="my-4">
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">
                        Bank account number
                    </label>
                    <input type="text" id="first_name"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                           placeholder="FI31 2341 1223 1212 12" readonly/>
                </div>
                <div class="my-4">
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">
                        Name
                    </label>
                    <input type="text" id="first_name"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                           placeholder="Arafat Mollik" readonly/>
                </div>
                <div class="my-4">
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">
                        MobilePay phone number
                    </label>
                    <input type="text" id="first_name"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                           placeholder="+35878481515" readonly/>
                </div>
                <div class="my-4">
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">
                        Total amount
                    </label>
                    <input type="text" id="first_name"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                           readonly/>
                </div>
                <div x-data="{ showModal: false }">
                    <div class="flex flex-col lg:flex-row gap-2">
                        <!-- Button triggers modal -->
                        <button
                            type="button"
                            @click="showModal = true"
                            class="w-fit bg-fundy-primary hover:bg-fundy-hover-primary text-white font-bold py-2 px-4 rounded">
                            I have paid the amount
                        </button>
                        <a href="{{ route('tickets.showByFundId' , ['fund_id' => session('fund_id')]) }}"
                           class="w-fit bg-fundy-secondary hover:bg-fundy-hover-secondary text-white font-bold py-2 px-4 rounded">
                            <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                            Go back
                        </a>
                    </div>
                    <x-modals.payment-confirmation/>
                </div>
            </form>

        </div>
    </div>
</x-layouts.app>
