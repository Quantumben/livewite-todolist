<div>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css"  rel="stylesheet" />


  <!-- Main modal -->
  <div wire:ignore.self id="EditTodoModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
      <div class="relative w-full h-full max-w-2xl md:h-auto">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal body -->
              <div class="p-6 space-y-6">
                  {{-- Form Started --}}
 <form class="space-y-6">
    <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:p-6">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="mt-5 space-y-6 md:col-span-2 md:mt-0">
          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3 sm:col-span-2">
              <label for="title" class="block text-sm font-medium text-gray-700">Todo Title</label>
              <div class="mt-1 flex rounded-md shadow-sm">
                <input type="text" wire:model="title" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Enter Todo Title">
              </div>

              @error('title')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
          </div>

          <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Todo Description</label>
            <div class="mt-1">
              <textarea  wire:model="description" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Enter Todo Description"></textarea>
            </div>
            @error('description')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>
          
        </div>
      </div>
    </div>
  </form>
{{-- Form Ends --}}

              </div>
              <!-- Modal footer -->
              <div class="flex items-center p-4 space-x-2 border-gray-200 rounded-b dark:border-gray-600">
                  <button  wire:click.prevent="update()" type="button" class="text-white
                  bg-blue-700
                  hover:bg-blue-800
                  focus:ring-4
                  focus:outline-none
                  focus:ring-blue-300
                  font-medium rounded-lg
                  text-sm px-5 py-2.5
                  text-center dark:bg-blue-600
                  dark:hover:bg-blue-700
                  dark:focus:ring-blue-800
                  ">Update Todo</button>
                  <button data-modal-hide="EditTodoModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
              </div>
          </div>
      </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
  </div>
