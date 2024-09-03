<div id="cardMessage" class="transition-all ease-out top-[5%] left-[50%] translate-x-[-50%] flex items-center justify-center    absolute">

    <div
        class="flex items-center p-4 mb-4 text-green-800 rounded-lg fill-green-500 bg-blue-50 dark:bg-slate-950 dark:text-green-500  "
        role="alert">
        <svg class="flex-shrink-0 w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
    <div class="ms-3 text-sm font-medium ">
            <h1 class="">{{$slot}}</h1>
        </div>
        <button type="button" id="flashMessageButton"
            class="ms-auto -mx-1.5 -my-1.5 bg-green-50  rounded-lg focus:ring-2 focus:ring-green-500 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-slate-950  dark:hover:bg-gray-700"
            data-dismiss-target="#alert-1" aria-label="Close">
            <svg class="w-3 h-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                <path class="stroke-green-500" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>

</div>
