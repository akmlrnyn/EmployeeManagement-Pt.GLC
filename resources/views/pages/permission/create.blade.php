<x-app-layout>
  <div class="w-5/6 sm:w-4/5 mx-auto mt-4">
    <a href="{{ route('permission.index') }}">
    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="18.5" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
    </a>
        <h2 class="text-gray-700 text-xl sm:text-3xl font-bold mt-2">Choose Staff </h2>
        <p class="text-sm sm:text-base">To make new permission</p>
        @if($employee->count() === 0)
        <div class="mt-6">
            <section class="grid gap-6 my-6 md:grid-cols-3">
                <div
                    class="p-3 sm:p-6 bg-white transition ease-in duration-200 shadow hover:shadow-xl rounded sm:rounded-2xl">
                    <dl class="sm:space-y-2">
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" height="19" width="12" viewBox="0 0 512 512">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#b11b1b"
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                            </svg>
                            <dt class="text-xs sm:text-sm font-medium text-red-500">You don't have employees yet</dt>
                        </div>
                        <dd class="text-xl md:text-3xl"></dd>
                        <dd class="flex items-center space-x-1 text-xs sm:text-sm font-medium text-blue-500">
                            <a href="{{route('employees.create')}}">Make employee +</a>
                        </dd>
                    </dl>
                </div>
            </section>
            @endif

        <ul class="divide-y divide-gray-200 bg-white mx-auto my-2 sm:my-5 rounded-lg shadow-lg">
            @php($number = 1)
            @foreach ($employee as $item)
            <li class="flex items-center py-4 px-6">
            <span class="text-gray-700 text-xs sm:text-lg font-medium mr-4">{{ $number }}</span>
            <img
                class="w-8 h-8 sm:w-12 sm:h-12 rounded-full object-cover mr-4"
                src="{{ url('img/logo_company.png') }}"
                alt="User avatar"
            />
            <div class="flex-1">
                <h3 class="text-xs sm:text-lg font-medium text-gray-800">{{ $item->name }}</h3>
                <p class="text-gray-600 text-xs sm:text-base">{{ $item->position }}</p>
            </div>
            <div>
                <a href="{{ route('permission.create_form', $item->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:font-medium rounded sm:rounded-lg text-xs sm:text-sm px-2 sm:px-5 py-1.5 sm:py-2.5 me-2 sm:mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">+</a>
            </div>
            </li>
            @php($number++)
            @endforeach
        </ul>
        </div>
</x-app-layout>