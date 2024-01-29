<x-app-layout>

    <div class="py-4 md:px-10 md:mx-3">
           <!-- start main page -->
    <div class="p-4 bg-gray-100">
      <div class="container mx-auto p-4">
        <div
          class="dashboard-title my-5 pb-4 flex flex-col lg:flex-row items-center lg:justify-between"
        >
          <div>
            <h1 class="text-4xl font-semibold">Welcome!</h1>
            <p class="text-gray-700">
              Welcome to the PT GLC Indonesia Employees Dashboard
            </p>
          </div>
          <div>
            <p
              class="text-normal text-gray-700 bg-gray-200 rounded-lg px-3 py-1 mt-3"
            >
              {{ Auth::user()->roles }}
            </p>
          </div>
        </div>
        <div
          class="dashboard content mt-5 flex flex-col lg:flex-row justify-start gap-4"
        >
          <div class="flex w-full flex-col gap-3">
            <div
              class="card w-auto md:w-auto h-fit bg-white p-4 rounded-lg border-b-4"
            >
              <h2 class="text-xl font-semibold mb-1">
                Employees in GLC Indonesia
              </h2>
              <div class="flex items-center justify-between">
                <h3 class="text-base font-normal">
                  Positions & Responsibility
                </h3>
                <p class="text-sm text-gray-500 border-l-2 p-2">
                  {{ $total_employee }} Employees Now
                </p>
              </div>
              <div class="mt-4">
                <img
                  src="{{ url('img/avatar_employees.png') }}"
                  width="140"
                  alt=""
                  class="mb-3"
                />
                <hr />
                <a href="{{ route('employees.index') }}">
                  <button
                    class="btn bg-red-700 flex items-center gap-2 text-white px-4 py-2 rounded-md mt-4 text-sm"
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
                    Manage Employees
                  </button>
                </a>
              </div>
            </div>
            <!-- stats section -->
            <div
              class="grid lg:grid-cols-2 md:grid-cols-2 gap-6 w-full max-w-6xl"
            >
              <!-- Tile 1 -->
              <div class="flex items-center p-4 bg-white rounded">
                <div
                  class="flex flex-shrink-0 items-center justify-center bg-purple-200 h-16 w-16 rounded"
                >
                  <svg
                    class="w-6 h-6 fill-current text-purple-700"
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
                </div>
                <div class="flex-grow flex flex-col ml-4">
                  <span class="text-md font-bold">$8,430</span>
                  <div class="flex items-center justify-between">
                    <span class="text-gray-500 text-sm"
                      >Revenue last 30 days</span
                    >
                    <span class="text-purple-500 text-sm font-semibold ml-2"
                      >+12.6%</span
                    >
                  </div>
                </div>
              </div>

              <!-- Tile 2 -->
              <div class="flex items-center p-4 bg-white rounded">
                <div
                  class="flex flex-shrink-0 items-center justify-center bg-red-200 h-16 w-16 rounded"
                >
                  <svg
                    class="w-6 h-6 fill-current text-red-700"
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
                  <span class="text-md font-bold">211</span>
                  <div class="flex items-center justify-between">
                    <span class="text-gray-500 text-sm"
                      >Sales last 30 days</span
                    >
                    <span class="text-red-500 text-sm font-semibold ml-2"
                      >-8.1%</span
                    >
                  </div>
                </div>
              </div>

              <!-- Tile 3 -->
              <div class="flex items-center p-4 bg-white rounded">
                <div
                  class="flex flex-shrink-0 items-center justify-center bg-purple-200 h-16 w-16 rounded"
                >
                  <svg
                    class="w-6 h-6 fill-current text-purple-700"
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
                </div>
                <div class="flex-grow flex flex-col ml-4">
                  <span class="text-md font-bold">140</span>
                  <div class="flex items-center justify-between">
                    <span class="text-gray-500 text-sm"
                      >Customers last 30 days</span
                    >
                    <span class="text-purple-500 text-sm font-semibold ml-2"
                      >+28.4%</span
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Leave Request Section -->
          <div class="card w-full bg-white p-4 rounded-lg border-b-4">
            <h2 class="text-xl font-semibold mb-2">
              Employees's Leave Request
            </h2>
            <h5 class="text-gray-600 font-normal">Pending Request ({{ $total_pending_request_new }})</h5>
            <div class="mt-4">
              <ul role="list" class="divide-y divide-gray-100">
                @foreach ($pending_request_new as $item)
                <li class="flex justify-between gap-x-6 py-5">
                  <div class="flex min-w-0 gap-x-4">
                    <img
                      class="h-12 w-12 flex-none rounded-full bg-gray-50"
                      src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                      alt=""
                    />
                    <div class="min-w-0 flex-auto">
                      <p class="text-sm font-semibold leading-6 text-gray-900">
                        {{ $item->employee->name }}
                      </p>
                      <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                        {{ $item->employee->email }}
                      </p>
                    </div>
                  </div>
                  <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
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
                class="text-gray-700 p-1 text-center"
              >
                <p>See all leave Requests ></p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    
</x-app-layout>
