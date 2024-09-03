<section id="sectionSearch" class="bg-slate-50 dark:bg-slate-800 dark:text-slate-50 text-slate-950 flex flex-row h-14 items-center justify-between">
    <form action=""  id="searchBooks">

        <input name="search" type="text" autocomplete="off" placeholder="Search " class="bg-slate-200 ml-4 px-3 py-1.5 w-80 outline-none focus:outline-none rounded-md transition ease-out focus:ring-2 focus:ring-sky-500 text-slate-900 dark:bg-slate-900 dark:text-slate-50">
        <button  class="px-4 py-1 ml-2 bg-sky-600 rounded-md hover:bg-sky-400 text-slate-50 font-semibold ease-in transition">Cari</button>
    </form>
        <div class="flex flex-row gap-5 items-center rounded-full m-5">
            <p class="text-center font-semibold ">Hello, {{$user->name}}</p>
            <a href="/pengaturan"><img style="height: 2rem ; width:2rem;"  src="upload/fotoProfile/" alt="user-photo" class="ring-1 dark:ring-slate-50
            ring-slate-950 rounded-full cursor-pointer"></a>
        </div>
    </section>
