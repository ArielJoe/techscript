@extends('components.layout')

@section('title')
    SKL
@endsection

@section('content')
    <section>
        <div class="py-4 px-4 mx-auto max-w-2xl lg:py-4">
            <h1 class="mb-6 text-2xl text-center font-bold text-gray-900">Surat Keterangan Lulus</h1>

            <form action="{{ route('mahasiswa.skl.store') }}" method="POST">
                @csrf
                <div class="flex flex-col gap-4">
                    <div class="flex gap-2 w-full flex-col sm:flex-row">
                        <div class="w-full sm:w-[20%]">
                            <label class="block mb-2 text-sm font-medium text-gray-900">NRP</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                value="{{ $student->id }}" disabled>
                        </div>
                        <div class="w-full sm:w-[80%]">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                value="{{ $student->full_name }}" disabled>
                        </div>
                    </div>
                    <div class="flex gap-2 w-full flex-col sm:flex-row">
                        <div class="w-full sm:w-[20%]">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                value="{{ $student->status_text }}" disabled>
                        </div>
                        <div class="w-full sm:w-[80%]">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Program Studi</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                value="{{ $student->major }}" disabled>
                        </div>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tanggal Kelulusan</label>
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input id="datepicker" type="text" name="graduation_date"
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:outline-none focus:ring-teal-cyan focus:border-teal-cyan block w-full ps-10 p-2.5"
                                placeholder="Pilih tanggal..">
                            @error('graduation_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="flex">
                    <button type="submit"
                        class="cursor-pointer inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 mr-1 text-sm font-medium text-center text-white bg-teal-cyan rounded-lg hover:bg-teal-cyan/90">
                        Ajukan Surat
                    </button>
                    {{-- <a href="{{ route('mahasiswa.skma.index') }}"> --}}
                    <a href="{{ route('mahasiswa.skl.index') }}"
                        class="cursor-pointer inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 ml-1 text-sm font-medium text-center border border-gray-300 text-gray-900 rounded-lg hover:bg-gray-100">
                        Batalkan
                    </a>
                    {{-- </a> --}}
                </div>
            </form>
        </div>
    </section>
@endsection
