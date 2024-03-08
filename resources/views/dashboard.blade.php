<x-app-layout>
    <div class=" flex gap-4 w-full bg-[rgb(246,243,231)] p-2">
        <form class="w-[70%]" action="">
            <input class="w-full rounded-lg" type="search" placeholder="Search by title">
        </form>

        <select class="w-[20%] rounded-lg" name="filter" id="">
            <option value="all">all</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

    </div>

    <div>
        <button id="openwallet"
            class="m-4 px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-[rgb(246,243,231)] rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
            View Reserved Events
        </button>
    </div>
    <div class="flex flex-wrap w-full justify-center gap-3">
        @foreach ($events as $event)
            <div class="max-w-2xl overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                <img class="object-cover w-full h-64" src="{{ asset('images/' . $event->image) }}" alt="Article">

                <div class="p-6">
                    <div>
                        <button value="{{ $event->category->id }}"
                            class="categories text-xs font-medium text-blue-600 uppercase dark:text-blue-400">{{ $event->category->name }}</button>
                        <button
                            class="eventtitle block mt-2 text-xl font-semibold text-gray-800 transition-colors duration-300 transform dark:text-white hover:text-gray-600 hover:underline"
                            tabindex="0" role="link">{{ $event->title }}</button>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center">
                            <div class="flex items-center">
                                <img class="object-cover h-10 rounded-full"
                                    src="{{ asset('images/' . $event->organizer->logo) }}" alt="Avatar">
                                <a href="#" class="mx-2 font-semibold text-gray-700 dark:text-gray-200"
                                    tabindex="0" role="link">{{ $event->organizer->user->name }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex w-[80%] gap-3 m-2">
                    <a href="{{ route('participant.event', ['id' => $event->id]) }}" target="blank"
                        class="inline-flex items-center px-4 py-2 bg-green-500 hover:bg-green-600 text-white text-sm font-medium rounded-md">
                        Discover more
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="w-full flex justify-center items-center m-2 "> {{ $events->links() }}</div>



    <aside id="wallet"
        class="bg-white flex overflow-auto scrollbar-hide flex-col w-[80%] h-screen fixed top-0 left-[-100%]  bg-slate-800 z-10 border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700 p-6">
        <div class="w-[95%] bg-white  ">
            <button class="float-right" id="closewallet"><svg xmlns="http://www.w3.org/2000/svg" height="30"
                    width="24" viewBox="0 0 384 512">
                    <path
                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg></button>
        </div>

        <section class="flex flex-col justify-center gap-3 w-[80%]  text-gray-600 overflow-y-auto">
          @foreach ($reserves as $reserve )
          <div class="max-w-2xl px-8 py-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-between">
                <span class="text-sm font-light text-gray-600 dark:text-gray-400">{{$reserve->event->date}}</span>
                <a class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-300 transform bg-gray-600 rounded cursor-pointer hover:bg-gray-500" tabindex="0" role="button">{{$reserve->status}}</a>
            </div>
        
            <div class="mt-2">
                <a href="#" class="text-xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline" tabindex="0" role="link">{{$reserve->event->title}}</a>
                <p class="mt-2 text-gray-600 dark:text-gray-300">{{$reserve->event->location}}</p>
            </div>
        
            <div class="flex items-center justify-between mt-4">
                @if ($reserve->status=='reserved')
                <button value="{{$reserve->event->id}}" class="ticket px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-300 transform bg-gray-600 rounded cursor-pointer hover:bg-gray-500" tabindex="0" role="link">Get ticket</button>
                @endif
        
                <div class="flex items-center">
                    <img class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block" src="{{asset('images/'.$reserve->event->image)}}" alt="avatar">
                    <a class="font-bold text-gray-700 cursor-pointer dark:text-gray-200" tabindex="0" role="link">{{$reserve->event->organizer->user->name}}</a>
                </div>
            </div>
        </div>
          @endforeach
        </section>
    </aside>

</x-app-layout>
