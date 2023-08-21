<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold">Witaj w naszym serwisie</h1>
                    <h2 class="text-xl font-bold">Wybierz interesujący cię dział</h2>
                </div>
            
            </div>
            <div class="flex flex-wrap items-center">
                <div class="max-w-md py-4 px-6 mx-2 bg-white shadow-md shadow-green-700 rounded-lg my-20">
                    <div class="flex justify-center md:justify-end -mt-16">
                    <img class="w-20 h-20 object-cover rounded-full border-2 border-lime-500" src="https://images.unsplash.com/photo-1499714608240-22fc6ad53fb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80">
                    </div>
                    <div>
                    <h2 class="text-gray-800 text-3xl font-semibold">Design Tools</h2>
                    <p class="mt-2 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae dolores deserunt ea doloremque natus error, rerum quas odio quaerat nam ex commodi hic, suscipit in a veritatis pariatur minus consequuntur!</p>
                    </div>
                    <div class="flex justify-end mt-4">
                    <a href="#" class="text-xl font-medium text-lime-600">John Doe</a>
                    </div>
                </div>
                <div class="max-w-md py-4 px-6 mx-2 bg-white shadow-md shadow-green-700 rounded-lg my-20">
                    <div class="flex justify-center md:justify-end -mt-16">
                    <img class="w-20 h-20 object-cover rounded-full border-2 border-lime-500" src="https://images.unsplash.com/photo-1499714608240-22fc6ad53fb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80">
                    </div>
                    <div>
                    <h2 class="text-gray-800 text-3xl font-semibold">Design Tools</h2>
                    <p class="mt-2 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae dolores deserunt ea doloremque natus error, rerum quas odio quaerat nam ex commodi hic, suscipit in a veritatis pariatur minus consequuntur!</p>
                    </div>
                    <div class="flex justify-end mt-4">
                    <a href="#" class="text-xl font-medium text-lime-600">John Doe</a>
                    </div>
                </div>
                <div class="max-w-md py-4 px-6 mx-2 bg-white shadow-md shadow-green-700 rounded-lg my-20">
                    <div class="flex justify-center md:justify-end -mt-16">
                    <img class="w-20 h-20 object-cover rounded-full border-2 border-lime-500" src="https://images.unsplash.com/photo-1499714608240-22fc6ad53fb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80">
                    </div>
                    <div>
                    <h2 class="text-gray-800 text-3xl font-semibold">Design Tools</h2>
                    <p class="mt-2 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae dolores deserunt ea doloremque natus error, rerum quas odio quaerat nam ex commodi hic, suscipit in a veritatis pariatur minus consequuntur!</p>
                    </div>
                    <div class="flex justify-end mt-4">
                    <a href="#" class="text-xl font-medium text-lime-600">John Doe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
