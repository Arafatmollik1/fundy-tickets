<x-layouts.app>

    <div
        class="container flex flex-col md:rounded-2xl items-left justify-center bg-gradient-to-r from-green-400 to-blue-500 mx-auto px-4 h-28 sm:px-8">
        <p class="uppercase font-bold text-white text-center"> Welcome, {{ Auth::user()->name }} ! </p>
    </div>
</x-layouts.app>

