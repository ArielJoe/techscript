@extends('components.layout')

@section('title')
    SPTMK
@endsection

@section('content')
    <section>
        <div class="py-4 px-4 mx-auto max-w-2xl lg:py-4">
            <h1 class="mb-6 text-2xl text-center font-bold text-gray-900">Surat Pengantar Tugas Mata Kuliah</h1>
            <form action="{{ route('mahasiswa.sptmk.update', $letter->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-4">
                    <div class="flex gap-2 w-full flex-col sm:flex-row">
                        <div class="w-full sm:w-[50%]">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Mata Kuliah</label>
                            <div class="relative">
                                <select name="selected_course"
                                    class="appearance-none bg-gray-50 border text-gray-900 text-sm rounded-lg focus:outline-none focus:ring-teal-cyan focus:border-teal-cyan block w-full p-2.5 @error('selected_course') border-red-500 @enderror">
                                    @foreach ($courses as $course)
                                        <option
                                            value="{{ $course->course_id }} {{ $course->course_name }} [{{ $course->period }}]"
                                            @if (old('selected_course', $letter->selected_course) ==
                                                    $course->course_id . ' ' . $course->course_name . ' [' . $course->period . ']') selected @endif>
                                            {{ $course->course_id }} {{ $course->course_name }} [{{ $course->period }}]
                                        </option>
                                    @endforeach
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                            @error('selected_course')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full sm:w-[50%]">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Program Studi</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                value="{{ $major->major_name }}" disabled>
                        </div>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tujuan</label>
                        <input type="text" name="purpose"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            value="{{ old('purpose', $letter->purpose) }}">
                        @error('purpose')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Topik</label>
                        <input type="text" name="topic"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            value="{{ old('topic', $letter->topic) }}">
                        @error('topic')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Ditujukan Kepada</label>
                        <textarea name="addressed_to"
                            class="bg-gray-50 border min-h-15 max-h-15 text-gray-900 text-sm rounded-lg block w-full p-2.5 @error('addressed_to') border-red-500 @enderror"
                            placeholder="ex. Ibu Susi Susanti; Kepala Personalia PT. X; Jln. Cibogo no. 10 Bandung">{{ old('addressed_to', $letter->addressed_to) }}</textarea>
                        @error('addressed_to')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Informasi Data Mahasiswa</label>
                        <textarea name="list_description"
                            class="bg-gray-50 border min-h-20 max-h-20 text-gray-900 text-sm rounded-lg block w-full p-2.5 @error('list_description') border-red-500 @enderror"
                            placeholder="ex. Mahasiswa 1 - 15720xx; Mahasiswa 2 - 15720xx; Mahasiswa 3 - 15720xx; dst">{{ old('list_description', $letter->list_description) }}</textarea>
                        @error('list_description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex">
                    <button type="submit"
                        class="cursor-pointer inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 mr-1 text-sm font-medium text-center text-white bg-teal-cyan rounded-lg hover:bg-teal-cyan/90">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('mahasiswa.sptmk.index') }}"
                        class="cursor-pointer inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 ml-1 text-sm font-medium text-center border border-gray-300 text-gray-900 rounded-lg hover:bg-gray-100">
                        Batalkan
                    </a>
                </div>
            </form>

        </div>
    </section>
@endsection
