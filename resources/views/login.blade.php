<x-layouts.app>
    <div class="container mx-auto flex justify-center h-screen">
        <div class="flex flex-col justify-center w-[300px]">
            <div class="flex flex-row justify-center mb-10">
                <div class="text-center">
                    <div class="flex items-end justify-center my-2">
                        <img src="{{ asset('fundy-logo.svg') }}" alt="Fundy Logo" class="img-fluid">
                        <h2 class="text-2xl"> Fundy </h2>
                    </div>
                    <span>Get Funded!</span>
                </div>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-full">
                    <div id="gSignInWrapper">
                        <div id="customBtn"
                             class="inline-block bg-fundy-main text-fundy-text text-center align-middle w-full rounded border border-fundy-primary shadow-md whitespace-nowrap">
                            <img src="{{asset('google_icon.svg')}}" alt="Google Sign-in"
                                 class="inline-block align-middle w-10 h-10 mr-2">
                            <a href="{{ route('login.google') }}" class="align-middle no-underline hover:no-underline">
                                Sign in with Google
                            </a>
                        </div>

                    </div>
                    <div id="name"></div>
                </div>
                <div class="flex items-center justify-center my-4 w-full">
                    <div class="flex-grow border-t border-gray-300"></div>
                    <span class="flex-shrink mx-4 text-gray-600">OR</span>
                    <div class="flex-grow border-t border-gray-300"></div>
                </div>

                <div class="w-full">
                    <form action="login/processLoginWithEmail" method="POST" id="loginForm" class="py-4 space-y-4">
                        <div class="relative mb-8">
                            <input type="text" name="name" id="floatingName"
                                   class="bg-transparent peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-fundy-primary"
                                   placeholder="Name" required>
                            <label for="floatingName"
                                   class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-fundy-primary peer-focus:text-sm"
                            >
                                Name
                            </label>
                        </div>
                        <div class="relative">
                            <input type="email" name="email" id="floatingEmail"
                                   class="bg-transparent peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-fundy-primary"
                                   placeholder="name@example.com" required>
                            <label for="floatingEmail"
                                   class="absolute left-0 -top-3.5 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-fundy-primary peer-focus:text-sm"
                            >
                                Email
                            </label>
                        </div>
                        <button
                            class="w-full bg-fundy-primary hover:bg-fundy-hover-primary text-white font-bold py-2 px-4 rounded"
                            type="submit"
                        >
                            Sign In
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
