<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .hilang::-webkit-scrollbar {
            width: 0;
        }
    </style>
    @vite('resources/css/app.css')
    @vite('resources/js/page.js')



</head>

<body class="font-poppins w-screen flex flex-row  max-h-svh ">
    <header class="w-48">
        <x-navside></x-navside>
    </header>
    <main class="h-screen w-screen bg-slate-200 dark:bg-gray-900  flex flex-col ">
        <x-navbar></x-navbar>
        {{ $slot }}
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sectionSearch = document.getElementById("sectionSearch");
            const searchBooks = document.getElementById("searchBooks");
            let liElements = document.querySelectorAll("ul#ListNav li");

            liElements.forEach(a => {
                a.classList.add("*:flex", "*:flex-row", "*:items-center", "*:gap-4", "*:text-slate-950",
                    "*:dark:text-slate-50", "font-semibold", "opacity-70", "cursor-pointer", "*:px-4",
                    "*:py-2"
                );
                let span = a.querySelector('span');

                span.classList.add("p-[4px]", "rounded-md", "bg-slate-300", "transition", "ease-in-out");

                let svg = a.querySelector('svg');

                svg.classList.add("fill-slate-950", "transition", "ease-in-out");
                a.addEventListener('mouseenter', () => {
                    svg.classList.add("fill-slate-50");
                    svg.classList.remove("fill-slate-950");
                    span.classList.remove("bg-slate-300");
                    span.classList.add("bg-sky-600");
                    a.classList.remove("opacity-70");
                });

                a.addEventListener('mouseleave', () => {
                    span.classList.add("bg-slate-300");
                    svg.classList.add("fill-slate-950");
                    svg.classList.remove("fill-slate-50");
                    span.classList.remove("bg-sky-600");
                    a.classList.add("opacity-70");
                });
            });

            let aElements = document.querySelectorAll("ul#ListNav a");
            let svg = document.querySelectorAll('ul#ListNav a svg');
            let span = document.querySelectorAll('ul#ListNav a span');


            for (let index = 0; index < aElements.length; index++) {


                if (aElements[index].getAttribute('href').replace('/', '') === "{{ Request()->path() }}") {
                    span[index].classList.add("spanNavside");
                    liElements[index].classList.add("opacityNavside");
                    svg[index].classList.add("svgNavside");
                }
            }

            if (window.location.href.split('/').pop() === "TambahBuku") {
                span[3].classList.add("spanNavside");
                liElements[3].classList.add("opacityNavside");
                svg[3].classList.add("svgNavside");
            }

            if (window.location.href.split('/')[3] === "EditBuku") {
                span[3].classList.add("spanNavside");
                liElements[3].classList.add("opacityNavside");
                svg[3].classList.add("svgNavside");
            }
            if (window.location.href.split('/').pop() === "EditProfile") {
                span[4].classList.add("spanNavside");
                liElements[4].classList.add("opacityNavside");
                svg[4].classList.add("svgNavside");
            }

            const buku = document.querySelectorAll('div#buku');
            buku.forEach(div => {
                let buttons = div.querySelector('div#buttonSinopsis');
                let sinopsis = div.querySelector('p#sinopsis');
                let svgSinopsis = div.querySelector('svg#svgSinopsis');
                buttons.addEventListener('click', () => {
                    sinopsis.classList.toggle('hidden');
                    svgSinopsis.classList.toggle('rotate-90');
                });

            });
        });
    </script>
</body>


</html>
