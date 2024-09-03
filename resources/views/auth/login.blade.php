<x-layout-login-register>
    <x-slot:title>Login</x-slot:title>
    <x-slot:judul>Selamat datang kembali!</x-slot:judul>
    <x-slot:redirect>register</x-slot:redirect>
    <x-slot:redirectLink>/register</x-slot:redirectLink>
    <x-slot:artikel>Kami senang melihat Anda kembali. Silakan masuk
        untuk melanjutkan menjelajahi layanan kami.</x-slot:artikel>
    <x-slot:form>
        <form action="/" method="POST" id="form-login" class="flex flex-col gap-6 w-96">
            @csrf
            <div class="flex flex-col">
                <label for="username" class="mb-2">Username</label>
                <input required type="text" value="{{ old('username') }}" name="username" id="username" autofocus
                    placeholder="Username"
                    class="bg-slate-300 py-2 px-5 outline-none dark:text-slate-950 focus:outline-none transition duration-100 ease-out focus:ease-in rounded-md focus:ring-2
                        @error('email')
                            focus:ring-red-600
                            @else
                            focus:ring-sky-500
                        @enderror">
                @error('email')
                    <div class="bg-red-200 ring-[1.5px] transition ease-in ring-red-600 mt-2 rounded-md px-4 py-2">
                        <p class="text-red-600 text-sm">Akun Tidak Ditemukan</p>
                    </div>
                @enderror
            </div>
            <div class="flex flex-col">
                <label  class="mb-2" for="password">Password</label>
                <div class="relative">
                    <input required type="password"  name="password" id="password" placeholder="Password"
                        class="bg-slate-300 w-full py-2 px-5 outline-none
                    text-slate-950  focus:outline-none rounded-md focus:ring-2 focus:ring-sky-500 transition ease-out ">
                    <svg id="ToggleEye" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        fill="currentColor" class="cursor-pointer absolute top-[10px] fill-slate-950 right-[12px]"
                        viewBox="0 0 16 16">
                        <path id="pathSatu"
                            d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z" />
                        <path id="pathDua"
                            d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z" />
                    </svg>
                </div>

            </div>
            <a href="" class="text-center text-slate-400 opacity-85 hover:opacity-50">Forgot Password</a>
            <button
                class="bg-sky-600 rounded-full text-white block w-48 self-center py-2 text-base font-semibold hover:bg-sky-500 ease-in transition "
                name="login" type="submit">Login</button>
        </form>

    </x-slot:form>

    @if (session()->has('successRegister'))
<div class="left-[50%] top-[5%] translate-x-[-50%] z-50 absolute">

    <div id="cardMessage"
        class="flex items-center p-4 mb-4 text-green-800 rounded-lg fill-green-500 bg-blue-50 dark:bg-gray-800 dark:text-green-500  "
        role="alert">
        <svg class="flex-shrink-0 w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <div class="ms-3 text-sm font-medium ">
            <h1 class="">{{ session('successRegister') }}</h1>
        </div>
        <button type="button" id="flashMessageButton"
            class="ms-auto -mx-1.5 -my-1.5 bg-green-50  rounded-lg focus:ring-2 focus:ring-green-500 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800  dark:hover:bg-gray-700"
            data-dismiss-target="#alert-1" aria-label="Close">
            <svg class="w-3 h-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                <path class="stroke-green-500" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>

</div>
@endif
@if (session()->has('loginError'))
    <div class="top-[5%] translate-x-[-50%] left-[50%] absolute">

        <div id="cardMessage"
            class="flex items-center p-4 mb-4 text-red-800 rounded-lg fill-red-500 bg-blue-50 dark:bg-gray-800 dark:text-red-500  "
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ms-3 text-sm font-medium ">
                <h1 class="">{{ session('loginError') }}</h1>
            </div>
            <button type="button" id="flashMessageButton"
            class="ms-auto -mx-1.5 -my-1.5 bg-red-50  rounded-lg focus:ring-2 focus:ring-red-500 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800  dark:hover:bg-gray-700"
                data-dismiss-target="#alert-1" aria-label="Close">
                <svg class="w-3 h-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                    <path class="stroke-red-500" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    </div>
@endif
</x-layout-login-register>
