<form action="{{ route('kaprodi.submission.update', $letter->id) }}" method="POST">
    @csrf
    @method('PUT')
    <button type="submit" name="approve" value="yes"
        class="cursor-pointer block px-2.5 py-1.5 text-xs font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-400">
        (Setujui)
    </button>
</form>
<form action="{{ route('kaprodi.submission.update', $letter->id) }}" method="POST">
    @csrf
    @method('PUT')
    <button type="submit" name="approve" value="no"
        class="cursor-pointer block px-2.5 py-1.5 text-xs font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-400">
        (Tolak)
    </button>
</form>
