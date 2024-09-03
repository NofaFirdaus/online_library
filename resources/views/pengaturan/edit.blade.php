<x-layout-main>
    <section class="self-center  dark:bg-gray-800 m-5    bg-slate-50  h-full  overflow-hidden  flex flex-col rounded-lg p-4 gap-1">
        <form method="POST" action="/EditProfile" enctype="multipart/form-data" class="flex flex-col gap-3 h-full">
            @csrf
            @method('PATCH')
            <div
                class="font-semibold text-4xl text-slate-950 mt-8 ml-10 dark:text-slate-50 flex flex-row items-center  justify-between">
                <div class="flex flex-col items-center">
                    <img src="upload/fotoProfile/" alt="user-photo"
                        class="shadow-2xl ring-1 dark:ring-slate-50 ring-slate-950 rounded-full  h-[10rem]  w-[10rem]">
                    <label for="uploadImage"
                        class="text-sm mt-2 text-sky-500 cursor-pointer hover:text-sky-400">Edit
                        Photo Profile</label>
                    <input id="uploadImage" name="gambar" type="file" class="hidden">
                </div>
            </div>
            <hr class="border-b-[1px] border-slate-950 dark:border-slate-50 opacity-40 mt-5">
            <div
                class=" overflow-hidden h-full overflow-y-scroll hilang dark:text-slate-50 px-4 max-w-4xl text-slate-950 mt-12  justify-self-center   self-center">
                <div
                    class="text-xl  gap-x-24 gap-y-16  max-w-max max-h-full flex-wrap flex">
                    <div>
                        <p class="font-medium mb-2 text-slate-950 dark:text-slate-50 ">Name : </p>
                        <input name="name" type="text"  value="{{$user->name}}"
                            class="dark:bg-slate-900 placeholder:italic w-84 px-4 py-2 text-lg  focus:outline-none transition duration-100 ease-in-out focus:ring-sky-500 bg-slate-300 text-slate-950 dark:text-slate-50 font-medium rounded-md focus:ring-2 ">
                            @error('name')
                            <div class=" ring-[1.5px] transition ease-in ring-red-600 mt-2 rounded-md px-4 py-2"><p class="text-red-600 text-xs">{{$message}}</p></div>
                            @enderror

                    </div>
                    <div>
                        <p class="font-medium mb-2 text-slate-950 dark:text-slate-50">Username : </p>
                        <input name="username" type="text" placeholder="" value="{{$user->username}}"
                            class="dark:bg-slate-900 placeholder:italic w-84 px-4 py-2 text-lg  focus:outline-none transition duration-100 ease-in-out focus:ring-sky-500 bg-slate-300 text-slate-950 dark:text-slate-50 font-medium rounded-md focus:ring-2 ">
                            @error('username')
                            <div class=" ring-[1.5px] transition ease-in ring-red-600 mt-2 rounded-md px-4 py-2"><p class="text-red-600 text-xs">{{$message}}</p></div>
                            @enderror

                    </div>
                    <div>
                        <p class="font-medium mb-2 text-slate-950 dark:text-slate-50">Email : </p>
                        <input name="email" type="email" placeholder="" value="{{$user->email}}"
                            class="dark:bg-slate-900 placeholder:italic w-84 px-4 py-2 text-lg  focus:outline-none transition duration-100 ease-in-out focus:ring-sky-500 bg-slate-300 text-slate-950 dark:text-slate-50 font-medium rounded-md focus:ring-2
                        disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-red-600  invalid:text-red-600  focus:invalid:border-red-600 focus:invalid:ring-red-600">
                        @error('email')
                            <div class=" ring-[1.5px] transition ease-in ring-red-600 mt-2 rounded-md px-4 py-2"><p class="text-red-600 text-xs">{{$message}}</p></div>
                            @enderror
                    </div>
                    <div>
                        <p class="font-medium mb-2 text-slate-950 dark:text-slate-50">Country : </p>
                        <input name="country" type="text" placeholder="" value=" "
                            class="dark:bg-slate-900 placeholder:italic w-84 px-4 py-2 text-lg  focus:outline-none transition duration-100 ease-in-out focus:ring-sky-500 bg-slate-300 text-slate-950 dark:text-slate-50 font-medium rounded-md focus:ring-2">
                    </div>
                    <div class="flex flex-row  gap-7">
                        <a href="/pengaturan" id="batalEdit"
                            class="px-4 py-1 transition ease-in  hover:ring-2 ring-red-600 hover:bg-red-400 bg-red-600 font-medium text-base text-slate-50 rounded-lg">Batalkan</a>
                        <button type="submit"
                            class="px-4 py-1 transition ease-in  hover:ring-2 ring-green-600 hover:bg-green-400 bg-green-600 font-medium text-base text-slate-50 rounded-lg">Simpan</button>
                    </div>
                </div>
        </form>
        </div>

    </section>
    @if (session()->has('failedUpdateProfile'))
    <x-flash-message-failed>
        {{session('failedUpdateProfile')}}
    </x-flash-message-failed>
    @endif

</x-layout-main>
