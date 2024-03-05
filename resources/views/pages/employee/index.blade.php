<x-app-layout>
  <div class="w-5/6 sm:w-4/5 mx-auto mt-4">
    <h2 class="text-gray-700 text-2xl sm:text-3xl font-bold">All Staffs </h2>
    <p>The workers here</p>
    <div class="bg-white shadow-md rounded-md overflow-hidden mx-auto mt-5">
      <div class="px-4 mx-auto my-2">
        <form action="#" class="flex gap-x-3">
          <input type="text" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full" placeholder="Search staff..." onkeydown="searchStaffOnKeyPress(event)">
          <button class="text-xs bg-gray-200 rounded-md px-3 py-2" onclick="searchStaff()">Search</button>
        </form>
    </div>
      <div class="bg-gray-200 py-2 px-4">
        <h2 class="text-lg sm:text-xl font-bold text-gray-800">Staff list</h2>
        <a href="{{ route('employees.create') }}" class="text-sm sm:text-base text-blue-700">+ Recruit New Staff</a>
      </div>

      <ul class="divide-y divide-gray-200">
        @php($number = 1)
        @foreach ($employees as $item)
        <li class="staff flex flex-col sm:flex-row items-center py-4 px-6">
          <span class="text-gray-700 text-base sm:text-lg font-medium sm:mr-4 mb-2 sm:mb-0">{{ $number }}</span>
          <img
            class="w-9 h-9 sm:w-12 sm:h-12 rounded-full object-cover sm:mr-4 mb-2 sm:mb-0"
            src="{{ url('img/avatar2.png') }}"
            alt="User avatar"
          />
          <div class="flex-1 mb-2 sm:mb-0">
            <h3 class="text-sm sm:text-lg font-medium text-gray-800">{{ $item->name }}</h3>
            <p class="text-gray-600 text-center sm:text-start text-xs sm:text-base">{{ $item->position }}</p>
          </div>
          <div class="flex flex-row items-center sm:ml-auto gap-x-2">
            <form action="{{ route('employee.destroy', $item->id) }}" method="post">
              @csrf
              @method('DELETE')
              
              {{-- button trigger for delete-modal --}}
              <button data-modal-target="delete-modal-{{$item->id}}" data-modal-toggle="delete-modal-{{$item->id}}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 sm:font-medium rounded sm:rounded-lg text-xs px-3 sm:px-5 py-1 sm:py-2.5 sm:me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" type="button">
                Remove
              </button>
            </form>
            {{-- detail employee --}}
            <a href="{{ route('employee.detail', $item->id) }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:font-medium rounded sm:rounded-lg text-xs px-3 sm:px-5 py-1 sm:py-2.5 sm:me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Show</a>
            <a href="{{ route('employee.edit', $item->id) }}" type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 sm:font-medium rounded sm:rounded-lg text-xs px-3 sm:px-5 py-1 sm:py-2.5 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Edit</a>
          </div>
          {{-- modal for delete --}}
        <form action="{{ route('employee.destroy', $item->id) }}" method="post">
          @method('DELETE')
          @csrf
          <div id="delete-modal-{{$item->id}}" tabindex="1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
              <div class="relative bg-white rounded-lg shadow ">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                  <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                  </svg>
                  <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this employee?</h3>
                  {{-- button for delete --}}
                  <button data-modal-hide="delete-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                    Yes, I'm sure
                  </button>
                  <button data-modal-hide="delete-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        </li>
        @php($number++)
        @endforeach
      </ul>
    </div>
  </div>
</x-app-layout>
<script type="text/javascript">
  function searchStaff() {
  const input = document.getElementById("search").value;
  const staffElements = document.getElementsByClassName("staff");

  for (let i = 0; i < staffElements.length; i++) {
    staffElements[i].style.display = ""; // Reset to default display
  }
  const searchTerm = input.toLowerCase();

  for (let i = 0; i < staffElements.length; i++) {
    const staffContent = staffElements[i].textContent.toLowerCase();
    if (!staffContent.includes(searchTerm)) {
      staffElements[i].style.display = "none";
    } else {
      staffElements[i].style.display = "flex"; // Or your preferred display style
    }
  }
}

// Handle keyboard search (optional)
function searchStaffOnKeyPress(event) {
  if (event.key === "Enter") {
    searchStaff();
  }
}
</script>
