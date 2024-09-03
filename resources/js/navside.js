document.addEventListener("DOMContentLoaded", function () {

    const sectionSearch = document.getElementById("sectionSearch");
    const searchBooks = document.getElementById("searchBooks");
    let liElements = document.querySelectorAll("ul#ListNav li");

    liElements.forEach(a => {
        a.classList.add("*:flex", "*:flex-row", "*:items-center", "*:gap-4", "*:text-slate-950", "*:dark:text-slate-50", "font-semibold", "opacity-70", "cursor-pointer", "*:px-4", "*:py-2"
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

    // for (let index = 0; index < aElements.length; index++) {
    //     if (aElements[index].getAttribute('href').replace('./', '') === activeNavside) {
    //         span[index].classList.add("spanNavside");
    //         liElements[index].classList.add("opacityNavside");
    //         svg[index].classList.add("svgNavside");
    //     }
    // }

    if (activeNavside === "editPengaturan.php") {
        sectionSearch.classList.remove("justify-between");
        sectionSearch.classList.add("justify-end");
        searchBooks.classList.add("hidden");
        span[4].classList.add("spanNavside");
        liElements[4].classList.add("opacityNavside");
        svg[4].classList.add("svgNavside");
    }
    const ab =true
    if (activeNavside === "pengaturan.php") {
        searchBooks.classList.add("hidden");
        sectionSearch.classList.remove("justify-between");
        sectionSearch.classList.add("justify-end");
    }
    if (activeNavside === "myCollection.php") {
        sectionSearch.classList.remove("justify-between");
        sectionSearch.classList.add("justify-end");
        searchBooks.classList.add("hidden");
        span[3].classList.add("spanNavside");
        liElements[3].classList.add("opacityNavside");
        svg[3].classList.add("svgNavside");
    }
});







