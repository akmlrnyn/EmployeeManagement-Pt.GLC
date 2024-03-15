<x-app-layout>
  <div class="w-5/6 sm:w-4/5 mx-auto mt-4">
    <h2 class="text-gray-700 text-2xl sm:text-3xl font-bold">All Staffs </h2>
    <p>The workers here</p>
    <div class="bg-white shadow-md rounded-md overflow-hidden mx-auto mt-5">
      <div class="px-4 mx-auto my-2">
        <form action="#" class="flex gap-x-1">
          <input type="text" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded w-full" placeholder="Search staff..." onkeydown="searchStaffOnKeyPress(event)">
          <button class="text-xs bg-gray-200 rounded-md px-2 sm:px-3 py-1 sm:py-2" onclick="searchStaff()"><svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#666666" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg></button>
          <button class="text-xs bg-gray-200 rounded-md px-2 sm:px-3 py-1 sm:py-2" onclick="clearSearch()">Clear</button>
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
              
              {{-- button trigger for delete-modal --}}
              <button data-modal-target="delete-modal-{{$item->id}}" data-modal-toggle="delete-modal-{{$item->id}}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 sm:font-medium rounded sm:rounded-lg text-xs px-3 sm:px-5 py-1 sm:py-2.5 sm:me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" type="button">
                Remove
              </button>
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
                <div class="p-4 md:p-5 text-center">
                  <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                  </svg>
                  <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this employee?</h3>
                  {{-- button for delete --}}
                  <button data-modal-hide="delete-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-xs inline-flex items-center px-5 py-2.5 text-center me-2">
                    Yes, I'm sure
                  </button>
                  <button  type="button" data-modal-hide="delete-modal-{{ $item->id }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-xs font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No, cancel</button>
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

  const searchTerm = input.toLowerCase();

  for (let i = 0; i < staffElements.length; i++) {
    const staffContent = staffElements[i].textContent.toLowerCase();
    if (!staffContent.includes(searchTerm)) {
      staffElements[i].style.display = "none";
    } else {
      staffElements[i].style.display = "flex"; 
    }
  }
}
function clearSearch() {
  const staffElements = document.getElementsByClassName("staff");
  for (let i = 0; i < staffElements.length; i++) {
    staffElements[i].style.display = "";
  }
  document.getElementById("search").value = "";
}
function searchStaffOnKeyPress(event) {
  if (event.key === "Enter") {
    searchStaff();
  }
}
</script>
