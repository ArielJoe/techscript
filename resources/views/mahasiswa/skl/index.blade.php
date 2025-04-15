@extends('components.layout')

@section('title')
    SKL
@endsection

@section('content')
    <div class="lg:flex lg:items-center lg:justify-between mb-8 mx-3 md:mx-4 mt-2">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold text-gray-900 sm:truncate sm:text-3xl sm:pb-1 sm:tracking-tight">Surat Keterangan
                Lulus (SKL)</h2>
        </div>

        @if ($letter)
            <div id="toast-default"
                class="flex items-center w-full max-w-xs p-2 text-deep-teal bg-gray-50 rounded-lg shadow-sm mt-4 lg:mt-0"
                role="alert">
                <div
                    class="inline-flex items-center justify-center shrink-0 w-6 h-6 text-teal-cyan bg-light-cyan/50 rounded-lg">
                    <svg class="w-4 h-4 text-teal-cyan" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 3v4a1 1 0 0 1-1 1H5m4 8h6m-6-4h6m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                    </svg>
                    <span class="sr-only">File icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">Permohonan SKL telah diajukan</div>
                <button type="button"
                    class="cursor-pointer ms-auto -mx-1 -my-1 bg-gray-50 text-deep-teal/60 hover:text-deep-teal/80 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
                    data-dismiss-target="#toast-default" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @else
            <div class="mt-5 flex lg:mt-0 lg:ml-4">
                <span class="sm:ml-3">
                    <a href="{{ route('mahasiswa.skl.create') }}">
                        <button type="button"
                            class="cursor-pointer inline-flex items-center rounded-md bg-teal-cyan px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-teal-cyan/90 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
<<<<<<< HEAD
                            {{-- <x-eva-plus class="w-5 h-5 mr-2" /> --}}
                            <i class="bi bi-plus w-5 h-5 mr-2"></i>
=======
                            <x-eva-plus class="w-5 h-5 mr-2" />
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
                            Ajukan Surat
                            {{-- @include('mahasiswa.letter.skma') --}}
                        </button>
                    </a>
                </span>
            </div>
        @endif
    </div>

    @if ($letter)
        <div class="w-full max-w-sm mx-4 md:mx-4 bg-white border border-gray-200 rounded-lg shadow-sm">
<<<<<<< HEAD
            <div class="flex justify-end px-4 pt-4">
                <!-- Trigger button -->
                <button id="dropdownButton-{{ $letter->id }}" data-dropdown-toggle="dropdownMenu-{{ $letter->id }}"
                    class="cursor-pointer inline-block text-gray-500 rounded-lg text-sm p-1.5" type="button">
=======
            {{-- <div class="flex justify-end px-4 pt-4">
                <button id="dropdownButton" data-dropdown-toggle="dropdown"
                    class="inline-block text-gray-500 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg text-sm p-1.5"
                    type="button">
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
                    <span class="sr-only">Open dropdown</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 3">
                        <path
                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                </button>
<<<<<<< HEAD

                <!-- Dropdown menu -->
                <div id="dropdownMenu-{{ $letter->id }}"
                    class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                    <ul class="py-2" aria-labelledby="dropdownButton-{{ $letter->id }}">

                        <li>
                            <a href="{{ route('mahasiswa.skl.edit', $letter->id) }}"
                                class="cursor-pointer flex items-center gap-2 px-4 py-2 text-sm text-yellow-600 hover:bg-gray-100">
                                {{-- <x-tabler-edit class="w-5 h-5" /> --}}
                                <i class="bi bi-pencil-square w-5 h-5"></i>
                                Edit
                            </a>
                        </li>

                        @php
                            $encodedId = base64_encode($letter->id);
                        @endphp
                        <li>
                            <form id="delete-form-{{ $encodedId }}"
                                action="{{ route('mahasiswa.skl.destroy', ['skl' => urlencode($letter->id)]) }}"
                                method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete('{{ $encodedId }}')"
                                    class="cursor-pointer flex items-center gap-2 w-full px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    {{-- <x-css-trash class="w-5 h-5" /> --}}
                                    <i class="bi bi-trash w-5 h-5"></i>
                                    Hapus
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="flex flex-col items-center py-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                    src="https://i.pinimg.com/1200x/2c/47/d5/2c47d5dd5b532f83bb55c4cd6f5bd1ef.jpg" alt="" />
=======
                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                    <ul class="py-2" aria-labelledby="dropdownButton">
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Export
                                Data</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Delete</a>
                        </li>
                    </ul>
                </div>
            </div> --}}
            <div class="flex flex-col items-center py-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('orang.jpg') }}" alt="Bonnie image" />
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
                <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $letter->full_name }}</h5>
                <span class="text-sm text-gray-500">{{ $letter->nrp }}</span>
                <span class="text-sm text-gray-500">{{ $letter->major_name }}</span>
                <div class="flex flex-col mt-4 md:mt-6">
<<<<<<< HEAD
                    <button type="button" data-modal-target="mahasiswa-skl-modal-{{ $letter->id }}"
                        data-modal-toggle="mahasiswa-skl-modal-{{ $letter->id }}"
                        class="cursor-pointer inline-flex items-center px-4 py-2 my-1 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-400">
                        Detail Pengajuan
                    </button>
                    @include('mahasiswa.skl.show')
                    <a href="{{ $letter->status === 3 && $letter->file_path ? asset($letter->file_path) : '#' }}"
                        class="px-4 py-2 my-1 mt-2 text-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-300 
                        {{ $letter->file_path ? 'hover:bg-gray-100 hover:text-blue-700' : 'pointer-events-none opacity-30' }}"
                        target="_blank">
=======
                    <button type="button" data-modal-target="mahasiswa-skl-modal-{{ $letter->id }}" data-modal-toggle="mahasiswa-skl-modal-{{ $letter->id }}"
                        class="cursor-pointer inline-flex items-center px-4 py-2 my-1 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-400">
                        Detail pengajuan
                    </button>
                    @include('mahasiswa.skl.show')
                    <a href="{{ $letter->file_path ? asset($letter->file_path) : '#' }}"
                        class="px-4 py-2 my-1 mt-2 text-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-300 
                        {{ $letter->file_path ? 'hover:bg-gray-100 hover:text-blue-700' : 'pointer-events-none opacity-30' }}">
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
                        Download SKL
                    </a>
                </div>
            </div>
<<<<<<< HEAD
        @else
            <div class="flex items-center mx-3 md:mx-4 p-4 mb-4 text-sm text-deep-teal border border-teal-cyan/40 rounded-lg bg-light-cyan/20"
                role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Data tidak tersedia!</span>
                </div>
            </div>
=======
        </div>
    @else
        <div class="flex items-center mx-3 md:mx-4 p-4 mb-4 text-sm text-deep-teal border border-teal-cyan/40 rounded-lg bg-light-cyan/20"
            role="alert">
            <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Data tidak tersedia!</span>
            </div>
        </div>
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
    @endif
@endsection
