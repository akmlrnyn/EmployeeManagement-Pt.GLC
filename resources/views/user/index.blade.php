<x-app-layout>
    <div class="container mx-auto my-32">
      <div>
        <div
          class="bg-white relative shadow-lg rounded-lg w-5/6 md:w-5/6 lg:w-4/6 xl:w-3/6 mx-auto"
        >
          <div class="flex justify-center">
            <img
              src="{{ url('img/logo_company.png') }}"
              alt=""
              class="rounded-full mx-auto absolute -top-20 w-32 h-32 shadow-md border-4 border-white"
            />
          </div>

          @if (Auth::user()->roles == 'user')
              <div class="mt-16">
            <h1 class="font-bold text-center text-lg lg:text-3xl text-gray-900">
              {{ $user->employee->name }}
            </h1>
            <p class="text-center text-sm text-gray-400 font-medium mt-2">
              {{ $user->employee->position }}
            </p>
            <p>
              <span> </span>
            </p>

            <div class="flex justify-between items-center my-5 px-6">
              <a
                href=""
                class="text-gray-500 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3"
                >All Details</a
              >
              <a
                href="{{ route('profile.leave_request') }}"
                class="text-gray-500 hover:text-gray-900 hover:bg-blue-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3"
                >Ask Leave Requests</a
              >
            </div>

            <div class="w-full">
              <h3 class="font-medium text-gray-900 text-left px-6">
                Employee Detail
              </h3>
              <div
                class="mt-5 w-full flex flex-col items-center overflow-hidden text-sm"
              >
                <a
                  href="#"
                  class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150"
                >
                  <img
                    src="{{ url('img/logo_company.png') }}"
                    alt=""
                    class="rounded-full h-6 shadow-md inline-block mr-2"
                  />
                  Email
                  <span class="text-gray-500 text-xs">{{ $user->email }}</span>
                </a>

                <a
                  href="#"
                  class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150"
                >
                  <img
                    src="{{ url('img/logo_company.png') }}"
                    alt=""
                    class="rounded-full h-6 shadow-md inline-block mr-2"
                  />
                    Phone
                  
                  <span class="text-gray-500 text-xs">{{ $user->employee->phone }}</span>
                </a>

                <a
                  href="#"
                  class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150"
                >
                  <img
                    src="{{ url('img/logo_company.png') }}"
                    alt=""
                    class="rounded-full h-6 shadow-md inline-block mr-2"
                  />
                  Position
                  <span class="text-gray-500 text-xs">{{ $user->employee->position }}</span>
                </a>

                <a
                  href="#"
                  class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150"
                >
                  <img
                    src="{{ url('img/logo_company.png') }}"
                    alt=""
                    class="rounded-full h-6 shadow-md inline-block mr-2"
                  />
                  Your Salary
                  <span class="text-gray-500 text-xs">Rp. {{ number_format($user->employee->base_salary) }}</span>
                </a>

                <a
                  href="#"
                  class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150 overflow-hidden"
                >
                  <img
                    src="{{ url('img/logo_company.png') }}"
                    alt=""
                    class="rounded-full h-6 shadow-md inline-block mr-2"
                  />
                  Leave Requests Left
                  <span class="text-gray-500 text-xs">{{ $user->employee->leave_request_left }}</span>
                  <a href="{{ route('profile.leave_requests.show') }}" class="text-sm text-blue-600 my-2">See all my leave requests</a>
                </a>
              </div>
            </div>
          </div>

          @endif
          
        </div>
      </div>
    </div>
</x-app-layout>