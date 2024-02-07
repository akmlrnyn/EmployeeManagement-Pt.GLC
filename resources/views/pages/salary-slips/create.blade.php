<x-app-layout>
  <div class="w-4/5 mx-auto mt-4">
        <h2 class="text-gray-700 text-3xl font-bold">Choose Staff </h2>
        <p>To make salary slip</p>

<ul class="divide-y divide-gray-200 bg-white mx-auto my-5 rounded-lg shadow-lg">
        @php($number = 1)
        @foreach ($staffs as $item)
        <li class="flex items-center py-4 px-6">
          <span class="text-gray-700 text-lg font-medium mr-4">{{ $number }}</span>
          <img
            class="w-12 h-12 rounded-full object-cover mr-4"
            src="{{ url('img/logo_company.png') }}"
            alt="User avatar"
          />
          <div class="flex-1">
            <h3 class="text-lg font-medium text-gray-800">{{ $item->name }}</h3>
            <p class="text-gray-600 text-base">{{ $item->position }}</p>
          </div>
          <div>

            <a href="{{ route('salary-slips.create_form', $item->id) }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Slip +</a>
          </div>
        </li>
        @php($number++)
        @endforeach
      </ul>
        </div>
</x-app-layout>