<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <main class="flex flex-row items-center h-screen w-screen font-poppins dark:bg-slate-900 dark:*:text-white">
        <section id="foto"
            class="bg-sky-600 flex flex-col justify-center items-center h-screen w-5/12 gap-7 text-white opacity-85">
            <h1 class="text-4xl font-semibold text-center">{{$judul}}</h1>
            <p class="px-4 text-center font-light text-sm opacity-80">{{$artikel}}</p>
            <a class="py-1 px-7 rounded-lg ring-1 ring-white" href='{{$redirectLink}}'>{{$redirect}}</a>
        </section>
        <section id="login" class="w-full flex justify-center items-center flex-col">
            <h1 class="text-4xl mb-3 font-semibold">{{$title}}</h1>
            {{$form}}
        </section>
        <div class="self-start mt-4 mr-8">
        </div>
        {{$slot}}
    </main>
</body>
</html>
