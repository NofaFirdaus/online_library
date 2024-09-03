<section class="dark:bg-gray-800 m-5    bg-slate-50  h-full  overflow-hidden rounded-lg p-4 gap-1">
    <div class="flex flex-col gap-3 h-full ">
        <div class="flex flex-row justify-between items-center">
            <h1 class="font-semibold text-black flex gap-2 dark:text-white text-lg">{{ $title }} <p>{{$count??''}}</p></h1>

            @if (isset($linkRedirect))
                <a href="/{{ $linkRedirect }}"
                    class="text-xs text-sky-600 p-1 rounded-md bg-sky-200 ring-1 ring-sky-600 hover:bg-sky-600 hover:text-white transition ease-in-out">{{ $linkText }}
                </a>
            @endif

        </div>
        {{$genre??''}}
        <hr class="border-b-[1px] border-slate-950 dark:border-slate-50 opacity-40 ">
        <div class=" flex flex-col   justify-center hilang  h-full overflow-hidden overflow-y-scroll ">
            <div id="container-book"
                class="*:dark:bg-slate-700   *:bg-slate-100  *:dark:text-slate-50  flex flex-col gap-[16px]  w-full  h-full     *:h-max *:rounded-md  ">





                {{$bukuCard}}


            </div>
        </div>
        <div>{{$paginate??''}}</div>
    </div>
</section>
