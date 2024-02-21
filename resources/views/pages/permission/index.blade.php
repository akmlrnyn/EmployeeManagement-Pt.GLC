<x-app-layout>

  <div class="w-4/5 mx-auto mt-4">
    <h2 class="text-gray-700 text-2xl sm:text-3xl font-bold">All Permissions</h2>
    <p>From the staffs</p>

      <div class="flex flex-col items-start text-start sm:text-end mt-4">
        <a href="{{ route('permission.create') }}">
          <p class="text-xs sm:text-sm bg-blue-700 hover:bg-blue-600 shadow-md text-white px-4 py-2 rounded-md  ">Add Permisssion</p>
        </a>
      </div>

    <div class="bg-white shadow-md rounded-md overflow-hidden mx-auto mt-4">
      <div class="bg-yellow-200 opacity-90 py-2 px-4">
        <h2 class="text-base sm:text-xl font-semibold text-yellow-700">Pending <span class="font-light">Permissions ({{ $permission->count() }})</span></h2>
      </div>

      <ul class="divide-y divide-gray-200">
        @php($number = 1)
        @foreach ($permission as $item)
        <li class="flex sm:flex-row flex-col items-center py-4 px-6">
          <span class="text-gray-700 text-base sm:text-lg font-medium mr-4">{{ $number }}</span>
          <img class="w-12 h-12 rounded-full object-cover mr-4" src="{{ url('img/icon_avatar.png') }}" alt="User avatar" />
          <div class="flex-1">
            <h3 class="text-xs sm:text-sm font-small text-gray-800">{{ date('d M Y', strtotime($item->created_at)) }}</h3>
            <h3 class="text-base sm:text-lg font-medium text-gray-800">{{ $item->employee->name }}</h3>
            <p class="text-gray-600 text-xs sm:text-base">{{ $item->amount_of_times }} Minutes</p>
            <p class="text-red-600 text-sm sm:text-base">Due To: {{ $item->reason }}</p>
          </div>
          <div class="flex lg:mt-0 mt-3">
            <form action="{{ route('permission.check', $item->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <button type="submit" name="status" value="accepted" class="text-white bg-emerald-600 hover:bg-emerald-600 focus:ring-4 focus:ring-emerald-300 font-medium rounded-lg text-xs sm:text-sm px-5 py-2.5 me-2 mb-2 dark:bg-emerald-500 dark:hover:bg-emerald-600 focus:outline-none dark:focus:ring-blue-800">Accept</button>
              <button type="submit" name="status" value="rejected" class="text-white bg-red-600 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs sm:text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-500 dark:hover:bg-red-600 focus:outline-none dark:focus:ring-blue-800">Reject</button>
            </form>
          </div>
        </li>
        @php($number++)
        @endforeach
      </ul>
    </div>

    <div class="bg-white shadow-md rounded-md overflow-hidden  mx-auto mt-8">
      <div class="bg-green-200 opacity-90 py-2 px-4">
        <h2 class="text-base sm:text-xl font-semibold text-green-700">Accepted <span class="font-light">Permissions</span></h2>
      </div>

      <ul class="divide-y divide-gray-200">
        @php($number = 1)
        @foreach ($permission_accepted as $item)
        <li class="flex flex-col sm:flex-row items-center py-4 sm:px-6">
          <span class="text-gray-700 text-lg font-medium mr-4">{{ $number }}</span>
          <img class="w-12 h-12 rounded-full object-cover mr-4" src="{{ url('img/icon_avatar.png') }}" alt="User avatar" />
          <div class="flex-1">
            <h3 class="text-xs sm:text-sm font-small text-gray-800">{{ date('d M Y', strtotime($item->created_at)) }}</h3>
            <h3 class="text-base sm:text-lg font-medium text-gray-800">{{ $item->employee->name }}</h3>
            <p class="text-gray-600 text-xs sm:text-base">{{ $item->amount_of_times }} Days</p>
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
        <h2 class="text-base sm:text-xl font-semibold text-red-700">Rejected <span class="font-light">Permissions</span></h2>
      </div>

      <ul class="divide-y divide-gray-200">
        @php($number = 1)
        @foreach ($permission_rejected as $item)
        <li class="flex items-center py-4 px-6">
          <span class="text-gray-700 text-lg font-medium mr-4">{{ $number }}</span>
          <img class="w-12 h-12 rounded-full object-cover mr-4" src="{{ url('img/icon_avatar.png') }}" alt="User avatar" />
          <div class="flex-1">
            <h3 class="text-xs sm:text-sm font-small text-gray-800">{{ date('d M Y', strtotime($item->created_at)) }}</h3>
            <h3 class="text-base sm:text-lg font-medium text-gray-800">{{ $item->employee->name }}</h3>
            <p class="text-gray-600 text-xs sm:text-base">{{ $item->amount_of_times }} Minutes</p>
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
      <div class="flex flex-col text-start sm:text-end gap-5 my-5">
      {{-- <form action="{{ route('leaverequest.reset') }}" method="post">
        @csrf
        @method('PATCH')
        <button type="submit">
          <a class="text-xs sm:text-sm bg-gray-200 hover:bg-gray-100 shadow-md text-gray-700 px-4 py-2 rounded-md my-5">Reset All Staff Leave Requests To 12</a>
        </button>
      </form>  --}}

      {{-- delete all button --}}
      <form action="{{ route('permission.delete') }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">
          <a class="text-xs sm:text-sm bg-red-800 hover:bg-red-700 shadow-md text-white px-4 py-2 rounded-md  my-5">Remove All Permissions Recap</a>
        </button>
      </form>
    </div>
  </div>
</x-app-layout>
