<x-layout-main pageName='{{$pageName}}'>
    <x-layout-konten count="{{ $count }}">
        <x-slot:title>Koleksi</x-slot:title>
        <x-slot:paginate>{{ $books->links() }}</x-slot:paginate>
        <x-slot:linkRedirect>{{ $link['redirect'] }}</x-slot:linkRedirect>
        <x-slot:linkText>{{ $link['text'] }}</x-slot:linkText>
        <x-slot:bukuCard>


            @forelse($books as $book)
            <x-card-buku title="{{ $book->title }}" author="{{ $book->author->name }}" genre="{{$book->genres->pluck('name')->join(', ')}}"
                    createdAt="{{ $book->created_at->diffForHumans() }}" deskripsi="{{ $book->deskripsi }}">
                    <x-slot:iconDeleteBuku>{{ $deleteBuku }}</x-slot:iconDeleteBuku>
                    <x-slot:slug>{{ $book->slug }}</x-slot:id>
                </x-card-buku>
            @empty
                <h1 class="py-[1rem] font-semibold text-xl text-center">Hasil Tidak Ditemukan</h1>
            @endforelse

        </x-slot:bukuCard>
    </x-layout-konten>
    @if (session()->has('successBuku'))
    <x-flash-message-valid>
        {{ session('successBuku') }}
    </x-flash-message-valid>
    @endif
    @if (session()->has('successUpdateBuku'))
    <x-flash-message-valid>
        {{ session('successUpdateBuku') }}
    </x-flash-message-valid>

    @endif
    @if (session()->has('successDeleteBuku'))
    <x-flash-message-failed>
        {{ session('successDeleteBuku') }}
    </x-flash-message-fail>

    @endif
    @if (session()->has('failedDeleteBuku'))
    <x-flash-message-failed>
        {{ session('failedDeleteBuku') }}
    </x-flash-message-failed>
    @endif
    <script>
        function confirmDelete(title, slug) {
            if (confirm('Yakin Ingin Menghapus ' + title + '?')) {
                document.getElementById('delete-form-' + slug).submit();
            }
        }

    </script>
</x-layout-main>
