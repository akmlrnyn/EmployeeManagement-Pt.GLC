<x-app-layout>
        <!-- component -->
    <div class="p-3 sm:p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div>
                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                <div class="text-gray-600">
                <p class="font-medium text-base sm:text-lg">Create Permission</p>
                <p class="text-xs sm:text-sm">Please fill out all the fields.</p>
                </div>

            <div class="lg:col-span-2">
                <form action="{{ route('profile.permission.create') }}" method="post">
                @csrf
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 text-xs sm:text-sm">
                    <input type="hidden" name="employee_id" value="{{ Auth::user()->employee->id }}">
                        <div class="md:col-span-5">
                            <label for="name">Name</label>
                            <input type="text" disabled name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 text-sm" value="{{ Auth::user()->employee->name }}" />
                        </div>

                        <div class="md:col-span-5">
                            <label for="amount_of_times ">Permits</label>
                            <input type="number" name="amount_of_times" placeholder="Permits ( Minutes )" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 text-sm" value="" placeholder="Write your reason for taking permit" required/>
                        </div>

                        <div class="md:col-span-5">
                            <label for="reason">Reason</label>
                            <input type="text" name="reason" id="reason" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 text-sm" value="" placeholder="Write your reason..." required/>
                        </div>
                
                        <div class="md:col-span-5 text-right">
                            <div class="inline-flex items-end gap-3">
                            <a href="{{ route('profile.index') }}" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded" >Cancel</a>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @if (Auth::user()->employee->qpa <= 80)
                <div class="text-gray-600">
                <h1 class="font-medium text-lg">Your QPA Score is {{ Auth::user()->employee->qpa  }}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
        </div>
    </div>
    </div>
</x-app-layout>