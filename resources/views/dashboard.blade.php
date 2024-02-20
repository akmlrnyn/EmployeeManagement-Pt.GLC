<x-app-layout>

    <div class="py-1 md:px-10 md:mx-3">
    <div class="p-1 sm:p-4 bg-gray-100">
      <div class="container mx-auto p-4">
        <div
          class="dashboard-title mb-5 md:pb-4 flex flex-col items-start md:flex-row md:items-center md:justify-between"
        >
          <div>
            <h1 class="text-3xl sm:text-4xl font-bold">Welcome, <span class="text-2xl sm:text-3xl">{{ Auth::user()->name }}</span></h1>
            <p class="text-sm sm:text-base text-gray-700">
              Welcome to the PT GLC Indonesia Employees Dashboard
            </p>
          </div>
          <div>
            <p
              class="text-xs sm:text-sm text-gray-700 bg-gray-200 rounded-md px-3 py-1 mt-4 shadow"
            >
              Administrator
            </p>
          </div>
        </div>
        {{-- Dasboard --}}
        <div
          class="dashboard content mt-5 flex flex-col md:flex-row justify-start gap-4"
        >
          <div class="flex w-full flex-col gap-3">
            <div
              class="card w-auto md:w-auto h-fit bg-white p-4 rounded-lg shadow-md"
            >
              <h2 class="text-base md:text-xl font-semibold">
                Employees in PT.GLC Indonesia
              </h2>
              <div class="flex items-center justify-between">
                <h3 class="text-sm font-normal">
                  Positions & Jobs
                </h3>
                <p class="text-xs text-gray-500 border-l-2 p-2">
                  {{ $total_employee }} Workers Now
                </p>
              </div>
              <div class="mt-4">
               <img src="{{ url('img/avatar_employees.png') }}"
                    alt=""
                    class="mb-3 w-32 md:w-40"
                />
                <hr />
                <div class="flex flex-col sm:flex-row gap-1 sm:gap-3">
                <a href="{{ route('employees.index') }}">
                  <button
                    class="btn bg-red-600 hover:bg-red-800 flex items-center gap-2 text-white px-4 py-2 rounded-md mt-4 text-xs sm:text-sm transition-all ease-in-out"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      height="17"
                      width="17"
                      viewBox="0 0 512 512"
                    >
                      <path
                        fill="#ffffff"
                        d="M0 416c0 17.7 14.3 32 32 32l54.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 448c17.7 0 32-14.3 32-32s-14.3-32-32-32l-246.7 0c-12.3-28.3-40.5-48-73.3-48s-61 19.7-73.3 48L32 384c-17.7 0-32 14.3-32 32zm128 0a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM320 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm32-80c-32.8 0-61 19.7-73.3 48L32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l246.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48l54.7 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-54.7 0c-12.3-28.3-40.5-48-73.3-48zM192 128a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm73.3-64C253 35.7 224.8 16 192 16s-61 19.7-73.3 48L32 64C14.3 64 0 78.3 0 96s14.3 32 32 32l86.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 128c17.7 0 32-14.3 32-32s-14.3-32-32-32L265.3 64z"
                      />
                    </svg>
                    Manage Staffs
                  </button>
                </a>
                <a href="{{ route('employees.create') }}">
                  <button
                    class="btn bg-blue-600 hover:bg-blue-700 flex items-center gap-2 text-white px-4 py-2 rounded-md sm:mt-4 text-xs sm:text-sm transition-all ease-in-out"
                  >
                    + Recruit New
                  </button>
                </a>
                </div>
              </div>
            </div>
            <!-- stats section -->
            <div
              class="grid lg:grid-cols-2 md:grid-cols-1 gap-6 w-full max-w-6xl"
            >
              <!-- Tile 1 -->
              <div class="flex items-center p-4 bg-white rounded shadow-md">
                <div
                  class="flex flex-shrink-0 items-center justify-center bg-blue-200 h-12 w-12 sm:h-16 sm:w-16 rounded"
                >
                  <svg
                    class="w-4 sm:w-6 h-6 fill-current text-blue-700"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                      clip-rule="evenodd"
                    />
                  </svg>
                  <svg
                    class="w-4 sm:w-6 h-6 fill-current text-red-700"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </div>
                <div class="flex-grow flex flex-col ml-4">
                  <span class="text-xs sm:text-base font-bold">QPA</span>
                  <div class="flex items-center justify-between">
                    <span class="text-xs sm:text-base text-gray-500 text-sm"
                      >Staff Performance</span
                    >
                    <span class="text-purple-500 text-xs sm:text-sm font-semibold ml-2"
                      >See more...</span
                    >
                  </div>
                </div>
              </div>
              <!-- Tile 2 -->
              <div class="flex items-center p-4 bg-white rounded shadow-md">
                <div
                  class="flex flex-shrink-0 items-center justify-center bg-yellow-200 h-12 w-12 sm:h-16 sm:w-16 rounded"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-3 sm:w-6" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#FFD43B" d="M160 0c17.7 0 32 14.3 32 32V67.7c1.6 .2 3.1 .4 4.7 .7c.4 .1 .7 .1 1.1 .2l48 8.8c17.4 3.2 28.9 19.9 25.7 37.2s-19.9 28.9-37.2 25.7l-47.5-8.7c-31.3-4.6-58.9-1.5-78.3 6.2s-27.2 18.3-29 28.1c-2 10.7-.5 16.7 1.2 20.4c1.8 3.9 5.5 8.3 12.8 13.2c16.3 10.7 41.3 17.7 73.7 26.3l2.9 .8c28.6 7.6 63.6 16.8 89.6 33.8c14.2 9.3 27.6 21.9 35.9 39.5c8.5 17.9 10.3 37.9 6.4 59.2c-6.9 38-33.1 63.4-65.6 76.7c-13.7 5.6-28.6 9.2-44.4 11V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V445.1c-.4-.1-.9-.1-1.3-.2l-.2 0 0 0c-24.4-3.8-64.5-14.3-91.5-26.3c-16.1-7.2-23.4-26.1-16.2-42.2s26.1-23.4 42.2-16.2c20.9 9.3 55.3 18.5 75.2 21.6c31.9 4.7 58.2 2 76-5.3c16.9-6.9 24.6-16.9 26.8-28.9c1.9-10.6 .4-16.7-1.3-20.4c-1.9-4-5.6-8.4-13-13.3c-16.4-10.7-41.5-17.7-74-26.3l-2.8-.7 0 0C119.4 279.3 84.4 270 58.4 253c-14.2-9.3-27.5-22-35.8-39.6c-8.4-17.9-10.1-37.9-6.1-59.2C23.7 116 52.3 91.2 84.8 78.3c13.3-5.3 27.9-8.9 43.2-11V32c0-17.7 14.3-32 32-32z"/></svg>
                </div>
                <div class="flex-grow flex flex-col ml-4">
                  <span class="text-xs sm:text-base font-bold">Salaries</span>
                  <div class="flex items-center justify-between">
                    <span class="text-xs sm:text-base text-gray-500 text-sm"
                      >The Staff Salary</span
                    >
                    <span class="text-yellow-700 text-xs sm:text-sm font-semibold ml-2"
                      ><a href="{{ route('salary-slips.index') }}">See more...</a></span
                    >
                  </div>
                </div>
              </div>
              <!-- Tile 3 -->
              <div class="flex items-center p-4 bg-white rounded shadow-md">
                <div
                  class="flex flex-shrink-0 items-center justify-center bg-gray-100 h-12 w-12 sm:h-16 sm:w-16 rounded"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-3 sm:w-6" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#63E6BE" d="M105.1 202.6c7.7-21.8 20.2-42.3 37.8-59.8c62.5-62.5 163.8-62.5 226.3 0L386.3 160H352c-17.7 0-32 14.3-32 32s14.3 32 32 32H463.5c0 0 0 0 0 0h.4c17.7 0 32-14.3 32-32V80c0-17.7-14.3-32-32-32s-32 14.3-32 32v35.2L414.4 97.6c-87.5-87.5-229.3-87.5-316.8 0C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5zM39 289.3c-5 1.5-9.8 4.2-13.7 8.2c-4 4-6.7 8.8-8.1 14c-.3 1.2-.6 2.5-.8 3.8c-.3 1.7-.4 3.4-.4 5.1V432c0 17.7 14.3 32 32 32s32-14.3 32-32V396.9l17.6 17.5 0 0c87.5 87.4 229.3 87.4 316.7 0c24.4-24.4 42.1-53.1 52.9-83.7c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.5 62.5-163.8 62.5-226.3 0l-.1-.1L125.6 352H160c17.7 0 32-14.3 32-32s-14.3-32-32-32H48.4c-1.6 0-3.2 .1-4.8 .3s-3.1 .5-4.6 1z"/></svg>
                </div>
                <div class="flex-grow flex flex-col ml-4">
                  <span class="text-xs sm:text-base font-bold">Refresh app cache</span>
                  <div class="flex items-center justify-between">
                    <span class="text-xs sm:text-base text-gray-500 text-sm"
                      >With One Click</span
                    >
                    <span class="text-emerald-600 text-xs sm:text-sm font-semibold ml-2"
                      ><a href="{{ route('dashboard.ccCache') }}">Refresh</a></span
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex flex-col w-full gap-y-3">
          <!-- Leave Request Section -->
          <div class="card w-full bg-white p-4 rounded-lg border-b-1 shadow-md">
            <h2 class="text-base sm:text-xl font-semibold mb-1">
              Staff's Leave Request
            </h2>
            <h5 class="text-sm sm:text-base text-gray-600 font-light">Pending Request Permission({{ $total_pending_request_new }})</h5>
            <div class="mt-4">
              <ul role="list" class="divide-y divide-gray-100">
                @foreach ($pending_request_new->reverse() as $item)
                <li class="flex flex-col sm:flex-row justify-between gap-x-6 py-5">
                  <div class="flex min-w-0 gap-x-4">
                    <img
                      class="h-12 w-12 flex-none rounded-full bg-gray-50"
                      src="{{ url('img/icon_avatar.png') }}"
                      alt=""
                    />
                    <div class="min-w-0 flex-auto">
                      <p class="text-sm font-semibold leading-6 text-gray-900">
                        {{ $item->employee->name }}
                      </p>
                      <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                        {{ $item->reason }}
                      </p>
                    </div>
                  </div>
                  <div class="md:flex md:flex-col md:items-end mt-1 sm:mt-0">
                    <div class="mt-1 flex items-center gap-x-1.5">
                      <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                        <div
                          class="h-1.5 w-1.5 rounded-full bg-yellow-500"
                        ></div>
                      </div>
                      <p class="text-xs leading-5 text-gray-500">{{ $item->status }}</p>
                    </div>
                  </div>
                </li>
                @endforeach
                
              </ul>
              <hr />
              <a
                href="{{ route('leaverequest.index') }}"
                class="text-sm sm:text-base text-blue-700 p-1 text-center"
              >
                <p>See all leave Requests ></p>
              </a>
            </div>
          </div>
          {{-- Permission section --}}
          <div class="card w-full bg-white p-4 rounded-lg border-b-1 shadow-md">
            <h2 class="text-base sm:text-xl font-semibold mb-1">
              Staff's Permits
            </h2>
            <h5 class="text-sm sm:text-base text-gray-600 font-light">Pending Permission({{ $total_permission_new }})</h5>
            <div class="mt-4">
              <ul role="list" class="divide-y divide-gray-100">
                @foreach ($permission_new->reverse() as $item)
                <li class="flex flex-col sm:flex-row justify-between gap-x-6 py-5">
                  <div class="flex min-w-0 gap-x-4">
                    <img
                      class="h-12 w-12 flex-none rounded-full bg-gray-50"
                      src="{{ url('img/icon_avatar.png') }}"
                      alt=""
                    />
                    <div class="min-w-0 flex-auto">
                      <p class="text-sm font-semibold leading-6 text-gray-900">
                        {{ $item->employee->name }}
                      </p>
                      <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                        {{ $item->reason }}
                      </p>
                    </div>
                  </div>
                  <div class="md:flex md:flex-col md:items-end mt-1 sm:mt-0">
                    <div class="mt-1 flex items-center gap-x-1.5">
                      <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                        <div
                          class="h-1.5 w-1.5 rounded-full bg-yellow-500"
                        ></div>
                      </div>
                      <p class="text-xs leading-5 text-gray-500">{{ $item->status }}</p>
                    </div>
                  </div>
                </li>
                @endforeach
                
              </ul>
              <hr />
              <a
                href="{{ route('leaverequest.index') }}"
                class="text-sm sm:text-base text-violet-700 p-1 text-center"
              >
                <p>See all permissions ></p>
              </a>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    
</x-app-layout>
