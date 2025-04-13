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
                            <x-eva-plus class="w-5 h-5 mr-2" />
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
            <div class="flex justify-end px-4 pt-4">
                <!-- Trigger button -->
                <button id="dropdownButton-{{ $letter->id }}" data-dropdown-toggle="dropdownMenu-{{ $letter->id }}"
                    class="cursor-pointer inline-block text-gray-500 rounded-lg text-sm p-1.5" type="button">
                    <span class="sr-only">Open dropdown</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 3">
                        <path
                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownMenu-{{ $letter->id }}"
                    class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                    <ul class="py-2" aria-labelledby="dropdownButton-{{ $letter->id }}">

                        <li>
                            <a href="{{ route('mahasiswa.skl.edit', $letter->id) }}"
                                class="cursor-pointer flex items-center gap-2 px-4 py-2 text-sm text-yellow-600 hover:bg-gray-100">
                                <x-tabler-edit class="w-4 h-4" />
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
                                    <x-css-trash class="w-4 h-4" />
                                    Hapus
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="flex flex-col items-center py-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                    src="data:image/jpeg;base64,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"
                    alt="" />
                <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $letter->full_name }}</h5>
                <span class="text-sm text-gray-500">{{ $letter->nrp }}</span>
                <span class="text-sm text-gray-500">{{ $letter->major_name }}</span>
                <div class="flex flex-col mt-4 md:mt-6">
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
                        Download SKL
                    </a>
                </div>
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
    @endif
@endsection
