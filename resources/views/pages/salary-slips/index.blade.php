<x-app-layout>
    <div class="w-4/5 mx-auto mt-4">
        <h2 class="text-gray-700 text-3xl font-bold">All Salary Slips </h2>
        <p>Belongs to the employees</p>

        <div class="mt-4 w-full p-4 bg-white border border-gray-200 rounded-lg shadow-lg sm:p-8 bg-gray-800 border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 ">Staff Salaries</h5>
                <a href="{{ route('salary-slips.create') }}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                    Create New Salary Slip +
                </a>
            </div>

            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($slips as $item)
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="w-8 h-8 rounded-full" src="{{ url('img/logo_company.png') }}" alt="Neil image">
                                </div>
                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="text-sm font-medium text-gray-900 truncate ">
                                        {{ $item->employee->name }}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        {{ $item->month }}
                                    </p>
                                </div>
                                <div class="flex gap-2 items-center text-base font-semibold text-gray-900 ">
                                    <div>Rp. {{ number_format($item->salary) }}</div>
                                    <div>
                                        <a href="{{ route('salary-slips.show', $item->id) }}">
                                            <button type="button" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-5 py-2.5 me-2 dark:bg-blue-500 dark:hover:bg-blue-600 focus:outline-none dark:focus:ring-blue-800">
                                                See Detail
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <hr>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
