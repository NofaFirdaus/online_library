<x-layout-main>
    <section class="dark:bg-gray-800 m-5    bg-slate-50  h-full  overflow-hidden rounded-lg p-4 gap-1">
        <div class="flex flex-col gap-3 h-full">
            <form method="POST" action="/TambahBuku" class="flex flex-row justify-between  h-full    items-center"
                enctype="multipart/form-data">
                @csrf
                <div class="text-slate-950  self-stretch justify-self-stretch gap-5 flex flex-col  dark:text-slate-50 ">
                    <h1 class="text-xl font-semibold mt-4">Sampul : </h1>
                    <img src="upload/sampul_buku/icikiwirMasbro.jpg" alt=""
                        class="h-[28rem] w-80 ring-2 ring-slate-950/75 dark:ring-slate-50/75">
                    <input accept="image/*"  type="file" name="sampul_buku"
                        class="file:py-1 bg-slate-100 file:cursor-pointer pr-2 dark:bg-slate-900 file:not-italic file:opacity-100 text-sm file:text-base italic dark:text-slate-50 text-slate-950 opacity-80 rounded-md file:px-3  w-[24rem] file:font-semibold file:rounded-md hover:dark:file:bg-slate-900 hover:file:bg-slate-200 file:bg-slate-300 file:transition file:ease-in file:mr-4 cursor-pointer file:text-sky-600  dark:file:bg-slate-950 file:border-0">
                        @error('sampul_buku')
                            <div class=" ring-[1.5px] transition ease-in ring-red-600 mt-2 rounded-md px-4 py-2"><p class="text-red-600 text-xs">{{$message}}</p></div>
                            @enderror
                </div>
                <div
                    class=" px-5 py-3 gap-4 w-[62%] flex flex-col *:flex *:flex-col    *:gap-2 overflow-hidden overflow-y-scroll hilang h-full">
                    <div>
                        <label for="judulBuku" class="font-semibold text-slate-950 dark:text-slate-50">Judul :
                        </label>
                        <input value="{{old('title')}}" type="text" id="judulBuku" autocomplete="off" name="title"
                            class="bg-slate-300 py-2  px-5 outline-none dark:text-slate-50 text-slate-950 dark:bg-slate-950 focus:outline-none transition duration-100 ease-in rounded-md focus:ring-2 focus:ring-sky-500">
                            @error('title')
                            <div class=" ring-[1.5px] transition ease-in ring-red-600 mt-2 rounded-md px-4 py-2"><p class="text-red-600 text-xs">{{$message}}</p></div>

                            @enderror
                    </div>

                    <div >
                        <p  for="genre" class="  font-semibold text-slate-950 dark:text-slate-50">Genre :
                        </p>
                        <div class="flex my-[0.6rem]   flex-wrap gap-[12px] items-center ">
                            <div>
                                <input hidden class="peer/aksi" id="aksi" type="checkbox" value="1" name=genre_id[]
                                    >
                                <label
                                    class="select-none peer-checked/aksi:ring-sky-500 peer-checked/aksi:text-sky-500 peer-checked/aksi:ease-in ease-out transition ring-1  cursor-pointer  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                                    for="aksi">aksi</label>
                            </div>

                            <div>
                                <input hidden class="peer/fantasi" id="fantasi" type="checkbox" value="2" name=genre_id[]
                                    >
                                <label
                                    class="select-none peer-checked/fantasi:ring-sky-500 peer-checked/fantasi:text-sky-500 peer-checked/fantasi:ease-in ease-out transition ring-1  cursor-pointer  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                                    for="fantasi">fantasi</label>
                            </div>
                            <div>

                                <input hidden class="peer/romantis" id="romantis" type="checkbox" value="3" name=genre_id[]
                                    >
                                <label
                                    class="select-none peer-checked/romantis:ring-sky-500 peer-checked/romantis:text-sky-500 peer-checked/romantis:ease-in ease-out transition ring-1  cursor-pointer  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                                    for="romantis">romantis</label>
                            </div>
                            <div>

                                <input hidden class="peer/komedi" id="komedi" type="checkbox" value="4" name=genre_id[]
                                    >
                                <label
                                    class="select-none peer-checked/komedi:ring-sky-500 peer-checked/komedi:text-sky-500 peer-checked/komedi:ease-in ease-out transition ring-1  cursor-pointer   ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                                    for="komedi">komedi</label>
                            </div>
                            <div>


                                <input hidden class="peer/drama" id="drama" type="checkbox" value="5" name=genre_id[]
                                    >
                                <label
                                    class=" peer-checked/drama:ring-sky-500 peer-checked/drama:text-sky-500 peer-checked/drama:ease-in ease-out transition ring-1  cursor-pointer select-none  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                                    for="drama">drama</label>
                            </div>
                            <div>


                                <input hidden class="peer/horror" id="horror" type="checkbox" value="6" name=genre_id[]
                                    >
                                <label
                                    class=" peer-checked/horror:ring-sky-500 peer-checked/horror:text-sky-500 peer-checked/horror:ease-in ease-out transition ring-1  cursor-pointer select-none  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                                    for="horror">horror</label>
                            </div>
                            <div>


                                <input hidden class="peer/misteri" id="misteri" type="checkbox" value="7" name=genre_id[]
                                    >
                                <label
                                    class=" peer-checked/misteri:ring-sky-500 peer-checked/misteri:text-sky-500 peer-checked/misteri:ease-in ease-out transition ring-1  cursor-pointer select-none  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                                    for="misteri">misteri</label>
                            </div>
                            <div>


                                <input hidden class="peer/slice-of-life" id="slice-of-life" type="checkbox"
                                    value="8" name=genre_id[] >
                                <label
                                    class=" peer-checked/slice-of-life:ring-sky-500 peer-checked/slice-of-life:text-sky-500 peer-checked/slice-of-life:ease-in ease-out transition ring-1  cursor-pointer select-none  ring-sky-500/50 text-sm text-sky-500/75 px-4 py-2 rounded-md"
                                    for="slice-of-life">slice of life</label>
                            </div>
                        </div>
                        @error('genres')
                        <div class=" ring-[1.5px] transition ease-in ring-red-600 mt-2 rounded-md px-4 py-2"><p class="text-red-600 text-xs">{{$message}}</p></div>

                        @enderror
                    </div>
                    <div>
                        <label for="sinopsis" class="font-semibold text-slate-950 dark:text-slate-50">Sinopsis :
                        </label>
                        <textarea   id="sinopsis" name="deskripsi" type="text"
                            class="bg-slate-300 py-2 px-5 outline-none resize-none  dark:text-slate-50 text-slate-950 h-[12rem]  dark:bg-slate-950 focus:outline-none transition duration-100 ease-in rounded-md focus:ring-2 focus:ring-sky-500">{{old('deskripsi')}}</textarea>
                            @error('deskripsi')
                            <div class=" ring-[1.5px] transition ease-in ring-red-600 mt-2 rounded-md px-4 py-2"><p class="text-red-600 text-xs">{{$message}}</p></div>
                            @enderror
                    </div>
                    <label for="file_buku" class="font-semibold text-slate-950 dark:text-slate-50">File :
                    </label>
                    <div>
                        <input accept=".pdf*" id="file_buku" name="file_buku" type="file"
                            class="file:py-1 bg-slate-100 file:cursor-pointer pr-2 dark:bg-slate-900 file:not-italic file:opacity-100 text-sm file:text-base italic dark:text-slate-50 text-slate-950 opacity-80 rounded-md file:px-3  file:font-semibold file:rounded-md hover:dark:file:bg-slate-900 hover:file:bg-slate-200 file:bg-slate-300 file:transition file:ease-in file:mr-4 cursor-pointer file:text-sky-600  dark:file:bg-slate-950 file:border-0">
                            @error('file_buku')
                            <div class=" ring-[1.5px] transition ease-in ring-red-600 mt-2 rounded-md px-4 py-2"><p class="text-red-600 text-xs">{{$message}}</p></div>
                            @enderror
                    </div>
                    <div class="!flex !gap-4 !flex-row">
                        <a href="/koleksi"
                            class="bg-red-600 rounded-lg  text-slate-50 hover:bg-red-500 transition ease-in text-center w-48
                                  py-2 text-base font-semibold">Batal</a>
                        <button name="submit"
                            class="bg-sky-600 rounded-lg  text-slate-50 hover:bg-sky-500 transition ease-in  w-48
                                  py-2 text-base font-semibold">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </section>
    @if (session()->has('failedBuku'))
    <div class="top-[5%] left-[50%] absolute">
        <div id="cardMessage"
                class="flex items-center p-4 mb-4 text-red-800 rounded-lg fill-red-500 bg-blue-50 dark:bg-slate-950 dark:text-red-500  "
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium ">
                    <h1 class="">{{ session('failedBuku') }}</h1>
                </div>
                <button type="button" id="flashMessageButton"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50  rounded-lg focus:ring-2 focus:ring-red-500 p-1.5 hover: inline-flex items-center justify-center h-8 w-8 dark:bg-slate-950  dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-1" aria-label="Close">
                    <svg class="w-3 h-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                        <path class="stroke-red-500" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
    </div>
    @endif
</x-layout-main>
