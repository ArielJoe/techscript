@extends('components.layout')

@section('title')
    Kaprodi
@endsection

@section('content')
    <div class="lg:flex lg:items-center lg:justify-between mb-8 mx-3 md:mx-4 mt-2">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold text-gray-900 sm:truncate sm:text-3xl sm:pb-1 sm:tracking-tight">
                Kaprodi
            </h2>
        </div>
        <div class="mt-5 flex lg:mt-0 lg:ml-4">
            <span class="sm:ml-3">
                <a href="{{ route('admin.kaprodi.create') }}">
                    <button type="button"
                        class="cursor-pointer inline-flex items-center rounded-md bg-teal-cyan px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-teal-cyan/90 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        {{-- <x-eva-plus class="w-5 h-5 mr-2" /> --}}
                        <i class="bi bi-plus w-5 h-5 mr-2"></i>
                        Tambah Kaprodi
                    </button>
                </a>
            </span>
        </div>
    </div>

    @if ($kaprodis->isEmpty())
        <div class="flex items-center mx-3 md:mx-4.5 p-4 mb-4 text-sm text-deep-teal border border-teal-cyan/40 rounded-lg bg-light-cyan/20"
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
    @else
        <section class="p-3 sm:p-5">
            <div class="mx-auto max-w-screen-xl">
                <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-64">
                            <form method="GET" action="{{ route('admin.kaprodi.index') }}" class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <button type="submit"
                                        class="cursor-pointer absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-auto">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2"
                                        placeholder="Cari ID atau nama kaprodi..">
                                    @if (request('search'))
                                        <a href="{{ route('admin.kaprodi.index') }}"
                                            class="absolute inset-y-0 right-0 flex items-center pr-3">
                                            <svg class="w-6 h-6 text-gray-600 rotate-45" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M5 12h14m-7 7V5" />
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-600">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-3">No.</th>
                                    <th scope="col" class="px-4 py-3">ID</th>
                                    <th scope="col" class="px-4 py-3">Nama Lengkap</th>
                                    <th scope="col" class="px-4 py-3">Email</th>
                                    <th scope="col" class="px-4 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kaprodis as $kaprodi)
                                    <tr class="border-b border-gray-200">
                                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-3">{{ $kaprodi->id }}</td>
                                        <td class="px-4 py-3">{{ $kaprodi->full_name }}</td>
                                        <td class="px-4 py-3">{{ $kaprodi->email }}</td>
                                        <td class="px-4 py-3">
                                            <div class="flex gap-2">
                                                <button data-modal-target="admin-kaprodi-modal-{{ $kaprodi->id }}"
                                                    data-modal-toggle="admin-kaprodi-modal-{{ $kaprodi->id }}"
                                                    type="button"
                                                    class="cursor-pointer block px-2.5 py-1.5 text-xs font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-600"
                                                    target="_blank">
                                                    {{-- <x-eva-info class="w-5 h-5" /> --}}
                                                    <i class="bi bi-info-circle w-5 h-5"></i>
                                                </button>
                                                <a href="{{ route('admin.kaprodi.edit', $kaprodi->id) }}">
                                                    <button type="button"
                                                        class="cursor-pointer block px-2.5 py-1.5 text-xs font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600">
                                                        {{-- <x-tabler-edit class="w-5 h-5" /> --}}
                                                        <i class="bi bi-pencil-square w-5 h-5"></i>
                                                    </button>
                                                </a>

                                                {{-- <form id="delete-form-{{ $kaprodi->id }}"
                                                    action="{{ route('mahasiswa.skma.destroy', $kaprodi->id) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        onclick="confirmDelete({{ $kaprodi->id }})"
                                                        class="cursor-pointer px-2.5 py-1.5 text-xs font-medium text-center text-white bg-red-500 rounded-lg hover:bg-red-600">
                                                        <x-css-trash class="w-5 h-5" />
                                                    </button>
                                                </form> --}}
                                            </div>
                                        </td>
                                    </tr>
                                    @include('admin.kaprodi.show')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $kaprodis->links() }}
                </div>
            </div>
        </section>
    @endif
@endsection
