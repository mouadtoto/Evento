<x-app-layout>
    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div>
                <h2 class="font-semibold text-xl text-gray-600">Add an Event </h2>
                <p class="text-gray-500 mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, ut!</p>

                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">Event Details</p>
                            <p>Please fill out all the fields.</p>
                        </div>

                        <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="lg:col-span-2">
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-5">
                                        <label for="title">Event Title</label>
                                        <input type="text" name="title" 
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                    </div>

                                    <div class="md:col-span-5">
                                        <label for="Description">Description</label>
                                        <input type="textarea" name="description" id="Description"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                    </div>
                                    <div class="md:col-span-5">
                                        <label for="Image">Image</label>
                                        <input type="file" name="image" id="Image"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                    </div>
                                    <div class="md:col-span-3">
                                        <label for="Location">Location</label>
                                        <input type="text" name="location" id="Location"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                            placeholder="" />
                                    </div>

                                    <div class="md:col-span-2">
                                        <label for="Capacity">Capacity</label>
                                        <input type="text" name="capacity" id="Capacity"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                            placeholder="" />
                                    </div>

                                    <div class="md:col-span-5">
                                        <label for="Date">Date</label>
                                        <div
                                            class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                                            <input name="date" id="Date" type="date"
                                                class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent"
                                                value="" />
                                        </div>
                                    </div>
                                    <div class="md:col-span-5">
                                        <label for="Category">Category</label>
                                        <div
                                            class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                                            <select name="Category" id="Category"
                                                class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent">
                                                <option
                                                    class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent"
                                                    selected disabled hidden>select a category</option>
                                                @foreach ($data as $category)
                                                    <option value="{{ $category->id }}"
                                                        class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent">
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="md:col-span-5">
                                        <div class="inline-flex items-center">
                                            <input type="checkbox" name="automatic_res" id="automatic_res"
                                                class="form-checkbox" />
                                            <label for="automatic_res" class="ml-2">Automatic Reservation</label>
                                        </div>
                                    </div>
                                    <div class="md:col-span-5 text-right">
                                        <div class="inline-flex items-end">
                                            <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                                        </div>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

@foreach ($events as $event)
    <div class="flex flex-wrap w-full justify-center">
        <div class="max-w-2xl overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <img class="object-cover w-full h-64" src="{{ asset('images/' . $event->image) }}" alt="Article">

            <div class="p-6">
                <div>
                    <button value="{{ $event->category->id }}"
                        class="categories text-xs font-medium text-blue-600 uppercase dark:text-blue-400">{{ $event->category->name }}</button>
                        <button 
                          class="capacities text-xs font-medium text-black uppercase dark:text-blue-400">{{ $event->capacity }}</button>    
                    <button
                        class="eventtitle block mt-2 text-xl font-semibold text-gray-800 transition-colors duration-300 transform dark:text-white hover:text-gray-600 hover:underline"
                        tabindex="0" role="link">{{ $event->title }}</button>
                        <button 
                          class="locations text-xs font-medium text-black uppercase dark:text-blue-400">{{ $event->location }}</button> 
                    <p class="eventdesc mt-2 text-sm text-gray-600 dark:text-gray-400">{{ $event->description }}</p>
                </div>

                <div class="mt-4">
                    <div class="flex items-center">
                        <div class="flex items-center">
                            <img class="object-cover h-10 rounded-full"
                                src="{{ asset('images/' . $event->organizer->logo) }}" alt="Avatar">
                            <a href="#" class="mx-2 font-semibold text-gray-700 dark:text-gray-200"
                                tabindex="0" role="link">{{ $event->organizer->user->name }}</a>
                        </div>
                        <span class="eventdate mx-1 text-xs text-gray-600 dark:text-gray-300">{{ $event->date }}</span>
                    </div>
                </div>
            </div>
            <div class="flex w-[80%] gap-3 m-2">
                <button
                value="{{$event->id}}"
                    class="editevent inline-flex items-center px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                    </svg>

                    edit
                </button>
                <button
                value="{{$event->id}}"
                    class="inline-flex items-center px-4 py-2 bg-green-500 hover:bg-green-600 text-white text-sm font-medium rounded-md">
                    stats
                </button>

                <a href="{{route('event.destroy' , ['id'=>$event->id])}}"
                    class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>

                    Delete
                  </a>
            </div>
        </div>
@endforeach
    </div>


    <div id="event"
        class="w-[50%] hidden rounded-xl fixed bottom-[15%] z-50 right-[25%] border border-white-500 p-6 bg-[rgb(246,243,231)]">
        <div class="w-[80%] mt-2 ml-4"><button id="closecat" class="float-right">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512">
                    <path fill="#1f59e0"
                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm79 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                </svg></button>
        </div>
        <h2 class="text-2xl pb-3 text-black font-semibold">
            Edit Event</h2>
        <form action="{{ route('event.update') }}" method="POST">
            @csrf
            <div>
                <div class="flex flex-col  text-white mb-3">
                    <label class="text-black" for="name">title</label>
                    <input type="text" id="title" value="" name="edittitle" class="px-3 py-2 text-black"
                        autocomplete="off">
                    <input type="text" id="eventid" value="" name="editid" class="text-black hidden"
                        autocomplete="off">
                        <label class="text-black" for="name">Description</label>
                    <input type="text" id="description" value="" name="editdescription" class="px-3 py-2 text-black"
                        autocomplete="off">
                        <label class="text-black" for="name">location</label>
                    <input type="text" id="location" value="" name="editlocation" class="px-3 py-2 text-black"
                        autocomplete="off">
                        <label class="text-black" for="name">capacity</label>
                    <input type="text" id="capacity" value="" name="editcapacity" class="px-3 py-2 text-black"
                        autocomplete="off">
                        <label class="text-black" for="name">date</label>
                    <input type="date" id="date" value="" name="editdate" class="px-3 py-2 text-black"
                        autocomplete="off">
                        <label class="text-black" for="category">category</label>
                        <select name="editcategory" class="px-3 py-2 text-black">
                          <option id="category" value="" selected hidden></option>
                          @foreach ($data as $category )
                          <option value="{{$category->id}}" class="px-3 py-2 text-black">{{$category->name}}</option>
                          @endforeach
                        </select>
                    <br>
                    <input type="submit" value="edit"
                        class="px-3 py-2 bg-blue-800 border border-gray-900 focus:border-white-500 focus:outline-none focus:bg-gray-800 focus:text-white-500 rounded-lg"
                        autocomplete="off">
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
