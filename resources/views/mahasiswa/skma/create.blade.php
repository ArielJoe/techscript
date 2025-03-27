@extends('components.layout')

@section('title')
    SKMA
@endsection

@section('content')
    <section>
        <div class="py-4 px-4 mx-auto max-w-2xl lg:py-4">
            <h1 class="mb-4 text-2xl font-bold text-gray-900">Surat Keterangan Mahasiswa Aktif</h1>
            <form action="{{ route('mahasiswa.skma.store') }}" method="POST">
                @csrf
                <div class="flex flex-col gap-4">
                    <div class="flex gap-2 w-full flex-col sm:flex-row">
                        <div class="w-full sm:w-[20%]">
                            <label class="block mb-2 text-sm font-medium text-gray-900">NRP</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                value="{{ $students[0]->student_id }}" disabled>
                            <input type="hidden" name="id" value="{{ $students[0]->student_id }}">
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
                            <label class="block mb-2 text-sm font-medium text-gray-900">Semester</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                value="{{ $students[0]->semester }}" disabled>
                        </div>
                        <div class="w-full sm:w-[80%]">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Program Studi</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                value="{{ $students[0]->program_studi }}" disabled>
                        </div>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                        <textarea
                            class="bg-gray-50 border min-h-15 max-h-25 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="" disabled>{{ $students[0]->address }}</textarea>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Keperluan Pengajuan</label>
                        <textarea name="purpose"
                            class="bg-gray-50 border min-h-15 max-h-25 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('purpose') border-red-500 @enderror"
                            placeholder=""></textarea>
                        @error('purpose')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="cursor-pointer inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-teal-cyan rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
                    Ajukan Surat
                </button>
            </form>
        </div>
    </section>
@endsection
