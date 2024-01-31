<x-app-layout>
    
<div class="w-3/5 mx-auto my-4 bg-white shadow-lg border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-100">
    <h2 class="text-gray-700 text-3xl font-bold px-4 py-1 pt-3">Salary Details</h2>
    <p class="text-gray-700 text-md font-normal px-4 ">{{ date('d M Y', strtotime($slip->created_at) )}}</p>
    <hr>
    <div class="flex justify-end px-4 pt-4">
        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
        </button>
    </div>
    <div class="flex flex-col items-center pb-5">
        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ url('img/icon_avatar.png') }}" alt="Bonnie image"/>
        <h5 class="mb-1 text-xl font-normal text-gray-900">{{ $slip->employee->name }}</h5>
        <span class="text-sm text-gray-500 dark:text-gray-500">{{ $slip->employee->position }}</span>
        <div class="flex mt-4 md:mt-6">
            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Manage Staff</a>
        </div>
    </div>
    <div>
        <div class="information py-2 px-5">
            <div class="bg-gray-100 p-3 rounded-lg mb-2">
            <h2 class="font-semibold text-xl">Basic Information</h2>
            <hr>
            <div class="text-sm font-normal mt-2">Name: {{ $slip->employee->name }}</div>
            <div class="text-sm font-normal mt-2">Email: {{ $slip->employee->email }}</div>
            <div class="text-sm font-normal mt-2">Phone: {{ $slip->employee->phone }}</div>
            <div class="text-sm font-normal mt-2">Month: {{ $slip->month }}</div>
            <div class="text-sm font-normal mt-2">Gross Salary: {{ number_format($slip->employee->base_salary) }}</div>
            </div>
            <div class="bg-yellow-100 p-3 rounded-lg mb-2">
            <h2 class="font-semibold text-xl text-yellow-900">Staff Stats</h2>
            <hr>
            <div class="text-sm font-normal mt-2">Total Leave Request: {{ $slip->leave_request }}x</div>
            <div class="text-sm font-normal mt-2">Total Late: {{ $slip->late }}x</div>
            <div class="text-sm font-normal mt-2">Total Overtime: {{ $slip->overtime }}x</div>
            <div class="text-sm font-normal mt-2">Tax: Rp.{{ $slip->tax }}</div>
            </div>
            <div class="bg-blue-100 p-3 rounded-lg mb-2">
            <h2 class="font-semibold text-xl">The Summary</h2>
            <hr>
            <div class="text-sm font-normal mt-2">NET Salary: {{ number_format($slip->salary) }}</div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>