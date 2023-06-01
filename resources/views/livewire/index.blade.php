

<div>
    @include('livewire.edit')
    @include('livewire.add')
    <div class="flex justify-evenly">

        <div class="px-6 lg:px-8">
            <div class="sm:flex sm:items-center mt-5">
                <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">TodoList</h1>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button data-modal-target="CreateTodoModal" data-modal-toggle="CreateTodoModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Add Todo
              </button>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-my-2 -mx-6 overflow-x-auto lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        {{-- Display Table --}}
                        @if(session()->has('message'))
                            <div id="alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                <span class="block sm:inline">{{ session('message') }}</span>
                            </div>
                            <script>
                                setTimeout(function() {
                                    var element = document.getElementById("alert");
                                    element.parentNode.removeChild(element);
                                }, 2000);
                            </script>
                        @endif
                    <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                        <th scope="col" class="py-3.5 pl-6 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">List of Todo</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Actions</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-6 sm:pr-0">
                            <span class="sr-only">Edit</span>
                        </th>
                        </tr>
                    </thead>
                @foreach($todolists as $todolist)
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr>
                            <input type="hidden" name="ids" wire:model="ids">

                        <td class="whitespace-nowrap py-4 pl-6 pr-3 text-sm sm:pl-0">
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full" src="{{Storage::url($todolist->image)}}" alt="">
                                </div>

                            <div class="ml-4">
                                <div class="font-medium text-gray-900">{{$todolist->title}}</div>
                                <div class="text-gray-500">{{$todolist->description}}</div>
                            </div>
                            </div>
                        </td>

                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        @if($todolist->completed == 1)
                            <span class="
                                inline-flex rounded-full
                                 bg-green-100 text-green-800
                                px-2 text-xs font-semibold leading-5">
                                done
                            </span>
                        @else
                            <span class="
                                inline-flex rounded-full
                                bg-red-100 text-red-800
                                px-3 text-xs font-semibold leading-5">
                                undone
                            </span>
                        @endif
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-6 text-right text-sm font-medium sm:pr-0">

                            <button data-modal-target="EditTodoModal"
                            data-modal-toggle="EditTodoModal"
                            class="inline-flex items-center rounded border border-transparent bg-blue-600
                             px-2.5 py-1.5 text-xs font-medium
                             text-white shadow-sm
                             hover:bg-blue-700
                             focus:outline-none
                             focus:ring-2 focus:ring-blue-500
                             focus:ring-offset-2"
                            type="button"
                            wire:click.prevent="edit({{$todolist->id}})">
                                Edit
                            </button>


                        @if($todolist->completed == 1)
                            <button type="button" class="inline-flex items-center rounded border border-transparent bg-yellow-600
                                px-2.5 py-1.5 text-xs font-medium
                                text-white shadow-sm
                                hover:bg-yellow-700
                                focus:outline-none
                                focus:ring-2 focus:ring-red-500
                                focus:ring-offset-2"
                                wire:click.prevent="markAsInComplete({{$todolist->id}})">
                                Undone
                            </button>
                        @else
                            <button type="button" class="inline-flex items-center rounded border border-transparent bg-gray-600
                                px-2.5 py-1.5 text-xs font-medium
                                text-white shadow-sm
                                hover:bg-gray-700
                                focus:outline-none
                                focus:ring-2 focus:ring-red-500
                                focus:ring-offset-2"
                                wire:click.prevent="markAsComplete({{$todolist->id}})">
                                Done
                            </button>
                        @endif

                            <button type="button" class="inline-flex items-center rounded border border-transparent bg-red-600
                             px-2.5 py-1.5 text-xs font-medium
                             text-white shadow-sm
                             hover:bg-red-700
                             focus:outline-none
                             focus:ring-2 focus:ring-red-500
                             focus:ring-offset-2"
                             wire:click.prevent="delete({{$todolist->id}})">
                                Delete
                            </button>
                        </td>
                        </tr>
                    </tbody>
                @endforeach
                    </table>
                </div>
                </div>
            </div>


            {{-- Pagination Starts --}}
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                    <div class="flex-1 flex justify-between sm:hidden">
                        {{ $todolists->links() }}
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700 leading-5">
                                Showing
                                <span class="font-medium">{{ $todolists->firstItem() }}</span>
                                to
                                <span class="font-medium">{{ $todolists->lastItem() }}</span>
                                of
                                <span class="font-medium">{{ $todolists->total() }}</span>
                                results
                            </p>
                        </div>
                        <div>
                            {{ $todolists->links() }}
                        </div>
                    </div>
                </div>
                {{-- Pagination Ends --}}
        </div>
    </div>
</div>
