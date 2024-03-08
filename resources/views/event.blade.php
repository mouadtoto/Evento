<x-app-layout>
<section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">{{$event->title}}</h1>

        <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
            <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96" src="{{asset('images/'.$event->image)}}"alt="">

            <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                <p class="text-sm text-blue-500 uppercase">{{$event->category->name}}</p>

                <button href="#" class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline dark:text-white">
                    <span>Capacity : </span><br>{{$event->capacity}}
                </button>

                <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 md:text-sm">
                    {{$event->description}}
                </p>

                <div class="flex items-center mt-6">
                    <img class="object-cover object-center w-10 h-10 rounded-full" src="{{asset('images/'.$event->organizer->logo)}}" alt="">
                    <div class="mx-4">
                        <h1 class="text-sm text-gray-700 dark:text-gray-200">{{$event->organizer->user->name}}</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{$event->date}}</p>
                    </div>
                    @if ($isresreved==0)
                    <a href="{{route('reserve.event', ['id'=>$event->id])}}" class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline dark:text-white">
                        Reserve
                    </a>
                    @else
                    <h1>you have already reserved this event</h1>    
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
</x-app-layout>