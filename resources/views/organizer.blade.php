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
      
                <form action="{{route('event.store')}}" method="POST">
                    @csrf
                <div class="lg:col-span-2">
                  <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                    <div class="md:col-span-5">
                      <label for="title">Event Title</label>
                      <input type="text" name="title" id="title" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                    </div>
      
                    <div class="md:col-span-5">
                      <label for="Description">Description</label>
                      <input type="textarea" name="description" id="Description" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                    </div>
                    <div class="md:col-span-5">
                        <label for="Image">Image</label>
                        <input type="file" name="Image" id="Image" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                      </div>
                    <div class="md:col-span-3">
                      <label for="Location">Location</label>
                      <input type="text" name="Location" id="Location" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                    </div>
      
                    <div class="md:col-span-2">
                      <label for="Capacity">Capacity</label>
                      <input type="text" name="capacity" id="Capacity" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                    </div>
      
                    <div class="md:col-span-5">
                      <label for="Date">Date</label>
                      <div class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                        <input name="date" id="Date" type="date" placeholder="Country" class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent" value="" />
                      </div>
                    </div>
                    <div class="md:col-span-5">
                        <label for="Category">Category</label>
                        <div class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                            <select name="Category" id="Category" class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent">
                                <option  class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent" selected disabled hidden>select a category</option>
                                @foreach ( $data as $category )
                                <option  class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent">{{$category->name}}</option>
                                @endforeach
                            </select> 
                        </div>
                    </div>
      
                    <div class="md:col-span-5">
                      <div class="inline-flex items-center">
                        <input type="checkbox" name="automatic_res" id="automatic_res" class="form-checkbox"/>
                        <label for="automatic_res" class="ml-2">Automatic Reservation</label>
                      </div>
                    </div> 
                    <div class="md:col-span-5 text-right">
                      <div class="inline-flex items-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
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

</x-app-layout>