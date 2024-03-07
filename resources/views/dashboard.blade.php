<x-app-layout>
   <div class=" flex gap-4 w-full bg-[rgb(246,243,231)] p-2">
    <form class="w-[70%]" action="">
        <input class="w-full rounded-lg" type="search" placeholder="Search by title">
    </form>

    <select class="w-[20%] rounded-lg" name="filter" id="">
        <option value="all">all</option>
        @foreach ($categories as $category )
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>

   </div>
    
<h1>Discover Our Events</h1>
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
                <div 
                class="flex w-[80%] gap-3 m-2">
                    <a
                    href="{{route('participant.event', ['id'=>$event->id])}}" target="blank"
                        class="inline-flex items-center px-4 py-2 bg-green-500 hover:bg-green-600 text-white text-sm font-medium rounded-md">
                        Discover more
                </a>
                </div>
            </div>
    @endforeach
        </div>
       <div class="w-full flex justify-center items-center m-2 "> {{$events->links()}}</div>
</x-app-layout>
