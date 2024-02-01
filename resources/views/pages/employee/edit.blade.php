<x-app-layout>
    <!-- component -->
    <div class=" p-6 bg-gray-100 flex items-center justify-center">
    <div class="container max-w-screen-lg mx-auto">
        <div>
        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
            <div class="text-gray-600">
                <p class="font-medium text-2xl">Edit Staff Details</p>
                <p>Fill out the fields.</p>
            </div>

            <div class="lg:col-span-2">
                <form action="{{ route('employee.update', $staff->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                        <div class="md:col-span-5">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('name') ?? $staff->name }}"  />
                        </div>

                        <div class="md:col-span-5">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('phone') ?? $staff->phone }}" />
                        </div>

                        <div class="md:col-span-5">
                            <label for="position">Position</label>
                            <input type="text" name="position" id="position" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('position') ?? $staff->position }}" />
                        </div>
                        <div class="md:col-span-5">
                            <label for="base_salary">Base Salary (Rp)</label>
                            <input type="number" name="base_salary" id="base_salary" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('base_salary') ?? $staff->base_salary }}"  />
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