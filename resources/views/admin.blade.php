<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="relative bg-yellow-50 overflow-hidden max-h-screen">

    <aside class="fixed inset-y-0 left-0 bg-white shadow-md max-h-screen w-60">
        <div class="flex flex-col justify-between h-full">
            <div class="flex-grow">
                <div class="px-4 py-6 text-center border-b">
                    <h1 class="text-xl font-bold leading-none"><span class="text-yellow-700">Evento</span> App</h1>
                </div>
                <div class="p-4">
                    <ul class="space-y-1">
                        <li>
                            <a href="javascript:void(0)"
                                class="flex items-center bg-yellow-200 rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    fill="currentColor" class="text-lg mr-4" viewBox="0 0 16 16">
                                    <path
                                        d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                </svg>Categories
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"
                                class="flex bg-white hover:bg-yellow-50 rounded-xl font-bold text-sm text-gray-900 py-3 px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    fill="currentColor" class="text-lg mr-4" viewBox="0 0 16 16">
                                    <path
                                        d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z" />
                                </svg>Review Events
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"
                                class="flex bg-white hover:bg-yellow-50 rounded-xl font-bold text-sm text-gray-900 py-3 px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    fill="currentColor" class="text-lg mr-4" viewBox="0 0 16 16">
                                    <path
                                        d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z" />
                                </svg>Manage Users
                            </a>
                        </li>
                        <li>
                            <button
                                class="flex bg-white hover:bg-yellow-50 rounded-xl font-bold text-sm text-gray-900 py-3 px-4 gap-4 items-center">
                                <svg width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                        d="M160 80c0-26.5 21.5-48 48-48h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H208c-26.5 0-48-21.5-48-48V80zM0 272c0-26.5 21.5-48 48-48H80c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V272zM368 96h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H368c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48z" />
                                </svg>Stats
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="p-4">
                <button type="button"
                    class="inline-flex items-center justify-center h-9 px-4 rounded-xl bg-gray-900 text-gray-300 hover:text-white text-sm font-semibold transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        class="" viewBox="0 0 16 16">
                        <path
                            d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    </svg>
                </button> <span class="font-bold text-sm ml-2">Logout</span>
            </div>
        </div>
    </aside>

    <main class="ml-60 pt-16 max-h-screen overflow-auto">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="min-h-screen  py-6 flex flex-col justify-center sm:py-12">
                <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                    <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                        <div class="max-w-md mx-auto">
                            <div class="flex items-center space-x-5">
                                <div
                                    class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">
                                    i</div>
                                <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                                    <h2 class="leading-relaxed">Create Category</h2>
                                    <p class="text-sm text-gray-500 font-normal leading-relaxed">Lorem ipsum, dolor sit
                                        amet consectetur adipisicing elit.</p>
                                </div>
                            </div>
                            <div class="divide-y divide-gray-200">
                                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                    <div class="flex flex-col">
                                        <label class="leading-loose">Category name</label>
                                        <input type="text" name="name"
                                            class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                            placeholder="Category name">
                                    </div>
                                    @if (Session::has('categoryadded'))
                                        <p class="text-green-300 text-2xl">{{ Session::get('message') }}</p>
                                    @endif
                                    @if (Session::has('failedcat'))
                                        <p class="text-red-300 text-2xl">{{ Session::get('message') }}</p>
                                    @endif
                                </div>
                                <div class="pt-4 flex items-center space-x-4">
                                    <button type="submit"
                                        class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Create</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="ml-60 pt-6 max-h-screen overflow-auto flex flex-col  gap-5 ">
            <h1 class="font-bold text-5xl">Categories</h1>
            <div class="flex gap-5 flex-wrap">
            @foreach ($data as $category )
                <div class="p-3 rounded-2xl bg-white"><h1 class="catnames">{{$category->name}}</h1>
                    <div class="flex gap-5">
                        <form action="{{route('category.destroy')}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="text" class="hidden" value="{{$category->id}}" name="cat_id">
                            <button type="submit" class="p-2 bg-red-300 rounded-lg">Delete</button>
                    </form>
                        <button  value="{{$category->id}}" class="editcat p-2 bg-green-300 rounded-lg">Edit</button>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </main>


    <div id="category" class="w-[50%]  rounded-xl fixed bottom-[25%] z-50 right-[25%] border border-white-500 p-6 bg-[rgb(246,243,231)]">
        <div class="w-[80%] mt-2 ml-4"><button id="closecat" class="float-right">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512">
                    <path fill="#1f59e0" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm79 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                </svg></button>
        </div>
        <h2 class="text-2xl pb-3 text-black font-semibold">
            Edit Category</h2>
        <form action="">
        <div>
            <div class="flex flex-col  text-white mb-3">
                <label class="text-black" for="name">Name</label>
                <input type="text" id="catname" value="" class="px-3 py-2  focus:border-white-500 focus:outline-none  focus:text-white-500" autocomplete="off">
                <input type="text" id="catid" value=""  autocomplete="off">
                <br>
                <input type="submit"  value="edit" class="px-3 py-2 bg-blue-800 border border-gray-900 focus:border-white-500 focus:outline-none focus:bg-gray-800 focus:text-white-500 rounded-lg" autocomplete="off">
            </div>
        </div>
    </form>
    </div>
</body>

</html>


<script>
let editcat = document.querySelectorAll('.editcat');
let catnames = document.querySelectorAll('.catnames');
for (let index = 0; index < editcat.length; index++) {
    editcat[index].addEventListener("click", e => {
        let id = editcat[index].value;
        let catid = document.getElementById('catid');
        let catname = document.getElementById('catname');
        catid.innerText = id;
        catname.innerText = catnames[index].innerText;
       
    });
}
    

</script>
