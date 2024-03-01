<x-app-layout>
    <div class="container mx-auto py-40">
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
          <a href="{{ route('employees.index') }}">
    <svg xmlns="http://www.w3.org/2000/svg" height="25" width="23.5" class="mx-6 mt-6" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
    </a>

          <div class="mt-8">
            <h1 class="font-bold text-center text-lg lg:text-3xl text-gray-900">
              {{ $employee->user->name }}
            </h1>
            <p class="text-center text-sm text-gray-400 font-medium">
              {{ $employee->position }}
            </p>

            <div class="flex justify-between items-center my-5 px-6">
              <p
                class="text-gray-500 hover:text-gray-900 hover:bg-blue-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3"
                >All Details</p
              >
            </div>

            <div class="w-full">
              <h3 class="font-medium text-gray-900 text-left px-6">
                Employee's Detail
              </h3>
              <div
                class="mt-5 w-full flex flex-col items-center overflow-hidden text-sm"
              >
                <p
                  class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150"
                >
                    Name : 
                  <span class="text-gray-500 text-xs">{{ $employee->user->name }}</span>
            </p>

                <p
                  class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150"
                >

                    Email :
                  <span class="text-gray-500 text-xs">{{ $employee->user->email }}</span>
          </p>
                <p
                  class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150"
                >

                    Phone :
                  <span class="text-gray-500 text-xs">{{ $employee->user->phone }}</span>
          </p>

          <p
                  class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150"
                >

                    Secondary Phone :
                    @if ($employee->user->secondary_phone)
                    <span class="text-gray-500 text-xs">{{ $employee->user->secondary_phone }}</span>
                    @else
                        <span class="text-gray-500 text-xs">Staff doesn't input secondary phone</span>
                    @endif
          </p>

                <p
                  class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150"
                >

                    Position :
                  <span class="text-gray-500 text-xs">{{ $employee->position }}</span>
        </p>

                <p
                  class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150"
                >

                  Gross Salary :
                  <span class="text-gray-500 text-xs">Rp.{{ number_format($employee->base_salary) }}</span>
      </p>

                <p
                  href="#"
                  class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150 overflow-hidden"
                >

                  Leave Requests Left
                  <span class="text-gray-500 text-xs">{{ $employee->leave_request_left }} Day(s)</span>
    </p>
    <p
                  href="#"
                  class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150 overflow-hidden"
                >

                  Current QPA Score
                  <span class="text-gray-500 text-xs">{{ $employee->qpa }}</span>
    </p>
              </div>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>