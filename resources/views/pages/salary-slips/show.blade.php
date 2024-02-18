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
        <div class="flex mt-4 md:mt-6 gap-5">
            <a href="{{ route('employees.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Manage Staff</a>
            <a class="p-4 bg-blue-500 rounded-lg text-white" href="{{route('salary-slips.print_pdf', $slip->id)}}" target="_blank">Print Salary Slip</a>
        </div>
        <div class="flex flex-col items-start pb-5 px-5">
            <img class="w-12 h-12 sm:w-16 sm:h-16 mb-3 rounded-full shadow-lg" src="{{ url('img/icon_avatar.png') }}" alt="Bonnie image"/>
            <h5 class="sm:mb-1 text-base sm:text-xl font-normal text-gray-900">{{ $slip->employee->name }}</h5>
            <span class="text-xs sm:text-sm text-gray-500 dark:text-gray-500">{{ $slip->employee->position }}</span>
        </div>
        <hr>
        <div class="flex flex-col sm:flex-row gap-x-3 px-5 sm:px-3 py-3 justify-start items-start sm:items-center">
            <div class="image-slip">
                <img src="{{ url('img/logoputih.jpg') }}" alt="" class="w-14 sm:w-32 mb-2 sm:mb-0">
            </div>
            <div class="sm:px-4">
                <h2 class="text-sm sm:text-xl font-medium">PT. GLC Indonesia</h2>
                <p class="text-xs sm:text-sm">Mail: glc@glcmanning.co.id</p>
                <p class="text-xs sm:text-sm">Tel: 021-21057959, 2105-7595</p>
                <p class="text-xs sm:text-sm">Address: Rukan Avenue Jakarta Garden City kel Cakung Tim., <br>Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta - 13910</p>
            </div>
        </div>
        <div>
            <div class="information py-2 px-5">
                <div class="bg-gray-100 p-2.5 sm:p-3 rounded-lg mb-2">
                    <h2 class="font-semibold text-base sm:text-xl">Basic Information</h2>
                    <hr>
                    <div class="text-xs sm:text-sm mt-2">Name: {{ $slip->employee->name }}</div>
                    <div class="text-xs sm:text-sm mt-2">Email: {{ $slip->employee->user->email }}</div>
                    <div class="text-xs sm:text-sm mt-2">Phone: {{ $slip->employee->phone }}</div>
                    <div class="text-xs sm:text-sm mt-2">Month: {{ $slip->month }}</div>
                    <div class="text-xs sm:text-sm mt-2">Gross Salary: Rp.{{ number_format($slip->employee->base_salary) }}</div>
                </div>
                <div class="bg-yellow-100 p-3 rounded-lg mb-2">
                    <h2 class="font-semibold text-base sm:text-xl text-yellow-900">Staff Stats</h2>
                    <hr>
                    <div class="text-xs sm:text-sm mt-2">Total Leave Request: {{ $slip->leave_request }} Day(s)</div>
                    <div class="text-xs sm:text-sm mt-2">Total Late: {{ $slip->late }} hour(s)</div>
                    <div class="text-xs sm:text-sm mt-2">Total Overtime: {{ $slip->overtime }} hour(s)</div>
                    <div class="text-xs sm:text-sm mt-2">Tax: Rp.{{ $slip->tax }}</div>
                    <div class="text-xs sm:text-sm mt-2">BPJS: Rp.{{ $slip->bpjs }}</div>
                </div>
                <div class="bg-blue-100 p-3 rounded-lg mb-2">
                    <h2 class="font-semibold text-base sm:text-xl">The Summary</h2>
                    <hr>
                    <div class="text-xs sm:text-sm mt-2">NET Salary: Rp.{{ number_format($slip->salary) }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
