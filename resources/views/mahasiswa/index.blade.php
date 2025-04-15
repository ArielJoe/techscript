@extends('components.layout')

@section('title')
    Mahasiswa
@endsection

@section('content')
    <div class="p-4">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
            <h2 class="text-2xl font-bold mb-6">Welcome to Your Dashboard</h2>
            <p class="text-gray-600">Hello, {{ Auth::user()->email }}!</p>
            <p class="text-gray-600">Your role is: {{ Auth::user()->role }}</p>

            <!-- Example Cards -->
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="flex items-center justify-center h-24 rounded-sm bg-[#001011]">

                </div>
                <div class="flex items-center justify-center h-24 rounded-sm bg-[#2FAAB1]">

                </div>
                <div class="flex items-center justify-center h-24 rounded-sm bg-[#BCE7E9]">

                </div>
            </div>
        </div>
    </div>


<<<<<<< HEAD
    {{-- <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
=======
    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
        <div class="flex justify-end px-4 pt-4">
            <button id="dropdownButton" data-dropdown-toggle="dropdown"
                class="inline-block text-gray-500 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg text-sm p-1.5"
                type="button">
                <span class="sr-only">Open dropdown</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 16 3">
                    <path
                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdown"
                class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                <ul class="py-2" aria-labelledby="dropdownButton">
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Export Data</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Delete</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex flex-col items-center pb-10">
            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="/docs/images/people/profile-picture-3.jpg"
                alt="Bonnie image" />
            <h5 class="mb-1 text-xl font-medium text-gray-900">Bonnie Green</h5>
            <span class="text-sm text-gray-500">Visual Designer</span>
            <div class="flex mt-4 md:mt-6">
                <a href="#"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Add
                    friend</a>
                <a href="#"
                    class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Message</a>
            </div>
        </div>
<<<<<<< HEAD
    </div> --}}
@endsection
=======
    </div>
@endsection
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
