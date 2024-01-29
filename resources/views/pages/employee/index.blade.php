<x-app-layout>
  <div class="w-4/5 mx-auto mt-4">
  <h2 class="text-gray-700 text-3xl font-bold">All Employees </h2>
  <p>The workers here</p>
    <div
      class="bg-white shadow-md rounded-md overflow-hidden mx-auto mt-5"
    >
      <div class="bg-gray-200 py-2 px-4">
        <h2 class="text-xl font-bold text-gray-800">Employee list</h2>
        <a href="{{ route('employees.create') }}" class="text-blue-700">+ Recriut New Employee</a>
      </div>

      <ul class="divide-y divide-gray-200">
        @php($number = 1)
        @foreach ($employees as $item)
        <li class="flex items-center py-4 px-6">
          <span class="text-gray-700 text-lg font-medium mr-4">{{ $number }}</span>
          <img
            class="w-12 h-12 rounded-full object-cover mr-4"
            src="{{ url('img/icon_avatar.png') }}"
            alt="User avatar"
          />
          <div class="flex-1">
            <h3 class="text-lg font-medium text-gray-800">{{ $item->user->name }}</h3>
            <p class="text-gray-600 text-base">{{ $item->position }}</p>
          </div>
          <div>
            <a href="{{ route('employees.show', $item->id) }}">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Show</button>
            </a>

            </a>
          </div>
        </li>
        @php($number++)
        @endforeach
      </ul>
    </div>
  </div>

</x-app-layout>