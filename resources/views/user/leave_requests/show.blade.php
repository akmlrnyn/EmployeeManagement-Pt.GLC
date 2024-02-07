<x-app-layout>

  <div class="w-4/5 mx-auto mt-4">
    <div
      class="bg-white shadow-md rounded-md overflow-hidden mx-auto mt-8"
    >
      <div class="bg-violet-200 opacity-90 py-2 px-4">
        <h2 class="text-xl font-semibold text-violet-700">Your All <span class="font-light">Leave Request ({{ $leave_requests_total }})</span></h2>
      </div>

      <ul class="divide-y divide-gray-200">
        @php($number = 1)
        @foreach ($leave_requests as $item)
        <li class="flex lg:flex-row flex-col items-center py-4 px-6">
          <span class="text-gray-700 text-lg font-medium mr-4">{{ $number }}</span>
          <img
            class="w-12 h-12 rounded-full object-cover mr-4"
            src="{{ url('img/icon_avatar.png') }}"
            alt="User avatar"
          />
          <div class="flex-1">
            <h4 class="text xl font-semibold text-gray-500 uppercase">{{ $item->status }}</h4>
            <h3 class="text-sm font-small text-gray-800">{{ $item->created_at->format('D/M/Y') }}</h3>
            <h3 class="text-lg font-medium text-gray-800">{{ $item->employee->name }}</h3>
            <p class="text-gray-600 text-base">{{ $item->amount_of_days }} Days</p>
            <p class="text-red-600 text-base">Due To: {{ $item->reason }}</p>
          </div>
        </li>
        @php($number++)
        @endforeach
      </ul>
    </div>
  </div>

</x-app-layout>