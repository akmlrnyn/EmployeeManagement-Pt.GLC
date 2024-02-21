<x-app-layout>
    @foreach ($slips as $item)
    <div class="w-5/6 sm:w-3/5 mx-auto my-4 bg-white shadow-lg border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-100">
        <a href="{{ route('profile.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" height="22" width="20.5" class="mx-4 mt-4" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
        </a>
        <h2 class="text-gray-700 text-xl sm:text-3xl font-bold px-4 py-1 pt-2 sm:pt-3">Salary Details</h2>
        <p class="text-gray-700 text-xs sm:text-base font-normal px-4 ">{{ date('d M Y', strtotime($item->created_at) )}}</p>
        <hr>
        <div class="flex flex-col items-start pb-5 px-5">
            <img class="mt-5 w-12 h-12 sm:w-16 sm:h-16 mb-3 rounded-full shadow-lg" src="{{ url('img/icon_avatar.png') }}" alt="Bonnie image"/>
            <h5 class="sm:mb-1 text-base sm:text-xl font-normal text-gray-900">{{ $item->employee->name }}</h5>
            <span class="text-xs sm:text-sm text-gray-500 dark:text-gray-500">{{ $item->employee->position }}</span>
            <div class="flex mt-4 md:mt-6 gap-5">
            <a class="px-2 sm:px-3 py-2 sm:py-2.5 bg-blue-500 rounded text-xs text-white shadow" href="{{route('salary-slips.print_pdf', $item->id)}}" target="_blank">Print Salary Slip</a>
        </div>
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
                    <div class="text-xs sm:text-sm mt-2">Name: {{ $item->employee->name }}</div>
                    <div class="text-xs sm:text-sm mt-2">Email: {{ $item->employee->user->email }}</div>
                    <div class="text-xs sm:text-sm mt-2">Phone: {{ $item->employee->phone }}</div>
                    <div class="text-xs sm:text-sm mt-2">Month: {{ $item->month }}</div>
                    <div class="text-xs sm:text-sm mt-2">Gross Salary: Rp.{{ number_format($item->employee->base_salary) }}</div>
                </div>
                <div class="bg-yellow-100 p-3 rounded-lg mb-2">
                    <h2 class="font-semibold text-base sm:text-xl text-yellow-900">Staff Stats</h2>
                    <hr>
                    <div class="text-xs sm:text-sm mt-2">Total Leave Request: {{ $item->leave_request }} Day(s)</div>
                    <div class="text-xs sm:text-sm mt-2">Total Late: {{ $item->late }} hour(s)</div>
                    <div class="text-xs sm:text-sm mt-2">Total Overtime: {{ $item->overtime }} hour(s)</div>
                    <div class="text-xs sm:text-sm mt-2">Tax: Rp.{{ $item->tax }}</div>
                    <div class="text-xs sm:text-sm mt-2">BPJS: Rp.{{ $item->bpjs }}</div>
                </div>
                <div class="bg-blue-100 p-3 rounded-lg mb-2">
                    <h2 class="font-semibold text-base sm:text-xl">The Summary</h2>
                    <hr>
                    <div class="text-xs sm:text-sm mt-2">NET Salary: Rp.{{ number_format($item->salary) }}</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>
