<x-layout-login-register>
    <x-slot:title>Register</x-slot:title>
    <x-slot:judul>Selamat datang!</x-slot:judul>
    <x-slot:redirect>Login</x-slot:redirect>
    <x-slot:redirectLink>/</x-slot:redirectLink>
    <x-slot:artikel>Kami sangat senang Anda memilih untuk bergabung. Isilah formulir di samping ini dengan informasi Anda untuk membuat akun baru.</x-slot:artikel>
    <x-slot:form>
        <form action="/register" method="POST" id="form-register" class="flex flex-col gap-6  w-96">
            @csrf
            <div class="flex flex-col text-slate-950 dark:text-slate-50">
                <label for="name"  class="mb-2">Nama</label>
                <input value="{{old('name')}}" required type="text" name="name" id="name" placeholder="Nama" class="bg-slate-300 py-2 px-5 outline-none
                text-slate-950  focus:outline-none rounded-md focus:ring-2 focus:ring-sky-500 transition ease-out " >
                @error('name')
                <div class=" ring-[1.5px] transition ease-in ring-red-600 mt-2 rounded-md px-4 py-2"><p class="text-red-600 text-xs">{{$message}}</p></div>
                @enderror
            </div>
            <div class="flex flex-col text-slate-950 dark:text-slate-50">
                <label for="username-register"  class="mb-2">Username</label>
                <input value="{{old('username')}}" required type="text" name="username" id="username-register" placeholder="Username" class="bg-slate-300 py-2 px-5 outline-none
                text-slate-950  focus:outline-none rounded-md focus:ring-2 focus:ring-sky-500 transition ease-out " >
                @error('username')
                <div class=" ring-[1.5px] transition ease-in ring-red-600 mt-2 rounded-md px-4 py-2"><p class="text-red-600 text-xs">{{$message}}</p></div>
                @enderror
            </div>
            <div class="flex flex-col text-slate-950 dark:text-slate-50">
                <label for="email-register"  class="mb-2">Email</label>
                <input required value="{{old('email')}}" type="email" name="email" id="email-register" placeholder="Email" class="bg-slate-300 py-2 px-5 outline-none
                text-slate-950  focus:outline-none rounded-md focus:ring-2 focus:ring-sky-500 transition ease-out
                disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                invalid:border-red-600  invalid:text-red-600
                focus:invalid:border-red-600 focus:invalid:ring-red-600" >
                @error('email')
                <div class=" ring-[1.5px] transition ease-in ring-red-600 mt-2 rounded-md px-4 py-2"><p class="text-red-600 text-xs">{{$message}}</p></div>
                @enderror
            </div>
            <div class="flex flex-col text-slate-950 dark:text-slate-50">
                <label for="password-register" class="mb-2">Password</label>
                <div class="relative" >
                    <input required type="password" name="password" id="password" placeholder="Password" class="bg-slate-300 w-full py-2 px-5 outline-none
                    text-slate-950  focus:outline-none rounded-md focus:ring-2 focus:ring-sky-500 transition ease-out " >
                      <svg  id="ToggleEye" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="cursor-pointer absolute top-[10px] fill-slate-950 right-[12px]" viewBox="0 0 16 16">
                        <path id="pathSatu" d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z"/>
                        <path id="pathDua" d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
                      </svg>
                </div>
                @error('password')
                <div class=" ring-[1.5px] transition ease-in ring-red-600 mt-2 rounded-md px-4 py-2"><p class="text-red-600 text-xs">{{$message}}</p></div>
                @enderror
                </div>
            <button class=" bg-sky-600 rounded-full text-white block w-48 self-center py-2 text-base font-semibold hover:bg-sky-500 ease-in transition "
            id="" name="login" type="submit">Sign Up</button>
        </form>
    </x-slot:form>
</x-layout-login-register>
@if (session()->has('registerError'))
<x-flash-message-failed>
    {{session('registerError')}}
</x-flash-message-failed>
@endif
