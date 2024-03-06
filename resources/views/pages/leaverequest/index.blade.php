<x-app-layout>
  <div class="w-5/6 sm:w-4/5 mx-auto mt-4">
    <h2 class="text-gray-700 text-2xl sm:text-3xl font-bold">All Leave Requests </h2>
    <p>From the staffs</p>

    <div class="bg-white shadow-md rounded-md overflow-hidden mx-auto mt-5">
      <div class="bg-yellow-200 opacity-90 py-2 px-4">
        <h2 class="text-base sm:text-xl font-semibold text-yellow-700">Pending <span class="font-light">Leave Request ({{ $leave_request_amount }})</span></h2>
      </div>

      <ul class="divide-y divide-gray-200">
        @php($number = 1)
        @foreach ($leave_request->reverse() as $item)
        <li class="flex lg:flex-row flex-col items-center py-4 px-6">
          <span class="text-gray-700 text-base sm:text-lg font-medium mr-4">{{ $number }}</span>
          <img class="w-12 h-12 rounded-full object-cover mr-4" src="{{ url('img/icon_avatar.png') }}" alt="User avatar" />
          <div class="flex-1">
            <h3 class="text-xs sm:text-sm font-small text-gray-800">{{ date('d M Y', strtotime($item->created_at)) }}</h3>
            <h3 class="text-base sm:text-lg font-medium text-gray-800">{{ $item->employee->name }}</h3>
            <p class="text-gray-600 text-xs sm:text-base">{{ $item->amount_of_days }} Days</p>
            <p class="text-gray-600 text-xs sm:text-base">Category: {{ $item->category }}</p>
            <p class="text-red-600 text-sm sm:text-base">Due To: {{ $item->reason }}</p>
          </div>
          <div class="flex flex-col sm:flex-row lg:mt-0 mt-3 gap-x-2">
            <form action="{{ route('leaverequest.check', $item->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <button type="submit" class="w-full text-white bg-emerald-500 hover:bg-emerald-600 focus:ring-4 focus:ring-emerald-300 rounded-lg text-xs sm:text-sm px-5 py-2.5 me-2 mb-1 focus:outline-none dark:focus:ring-blue-800">Accept</button>
            </form>
            <form action="{{ route('leaverequest.reject', $item->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <button type="submit" class="w-full text-white bg-red-600 hover:bg-red-600 focus:ring-4 focus:ring-red-300 rounded-lg text-xs sm:text-sm px-5 py-2.5 me-2 sm:mb-2 dark:bg-red-500 dark:hover:bg-red-600 focus:outline-none dark:focus:ring-blue-800">Reject</button>
            </form>
          </div>
        </li>
        @php($number++)
        @endforeach
      </ul>
    </div>

    <div class="bg-white shadow-md rounded-md overflow-hidden  mx-auto mt-8">
      <div class="bg-green-200 opacity-90 py-2 px-4">
        <h2 class="text-base sm:text-xl font-semibold text-green-700">Accepted <span class="font-light">Leave Request</span></h2>
      </div>

      <ul class="divide-y divide-gray-200">
        @php($number = 1)
        @foreach ($accepted_leave_request->reverse() as $item)
        <li class="flex lg:flex-row flex-col items-center py-4 px-6">
          <span class="text-gray-700 text-lg font-medium mr-4">{{ $number }}</span>
          <img class="w-12 h-12 rounded-full object-cover mr-4" src="{{ url('img/icon_avatar.png') }}" alt="User avatar" />
          <div class="flex-1">
            <h3 class="text-xs sm:text-sm font-small text-gray-800">{{ date('d M Y', strtotime($item->created_at)) }}</h3>
            <h3 class="text-base sm:text-lg font-medium text-gray-800">{{ $item->employee->name }}</h3>
            <p class="text-gray-600 text-xs sm:text-base">{{ $item->amount_of_days }} Days</p>
            <p class="text-gray-600 text-xs sm:text-base">Category: {{ $item->category }}</p>
            <p class="text-red-600 text-sm sm:text-base">Due To: {{ $item->reason }}</p>
          </div>
          <div>
          </div>
        </li>
        @php($number++)
        @endforeach
      </ul>
    </div>

    <div class="bg-white shadow-md rounded-md overflow-hidden  mx-auto mt-8 mb-3">
      <div class="bg-red-200 opacity-90 py-2 px-4">
        <h2 class="text-base sm:text-xl font-semibold text-red-700">Rejected <span class="font-light">Leave Request</span></h2>
      </div>

      <ul class="divide-y divide-gray-200">
        @php($number = 1)
        @foreach ($rejected_leave_request->reverse() as $item)
        <li class="flex lg:flex-row flex-col items-center py-4 px-6">
          <span class="text-gray-700 text-lg font-medium mr-4">{{ $number }}</span>
          <img class="w-12 h-12 rounded-full object-cover mr-4" src="{{ url('img/icon_avatar.png') }}" alt="User avatar" />
          <div class="flex-1">
            <h3 class="text-xs sm:text-sm font-small text-gray-800">{{ date('d M Y', strtotime($item->created_at)) }}</h3>
            <h3 class="text-base sm:text-lg font-medium text-gray-800">{{ $item->employee->name }}</h3>
            <p class="text-gray-600 text-xs sm:text-base">{{ $item->amount_of_days }} Days</p>
            <p class="text-gray-600 text-xs sm:text-base">Category: {{ $item->category }}</p>
            <p class="text-red-600 text-sm sm:text-base">Due To: {{ $item->reason }}</p>
          </div>
          <div>
          </div>
        </li>
        @php($number++)
        @endforeach
      </ul>
    </div>

    {{-- reset button --}}
    <div class="flex flex-col text-start sm:text-end gap-5 mt-5">
      <form action="{{ route('leaverequest.reset') }}" method="post">
        @csrf
        @method('PATCH')
        <button type="submit">
          <a class="text-xs sm:text-sm bg-gray-200 hover:bg-gray-100 shadow-md text-gray-700 px-4 py-2 rounded-md my-5">Reset Staff Leave Requests To 12</a>
        </button>
      </form>

      <div>
        <button type="submit" data-modal-target="delete-modal" data-modal-toggle="delete-modal" >
          <a class="text-xs sm:text-sm bg-red-800 hover:bg-red-700 shadow-md text-white px-4 py-2 rounded-md  my-5">Remove All Recap</a>
        </button>
      </div>
        <form action="{{ route('leaverequest.delete') }}" method="post">
          @method('DELETE')
          @csrf
          <div id="delete-modal" tabindex="1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
              <div class="relative bg-white rounded-lg shadow ">
                <div class="p-4 md:p-5 text-center">
                  <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                  </svg>
                  <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete all Leave Request Recap?</h3>
                  {{-- button for delete --}}
                  <button data-modal-hide="delete-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                    Yes, I'm sure
                  </button>
                  <button  type="button" data-modal-hide="delete-modal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </div>
              </div>
            </div>
          </div>
        </form>
    </div>
  </div>
</x-app-layout>
