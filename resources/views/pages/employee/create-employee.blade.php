<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-3 sm:p-12">
        <div class="mx-auto max-w-lg px-6 py-12 bg-white border-0 shadow-lg rounded sm:rounded-2xl">
            <div class="mx-auto mb-4">
                <h2 class="text-gray-700 text-xl sm:text-3xl font-bold">Recruit New Employee</h2>
                <p class="text-sm sm:text-base text-gray-500">Fill out all the fields.</p>
            </div>
            <form action="{{ route('employee.store') }}" method="post">
                @csrf
                <div class="relative z-0 w-full mb-2">
                    <label class="text-gray-500 text-xs sm:text-sm" for="user">Select User</label>
                    <select id="user"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                        name="user_id">
                        <option disabled>Option</option>
                        @foreach ($user as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('user_id'))
                    <li class="text-red-500">{{$errors->first('user_id')}}</li>
                    @endif
                </div>

                <div class="relative z-0 w-full mb-2">
                    <label class="text-gray-500 text-xs sm:text-sm" for="name">Name</label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        placeholder="Jonathan"
                        required
                        value="{{ old('name') }}"
                        class="pb-2 block text-sm sm:text-base w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200"
                    />
                    @if($errors->has('name'))
                    <li class="text-red-500">{{$errors->first('name')}}</li>
                    @endif
                </div>

                <div class="relative z-0 w-full mb-2">
                    <label class="text-gray-500 text-xs sm:text-sm" for="position">Position</label>
                    <input
                        id="position"
                        type="text"
                        name="position"
                        placeholder="Crewing Lead"
                        required
                        value="{{ old('position') }}"
                        class="pb-2 block text-sm sm:text-base w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200"
                    />
                    @if($errors->has('position'))
                    <li class="text-red-500">{{$errors->first('position')}}</li>
                    @endif
                </div>

                <div class="relative z-0 w-full mb-2">
                    <label class="text-gray-500 text-xs sm:text-sm" for="base_salary">Current Salary (Rp.)</label>
                    <input
                        id="base_salary"
                        type="number"
                        name="base_salary"
                        placeholder="Rp."
                        required
                        value="{{ old('base_salary') }}"
                        class="pb-2 block text-sm sm:text-base w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200"
                    />
                    @if($errors->has('base_salary'))
                    <li class="text-red-500">{{$errors->first('base_salary')}}</li>
                    @endif
                </div>


                <button
                    id="button"
                    type="submit"
                    class="px-4 py-2 mt-3 text-xs text-lg text-white transition-all duration-150 ease-linear rounded shadow outline-none bg-blue-500 hover:bg-blue-600 hover:shadow-lg focus:outline-none mb-3"
                >
                    Recruit Employee
                </button>
                <a href="{{ route('employees.index') }}" class="text-xs bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">Cancel</a>
            </form>
        </div>
    </div>
</x-app-layout>

