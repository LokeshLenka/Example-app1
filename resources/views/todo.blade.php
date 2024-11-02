<x-app-layout>
    <div class="z-0 bg-sky-50 dark:bg-gray-800 w-full flex items-start justify-center min-h-screen">
        <div class=" z-0 container bg-slate-50 dark:bg-gray-700 rounded-lg shadow-lg w-1/2 flex items-center justify-center mt-12"
            style="">
            <form class="container m-2" method="post" action="{{ route('todo.store') }}">
                @csrf
                <div class="grid grid-cols-1 divide-y w-full m-auto p-auto">
                    <div class="flex justify-center">
                        <input type="text" placeholder="Task title" name="tasktitle" required
                            class="dark:bg-gray-800 bg-white p-2 m-2 rounded-md w-11/12 outline-none border-none text-gray-600 dark:text-slate-50">
                    </div>
                    <div class="flex justify-center">
                        <textarea rows="4" placeholder="Task Description" name="description"
                            class="p-2 m-2 dark:bg-gray-800 bg-white rounded-md w-11/12 text-gray-600 dark:text-slate-50 outline-none border-solid border-b-2 border-t-0 border-r-0 border-l-0 border-indigo-500 focus:border-b-2 focus:border-indigo-500 focus:text-gray-600 resize-none"></textarea>
                    </div>
                    <div class="container mx-auto w-full flex justify-center">
                        <div class="grid grid-cols-6 gap-4">
                            <div class="col-span-2 flex justify-center dark:bg-gray-700">
                                <input id="datetime" type="text" name="datetime"
                                    class="p-2 m-2 w-11/12 rounded-md bg-slate-50 dark:bg-gray-700 dark:hover:bg-gray-800 border-2 border-gray-400"
                                    placeholder="Remainder_at">
                            </div>
                            <div class="">
                                <div class="dropdown">
                                    <button type="button" id="priorityButton"
                                        class="bg-slate-50 dark:bg-gray-700 dark:hover:bg-gray-800 p-2 m-2 text-gray-600 dark:text-gray-500 border-2 border-gray-400 rounded-lg flex items-center">Prority<span
                                            class="ml-1"><svg class="w-4 h-4 text-gray-800 dark:text-white"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="2"
                                                height="2" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                                            </svg></span>
                                    </button>
                                    <div class="dropdown-content rounded-lg bg-slate-50 dark:bg-gray-600"
                                        id="priorityDropdown">
                                        <div>
                                            <input type="radio" name="priority" id="radio-1" value="low"
                                                class="text-green-500 bg-slate-50 dark:bg-gray-400 dark:checked:bg-green-500">
                                            <label for="radio-1"
                                                class="text-green-500 dark:text-green-500 p-1 m-1">Low</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="priority" id="radio-1" value="med"
                                                class="text-yellow-500  bg-slate-50 dark:bg-gray-400 dark:checked:bg-yellow-500">
                                            <label for="radio-1" class="text-yellow-500 p-1 m-1">Medium</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="priority" id="radio-1" value="high"
                                                class="text-red-500 bg-slate-50 dark:bg-gray-400 dark:checked:bg-red-500">
                                            <label for="radio-1" class="text-red-500 p-1 m-1">High</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div></div>
                            <div></div>
                            <div class="flex justify-center w-11/12">
                                <button type="submit"
                                    class="bg-indigo-600 p-2 m-2 text-center rounded-lg text-neutral-100 hover:bg-indigo-400"
                                    style="word-wrap:break-word">
                                    <svg class="w-6 h-6 dark:text-gray-800 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M3 4a1 1 0 0 0-.822 1.57L6.632 12l-4.454 6.43A1 1 0 0 0 3 20h13.153a1 1 0 0 0 .822-.43l4.847-7a1 1 0 0 0 0-1.14l-4.847-7a1 1 0 0 0-.822-.43H3Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                @if (session('upload'))
                    <div class="ml-44 text-green-900 bg-green-100 flex items-center justify-center h-10 text-center dark:bg-slate-400 py-2 px-4 rounded-lg  w-1/2"
                        id="uploadmessage">
                        {{ session('upload') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    var uploadmessage = document.getElementById('uploadmessage');
    setTimeout(() => {
        uploadmessage.style.display = 'none';
    }, 3000);
</script>
