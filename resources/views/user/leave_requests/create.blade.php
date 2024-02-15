<x-app-layout>
        <!-- component -->
    <div class="p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div>
                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
            @if (!Auth::user()->employee->leave_request_left <= 0)
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                <div class="text-gray-600">
                <p class="font-medium text-lg">Employee Details</p>
                <p>Please fill out all the fields.</p>
                </div>

            <div class="lg:col-span-2">
                <form action="{{ route('profile.leave_request.create') }}" method="post">
                @csrf
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                    <input type="hidden" name="employee_id" value="{{ Auth::user()->employee->id }}">
                        <div class="md:col-span-5">
                            <label for="name">Name</label>
                            <input type="text" disabled name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ Auth::user()->employee->name }}" />
                        </div>
                        <div class="md:col-span-5">
                            <label for="amount_of_days">How many days you'd like to take?</label>
                            <input type="number" name="amount_of_days" id="amount_of_days" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="amount_of_days" required />
                        </div>

                        <div class="md:col-span-5">
                            <label for="reason">Reason</label>
                            <input type="text" name="reason" id="reason" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="im gotta Haji" required/>
                        </div>
                
                        <div class="md:col-span-5 text-right">
                            <div class="inline-flex items-end gap-3">
                            <a href="{{ route('profile.index') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" >Cancel</a>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @else
                <div class="text-gray-600">
                <h1 class="font-medium text-lg">Sorry, your leave requests chance is over</p>
                </div>
            </div>
            @endif
        </div>
    </div>
        </div>
    </div>
    </div>
</x-app-layout>