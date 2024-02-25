<x-layouts.app>
    <div class="container mx-auto flex justify-center h-screen">
        <div class="w-[300px] flex justify-center">
            <form action="{{ route('fund.id.set') }}" method="GET"
                  class="flex flex-col items-center justify-center min-h-screen bg-fundy-gray-bg p-6">
                <div class="relative mb-8">
                    <input type="text" name="id" id="floatingFundID"
                           class="bg-transparent peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-fundy-primary"
                           placeholder="Enter fund id" required>
                    <label for="floatingFundID"
                           class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-fundy-primary peer-focus:text-sm"
                    >
                        Enter fund id
                    </label>
                </div>
                <button type="submit"
                        class="w-full bg-fundy-primary hover:bg-fundy-hover-primary text-white font-bold py-2 px-4 rounded">
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
```

