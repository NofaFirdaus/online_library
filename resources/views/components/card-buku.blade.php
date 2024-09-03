<div id='buku' class='p-3 w-full *:justify-between *:items-center *:flex *:flex-row'>
    <div class="relative">
        <div class='flex items-center gap-4 flex-row'>
            <img src='' alt='' class='card'>
            <div class='flex flex-col *:opacity-85 gap-3'>
                <p class='font-semibold text-lg'>Judul : {{ $title }}

                </p>
                <p class='font-medium text-base'>Author : {{ $author }}

                </p>
                <p class='font-light text-base'>Genre : {{ $genre }}

                </p>
                <p class='font-light text-base'> Diunggah : {{ $createdAt }}

                </p>
            </div>
        </div>
        <div id='buttonSinopsis'
            class='mr-4 self-end gap-3 left-[48%] absolute items-center flex flex-row justify-self-center text-base text-sky-500 font-semibold hover:text-sky-300 transition ease-in cursor-pointer'>
            <span>Sinopsis</span>
            <svg id='svgSinopsis' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                class='bi bi-caret-right-fill transition ease-in' viewBox='0 0 16 16'>
                <path
                    d='m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z' />
            </svg>
        </div>
        <div class='flex flex-row items-center gap-5'>
            @if (isset($iconDeleteBuku))
                </form>

                <form method="POST" id='delete-form-{{ $slug }}' action="/DeleteBuku/{{ $slug }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete('{{ $title }}','{{ $slug }}')"
                        class="w-[5rem] flex items-center justify-center  h-[2rem] bg-red-500 transition ease-in hover:bg-red-300 hover:ring-[4px] hover:ring-red-500 rounded-md text-slate-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                            class="bi bi-trash" viewBox="0 0 16 16">
                            <path
                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                            <path
                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                        </svg>
                    </button>
                </form>



                <a href="/EditBuku/{{ $slug }}"
                    class="w-[5rem] flex items-center justify-center  h-[2rem] bg-sky-500 transition ease-in hover:bg-sky-300 hover:ring-[4px] hover:ring-sky-500 rounded-md text-slate-50">
                    <h1>Edit</h1>
                </a>
            @else
              {{$slot}}
            @endif

            <a href='' type='application/pdf' target='_blank'
                class='bg-sky-500 transition ease-in hover:bg-sky-300 hover:ring-[4px] hover:ring-sky-500 w-[5rem] h-[2rem] flex justify-center items-center rounded-md'>
                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' class='bi bi-book fill-slate-50'
                    viewBox='0 0 16 16'>
                    <path
                        d='M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783' />
                </svg>
            </a>
        </div>
    </div>
    <hr id='garisSinopsis' class='mt-3 border-b-[1px] border-slate-950 dark:border-slate-50 opacity-40'>
    <div>
        <p id='sinopsis' class='hidden text-wrap px-7 py-1'>
            {{ $deskripsi }}
        </p>
    </div>
</div>
