    // const toggleSide = document.getElementById("toggleSide");
    // const tes = document.querySelector("div#container-book>div#tes");
    // toggleSide.addEventListener("click",()=>{
    //     document.getElementById("sideMain").classList.add("hidden");
    // });
    // tes.addEventListener("click",()=>{
    //     document.getElementById("sideMain").classList.remove("hidden");
    // });
    const buku = document.querySelectorAll('div#buku');
    buku.forEach(div => {
        let buttons = div.querySelector('div#buttonSinopsis');
        let sinopsis = div.querySelector('p#sinopsis');
        let svgSinopsis = div.querySelector('svg#svgSinopsis');
        buttons.addEventListener('click',()=>{
            sinopsis.classList.toggle('hidden');
            svgSinopsis.classList.toggle('rotate-90');
        });

    });
    console.log('hello world');

    console.log(buku);
