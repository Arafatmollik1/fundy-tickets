@auth()
    <nav class="flex justify-center gap-4  px-8 md:px-8 py-4 bg-transparent text-right">
        <div class="container flex justify-between ">
            <a
                href="{{ route('tickets.showByFundId', ['fund_id' => session('fund_id')])}}"
                class="flex justify-center items-start gap-2">
                <img src="{{ asset('fundy-logo.svg') }}" width="12px" alt="Fundy Logo" class="img-fluid">
                <span class="font-bold text-fundy-primary">Fundy</span>
            </a>

            <div class="flex align-middle gap-2">
                <a href="{{ route('tickets.showMyTickets')  }}"
                   class="nav-item nav-link active inline-flex items-center text-lg text-gray-700 hover:text-gray-900 focus:text-gray-900"
                >
                    <i class="fa-solid fa-clipboard-list mx-1 text-sm"></i>
                    My Tickets
                </a>
                <a href="{{ route('logout') }}"
                   class="nav-item nav-link active inline-flex items-center text-lg text-gray-700 hover:text-gray-900 focus:text-gray-900">
                    <svg class="w-4 h-4 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    logout
                </a>
            </div>
        </div>

    </nav>

@endauth
