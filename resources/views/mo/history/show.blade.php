<!-- Main modal -->
<div id="mo-history-modal-{{ $letter->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full max-h-full backdrop-brightness-70">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">
                    Detail Histori Pengajuan Surat
                </h3>
                <button type="button"
                    class="cursor-pointer text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="mo-history-modal-{{ $letter->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500">
                    Nomor Surat: {{ $letter->id }}
                </p>
                <p class="text-base leading-relaxed text-gray-500">
                    Jenis Surat: {{ $letter->category }}
                </p>
                @if ($letter->selected_course)
                    <p class="text-base leading-relaxed text-gray-500">
                        Mata Kuliah dan Periode: {{ $letter->selected_course }}
                    </p>
                @endif
                @if ($letter->purpose)
                    <p class="text-base leading-relaxed text-gray-500">
                        Tujuan: {{ $letter->purpose }}
                    </p>
                @endif
                @if ($letter->topic)
                    <p class="text-base leading-relaxed text-gray-500">
                        Topik: {{ $letter->topic }}
                    </p>
                @endif
                @if ($letter->addressed_to)
                    <p class="text-base leading-relaxed text-gray-500">
                        Ditujukan Kepada: {{ $letter->addressed_to }}
                    </p>
                @endif
                @if ($letter->list_description)
                    <p class="text-base leading-relaxed text-gray-500">
                        Data Pengaju: {{ $letter->list_description }}
                    </p>
                @endif
                <p class="text-base leading-relaxed text-gray-500">
                    Status: {{ $letter->status_text }}
                </p>
                @if ($letter->status === 3)
                    <p class="text-base leading-relaxed text-gray-500">
                        Disetujui oleh: {{ $letter->accepted_by }}
                    </p>
                @endif
                <p class="text-base leading-relaxed text-gray-500">
                    Tanggal Pengajuan: {{ $letter->date_indo }}
                </p>
                @if ($letter->file_path)
                    <div class="mt-4">
                        <a href="{{ Storage::url($letter->file_path) }}" target="_blank"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none">
                            Lihat Surat
                            <svg class="w-4 h-4 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                            </svg>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
