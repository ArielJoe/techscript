@extends('components.layout')

@section('title')
    Admin
@endsection

@section('content')
    <div class="p-4">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
            <h2 class="text-2xl font-bold mb-6">Welcome to Your Dashboard</h2>
            <p class="text-gray-600">Hello, {{ Auth::guard('web')->user()->email }}!</p>
            <p class="text-gray-600">Your role is: {{ Auth::guard('web')->user()->role }}</p>

            <!-- Example Cards -->
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="flex items-center justify-center h-24 rounded-sm bg-[#001011]">

                </div>
                <div class="flex items-center justify-center h-24 rounded-sm bg-[#2FAAB1]">

                </div>
                <div class="flex items-center justify-center h-24 rounded-sm bg-[#BCE7E9]">

                </div>
<<<<<<< HEAD
            </div>
        </div>
        <table></table>
=======

            </div>
        </div>
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
    </div>
@endsection
