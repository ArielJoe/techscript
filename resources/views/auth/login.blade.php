<x-layout title="Login">
    <section class="bg-gray-100">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg"
                    alt="logo">
                TechScript
            </a>
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Login
                    </h1>
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}" class="space-y-4 md:space-y-6">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" name="email" id="email"
                                class="border border-[#9dd6d7] text-gray-900 rounded-lg shadow-sm focus:outline-none focus:ring-[#38AAAE] focus:border-[#38AAAE] block w-full p-2.5"
                                value="{{ old('email') }}" required="" maxlength="100" autocomplete="off">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password"
                                class="border border-[#9dd6d7] text-gray-900 rounded-lg shadow-sm focus:outline-none focus:ring-[#38AAAE] focus:border-[#38AAAE] block w-full p-2.5"
                                required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300"
                                        required="">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500">Remember me</label>
                                </div>
                            </div>
                            <a href="#" class="text-sm font-medium text-primary-600 hover:underline">Forgot
                                password?</a>
                        </div>
                        <button type="submit" class="w-full text-white bg-[#2FAAB1] hover:bg-[#2FAAB1]/90 focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-[#2FAAB1] font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Login
                        </button>
                        {{-- <p class="text-sm font-light text-gray-500">
                            Don't have an account yet? <a href="#"
                                class="font-medium text-primary-600 hover:underline">Sign up</a>
                        </p> --}}
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
