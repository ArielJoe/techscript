@extends('components.layout')

@section('title')
    LHS
@endsection

@section('content')
    <section>
        <div class="py-4 px-4 mx-auto max-w-2xl lg:py-4">
            <h1 class="mb-6 text-2xl text-center font-bold text-gray-900">Laporan Hasil Studi</h1>
            <form action="{{ route('mahasiswa.lhs.store') }}" method="POST">
                @csrf
                <div class="flex flex-col gap-4">
                    <div class="flex gap-2 w-full flex-col sm:flex-row">
                        <div class="w-full sm:w-[20%]">
                            <label class="block mb-2 text-sm font-medium text-gray-900">NRP</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                value="{{ $students[0]->student_id }}" disabled>
                        </div>
                        <div class="w-full sm:w-[80%]">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                value="{{ $students[0]->full_name }}" disabled>
                        </div>
                    </div>
                    <div class="flex gap-2 w-full flex-col sm:flex-row">
                        <div class="w-full sm:w-[20%]">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Periode</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                value="{{ $students[0]->period }}" disabled>
                        </div>
                        <div class="w-full sm:w-[80%]">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Program Studi</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                value="{{ $students[0]->program_studi }}" disabled>
                        </div>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Keperluan Pembuatan</label>
                        <textarea name="purpose"
                            class="bg-gray-50 border min-h-25 max-h-25 text-gray-900 text-sm rounded-lg focus:outline-none focus:ring-teal-cyan focus:border-teal-cyan block w-full p-2.5 @error('purpose') border-red-500 @enderror"
                            placeholder=""></textarea>
                        @error('purpose')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex">
<<<<<<< HEAD
                    <button type="submit"
                        class="cursor-pointer inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 mr-1 text-sm font-medium text-center text-white bg-teal-cyan rounded-lg hover:bg-teal-cyan/90">
                        Ajukan Surat
                    </button>
                    {{-- <a href="{{ route('mahasiswa.skma.index') }}"> --}}
                    <a href="{{ route('mahasiswa.lhs.index') }}"
                        class="cursor-pointer inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 ml-1 text-sm font-medium text-center border border-gray-300 text-gray-900 rounded-lg hover:bg-gray-100">
                        Batalkan
                    </a>
=======
                    <button type="submit" class="cursor-pointer inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 mr-1 text-sm font-medium text-center text-white bg-teal-cyan rounded-lg hover:bg-teal-cyan/90">
                        Ajukan Surat
                    </button>
                    {{-- <a href="{{ route('mahasiswa.skma.index') }}"> --}}
                        <a href="{{ route('mahasiswa.lhs.index') }}" class="cursor-pointer inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 ml-1 text-sm font-medium text-center border border-gray-300 text-gray-900 rounded-lg hover:bg-gray-100">
                            Batalkan
                        </a>
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
                    {{-- </a> --}}
                </div>
            </form>
        </div>
    </section>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
