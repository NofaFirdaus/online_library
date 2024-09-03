<x-layout-main>
    <section
        class=" self-center  dark:bg-gray-800 m-5    bg-slate-50  h-full  overflow-hidden  flex flex-col rounded-lg p-4 gap-1">
        <div
            class="font-semibold text-4xl text-slate-950 mt-8 ml-10 dark:text-slate-50 flex flex-row items-center gap-10 justify-between">

            <div class="flex flex-row gap-6 items-center">
                <img src="upload/fotoProfile/" alt="user-photo"
                    class="shadow-2xl ring-1 dark:ring-slate-50
                    ring-slate-950 rounded-full w-[10rem]  h-[10rem]">
                <div class="flex flex-col gap-1">
                    <h1>{{ $user->name }}</h1>
                    <p class="font-light text-base text-center opacity-75"></p>
                    <p class="text-sm font-light italic opacity-65">Joined
                        at {{ $user->created_at->format('j F Y') }}</p>
                </div>
            </div>
            <a href="/EditProfile" id="editButton"
                class="self-start cursor-pointer  hover:*:fill-slate-50 transition ease-in *:transition *:ease-in hover:bg-sky-600 bg-slate-300 p-[2px] rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    class="bi bi-pencil-square fill-slate-950 " viewBox="0 0 16 16">
                    <path
                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd"
                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                </svg>
            </a>
        </div>
        <hr class="border-b-[1px] border-slate-950 dark:border-slate-50 opacity-40 mt-5">
        <div id="tampilPengaturan"
            class=" overflow-hidden h-full overflow-y-scroll hilang dark:text-slate-50 px-4 max-w-4xl text-slate-950 mt-12  justify-self-center   self-center">
            <div class="text-xl  gap-x-24 gap-y-16  max-w-max max-h-full flex-wrap flex">
                <div>
                    <p class="font-medium mb-2 text-slate-950 dark:text-slate-50 ">Name : </p>
                    <p
                        class="dark:bg-slate-900 bg-slate-300 w-84 text-center py-2 text-slate-950 dark:text-slate-50 text-lg font-semibold rounded-md">
                        {{ $user->name }}
                    </p>
                </div>
                <div>
                    <p class="font-medium mb-2 text-slate-950 dark:text-slate-50 ">Username : </p>
                    <p
                        class="dark:bg-slate-900 bg-slate-300 w-84 text-center py-2 text-slate-950 dark:text-slate-50 text-lg font-semibold rounded-md">
                        {{ $user->username }}
                    </p>
                </div>
                <div>
                    <p class="font-medium mb-2 text-slate-950 dark:text-slate-50 ">Email : </p>
                    <p
                        class="dark:bg-slate-900 bg-slate-300 w-84 text-center py-2 text-slate-950 dark:text-slate-50 text-lg font-semibold rounded-md">
                        {{ $user->email }}
                    </p>
                </div>
                <div>
                    <p class="font-medium mb-2 text-slate-950 dark:text-slate-50 ">Country : </p>
                    <p
                        class="dark:bg-slate-900 bg-slate-300 w-84 text-center py-2 text-slate-950 dark:text-slate-50 text-lg font-semibold rounded-md">

                    </p>
                </div>
            </div>
        </div>
    </section>

    @if (session()->has('successUpdateProfile'))
    <x-flash-message-valid>
        {{session('successUpdateProfile')}}
    </x-flash-message-valid>

    @endif
</x-layout-main>
