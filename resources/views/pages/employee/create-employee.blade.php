<x-app-layout>
    <!-- component -->
    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
    <div class="container max-w-screen-lg mx-auto">
        <div>
        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
            <div class="text-gray-600">
                <p class="font-medium text-lg">Employee Details</p>
                <p>Please fill out all the fields.</p>
            </div>

            <div class="lg:col-span-2">
                <form action="{{ url('/employees') }}" method="post">
                @csrf
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                        <div class="md:col-span-5">
                            <label for="user">User</label>
                            <select id="user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1" name="user_id">
                            <option selected>Option</option>
                            @foreach ($user as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="md:col-span-5">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="John Doe" />
                        </div>

                        <div class="md:col-span-5">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="08**********" />
                        </div>
                
                        <div class="md:col-span-5 text-right">
                            <div class="inline-flex items-end">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</x-app-layout>