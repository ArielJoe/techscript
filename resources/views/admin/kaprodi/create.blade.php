@extends('components.layout')

@section('title')
    Kaprodi
@endsection

@section('content')
    <section>
        <div class="py-4 px-4 mx-auto max-w-2xl lg:py-4">
            <h1 class="mb-6 text-2xl text-center font-bold text-gray-900">Tambah Kaprodi</h1>
            <form action="{{ route('admin.kaprodi.store') }}" method="POST">
                @csrf
                <div class="flex flex-col gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">ID User</label>
                        <input type="text" name="id" value="{{ old('id') }}" placeholder="KP0000"
                            class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('id') border-red-500 @enderror">
                        @error('id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                        <input type="text" name="full_name" value="{{ old('full_name') }}"
                            class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('full_name') border-red-500 @enderror">
                        @error('full_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password"
                            class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('password') border-red-500 @enderror">
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Program Studi</label>
                        <select name="Major_id"
                            class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('Major_id') border-red-500 @enderror">
                            <option value="">-- Pilih Program Studi --</option>
                            @foreach ($majors as $major)
                                <option value="{{ $major->id }}" {{ old('Major_id') == $major->id ? 'selected' : '' }}>
                                    {{ $major->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('Major_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex">
                    <button type="submit"
                        class="cursor-pointer inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 mr-1 text-sm font-medium text-center text-white bg-teal-cyan rounded-lg hover:bg-teal-cyan/90">
                        Simpan
                    </button>
                    <a href="{{ route('admin.kaprodi.index') }}"
                        class="cursor-pointer inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 ml-1 text-sm font-medium text-center border text-gray-900 rounded-lg hover:bg-gray-100">
                        Batalkan
                    </a>
                </div>
            </form>
        </div>
    </section>
@endsection
