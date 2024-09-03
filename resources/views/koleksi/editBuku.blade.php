<x-layout-main>
    <section class="dark:bg-gray-800 m-5    bg-slate-50  h-full  overflow-hidden rounded-lg p-4 gap-1">
        <div class="flex flex-col gap-3 h-full">
            <a href="/koleksi"
                class="text-xs text-sky-600 p-1 rounded-md bg-sky-200 ring-1 ring-sky-600 hover:bg-sky-600 hover:text-white transition ease-in-out w-[5rem] text-center">Kembali</a>
            <form method="POST" class="flex flex-row justify-between  h-full    items-center"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div
                    class="text-slate-950 h-full self-stretch justify-self-stretch gap-5 flex flex-col  dark:text-slate-50 ">
                    <h1 class="text-xl font-semibold mt-4">Sampul : </h1>
                    <img src="upload/sampulBuku/" alt=""
                        class="h-[28rem] w-80 ring-2 ring-slate-950/75 dark:ring-slate-50/75">
                    <div>

                        <input type="file" name="sampulBuku" value=""
                            class="file:py-1 bg-slate-100 file:cursor-pointer pr-2 dark:bg-slate-900 file:not-italic file:opacity-100 text-sm file:text-base italic dark:text-slate-50 text-slate-950 opacity-80 rounded-md file:px-3  w-[24rem] file:font-semibold file:rounded-md hover:dark:file:bg-slate-900 hover:file:bg-slate-200 file:bg-slate-300 file:transition file:ease-in file:mr-4 cursor-pointer file:text-sky-600  dark:file:bg-slate-950 file:border-0">
                        @error('email')
                            <div class=" ring-[1.5px] transition ease-in ring-red-600 mt-2 rounded-md px-4 py-2">
                                <p class="text-red-600 text-xs">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                </div>
                <div
                    class=" px-5 py-3 gap-4 w-[62%] flex flex-col *:flex *:flex-col    *:gap-2 overflow-hidden overflow-y-scroll hilang h-full">
                    <div>
                        <label for="judulBuku" class="font-semibold text-slate-950 dark:text-slate-50">Judul :
                        </label>
                        <input type="text" id="judulBuku" name="title"
                            value="@error('title'){{ old('title') }}@else{{ $buku->title }}@enderror"
                            class="bg-slate-300 py-2 px-5 outline-none dark:text-slate-50 text-slate-950 dark:bg-slate-950 focus:outline-none transition duration-100 ease-in rounded-md focus:ring-2 focus:ring-sky-500">
                        @error('title')
                            <div class=" ring-[1.5px] transition ease-in ring-red-600 mt-2 rounded-md px-4 py-2">
                                <p class="text-red-600 text-xs">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <div>

                        <p for="genre" class="  font-semibold text-slate-950 dark:text-slate-50">Genre :
                        </p>
                        <div class="flex my-[0.6rem]   flex-wrap gap-[12px] items-center ">
                            <div>
                                <input @if ($genre['aksi'] ?? false) checked @endif hidden class="peer/aksi"
                                    id="aksi" type="checkbox" name="genre[]" value="aksi">
                                <label
                                    class="select-none peer-checked/aksi:ring-sky-500 peer-checked/aksi:text-sky-500 peer-checked/aksi:ease-in ease-out transition ring-1  cursor-pointer  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                                    for="aksi">aksi</label>
                            </div>

                            <div>
                                <input @if ($genre['fantasi'] ?? false) checked @endif hidden class="peer/fantasi" id="fantasi" type="checkbox" name="genre[]"
                                    value="fantasi">
                                <label
                                    class="select-none peer-checked/fantasi:ring-sky-500 peer-checked/fantasi:text-sky-500 peer-checked/fantasi:ease-in ease-out transition ring-1  cursor-pointer  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                                    for="fantasi">fantasi</label>
                            </div>
                            <div>

                                <input @if ($genre['romantis'] ?? false) checked @endif hidden class="peer/romantis" id="romantis" type="checkbox" name="genre[]"
                                    value="romantis">
                                <label
                                    class="select-none peer-checked/romantis:ring-sky-500 peer-checked/romantis:text-sky-500 peer-checked/romantis:ease-in ease-out transition ring-1  cursor-pointer  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                                    for="romantis">romantis</label>
                            </div>
                            <div>

                                <input @if ($genre['komedi'] ?? false) checked @endif hidden class="peer/komedi" id="komedi" type="checkbox" name="genre[]"
                                    value="komedi">
                                <label
                                    class="select-none peer-checked/komedi:ring-sky-500 peer-checked/komedi:text-sky-500 peer-checked/komedi:ease-in ease-out transition ring-1  cursor-pointer   ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                                    for="komedi">komedi</label>
                            </div>
                            <div>


                                <input @if ($genre['drama'] ?? false) checked @endif hidden class="peer/drama" id="drama" type="checkbox" name="genre[]"
                                    value="drama">
                                <label
                                    class=" peer-checked/drama:ring-sky-500 peer-checked/drama:text-sky-500 peer-checked/drama:ease-in ease-out transition ring-1  cursor-pointer select-none  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                                    for="drama">drama</label>
                            </div>
                            <div>


                                <input @if ($genre['horror'] ?? false) checked @endif hidden class="peer/horror" id="horror" type="checkbox" name="genre[]"
                                    value="horror">
                                <label
                                    class=" peer-checked/horror:ring-sky-500 peer-checked/horror:text-sky-500 peer-checked/horror:ease-in ease-out transition ring-1  cursor-pointer select-none  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                                    for="horror">horror</label>
                            </div>
                            <div>


                                <input @if ($genre['misteri'] ?? false) checked @endif hidden class="peer/misteri" id="misteri" type="checkbox" name="genre[]"
                                    value="misteri">
                                <label
                                    class=" peer-checked/misteri:ring-sky-500 peer-checked/misteri:text-sky-500 peer-checked/misteri:ease-in ease-out transition ring-1  cursor-pointer select-none  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                                    for="misteri">misteri</label>
                            </div>
                            <div>


                                <input @if ($genre['slice of life'] ?? false) checked @endif hidden class="peer/slice-of-life" id="slice-of-life" type="checkbox"
                                    name="genre[]" value="slice of life">
                                <label
                                    class=" peer-checked/slice-of-life:ring-sky-500 peer-checked/slice-of-life:text-sky-500 peer-checked/slice-of-life:ease-in ease-out transition ring-1  cursor-pointer select-none  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                                    for="slice-of-life">slice of life</label>
                            </div>
                        </div>
                        @error('genre')
                            <div class=" ring-[1.5px] transition ease-in ring-red-600 mt-2 rounded-md px-4 py-2">
                                <p class="text-red-600 text-xs">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="sinopsis" class="font-semibold text-slate-950 dark:text-slate-50">Sinopsis :
                        </label>
                        <textarea id="sinopsis" name="deskripsi" type="text"
                            class="bg-slate-300 py-2 px-5 outline-none resize-none  dark:text-slate-50 text-slate-950 h-[12rem]  dark:bg-slate-950 focus:outline-none transition duration-100 ease-in rounded-md focus:ring-2 focus:ring-sky-500">
@error('deskripsi')
{{ old('deskripsi') }}@else{{ $buku->deskripsi }}
@enderror
</textarea>
                        @error('deskripsi')
                            <div class=" ring-[1.5px] transition ease-in ring-red-600 mt-2 rounded-md px-4 py-2">
                                <p class="text-red-600 text-xs">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="!flex !gap-4 !flex-row">
                        {{-- <button type="button"
                            onclick="event.preventDefault(); confirm('Yakin Ingin Menghapus {{$buku->title}} ?'); document.getElementById('delete-form-{{ $buku->id }}').submit();"
                            class="bg-red-600 rounded-lg  text-slate-50 hover:bg-red-500 transition ease-in  w-48
                    py-2 text-base font-semibold" >Delete</button> --}}

                        <button type="submit"
                            class="bg-sky-600 rounded-lg  text-slate-50 hover:bg-sky-500 transition ease-in  w-48
                        py-2 text-base font-semibold"
                            onclick="confirm('Yakin Ingin Mengubah ?')">Submit</button>
                    </div>
                </div>
            </form>

            {{-- <form method="POST" id="delete-form-{{ $buku->id }}" action="{{ url('/DeleteBuku/' . $buku->slug) }}">
                @csrf
                @method('DELETE')

            </form> --}}

        </div>
        </div>
    </section>

</x-layout-main>
