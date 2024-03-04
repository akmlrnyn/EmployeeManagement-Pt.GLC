<x-app-layout>
    <div class="container mx-auto py-16 sm:py-32">
        <div>
            <div class="bg-white relative shadow-lg rounded-lg mx-2 sm:w-5/6 lg:w-4/6 sm:mx-auto">
                <div class="flex justify-center">
                    <img src="{{ url('img/icon_avatar.png') }}" alt="" class="rounded-full mx-auto absolute -top-5 sm:-top-20 w-16 sm:w-20 h-16 sm:h-20 md:w-28 md:h-28 shadow-md border-4 border-white" />
                </div>
                @if (Auth::user()->id)
                    @php
                        $userId = Auth::user()->id;
                        $employee = App\Models\Employee::where('user_id', $userId)->first();
                    @endphp

                    @if ($employee)
                        @if (Auth::user()->roles == 'user')
                        <div class="mt-16">
                            <h1 class="font-bold text-center text-base lg:text-2xl text-gray-900">{{ $user->employee->name }}</h1>
                            <p class="text-center text-xs sm:text-sm text-gray-400 font-normal mt-2">{{ $user->employee->position }}</p>
                            <p><span></span></p>

                            <div class="flex flex-wrap justify-between items-center my-3 sm:my-5 px-6">
                                <p class="text-gray-500 border-b-2 sm:border-b-4 rounded transition duration-150 ease-in font-medium text-xs sm:text-sm text-center w-1/2 sm:w-1/4 py-3">All Details</p>
                                <a href="{{ route('profile.leave_request') }}" class="text-gray-500 hover:text-gray-900 hover:bg-blue-100 rounded transition duration-150 ease-in font-medium text-xs sm:text-sm text-center w-1/2 sm:w-1/4 py-3">Ask Leave Requests</a>
                                <a href="{{ route('profile.permission') }}" class="text-gray-500 hover:text-gray-900 hover:bg-blue-100 rounded transition duration-150 ease-in font-medium text-xs sm:text-sm text-center w-1/2 sm:w-1/4 py-3">Ask Permission</a>
                                <a href="{{ route('profile.salary_slip') }}" class="text-gray-500 hover:text-gray-900 hover:bg-blue-100 rounded transition duration-150 ease-in font-medium text-xs sm:text-sm text-center w-1/2 sm:w-1/4 py-3">My Salary Slips</a>
                            </div>

                            <div class="w-full">
                                <h3 class="text-sm sm:text-lg font-medium text-gray-900 text-left px-6">Employee Detail</h3>
                                <div class="mt-5 w-full flex flex-col items-center overflow-hidden text-xs sm:text-sm">
                                    <p class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                        <img src="{{ url('img/logo_company.png') }}" alt="" class="rounded-full h-6 shadow-md inline-block mr-2" />
                                        Email
                                        <span class="text-gray-500 text-xs">{{ $user->email }}</span>
                                    </p>

                                    <p class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                        <img src="{{ url('img/logo_company.png') }}" alt="" class="rounded-full h-6 shadow-md inline-block mr-2" />
                                        Phone
                                        <span class="text-gray-500 text-xs">{{ $user->phone }}</span>
                                    </p>

                                    @if ($user->secondary_phone)
                                        
                                    <p class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                        <img src="{{ url('img/logo_company.png') }}" alt="" class="rounded-full h-6 shadow-md inline-block mr-2" />
                                        Secondary Phone
                                        <span class="text-gray-500 text-xs">{{ $user->secondary_phone }}</span>
                                    </p>

                                    @endif


                                    <p class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                        <img src="{{ url('img/logo_company.png') }}" alt="" class="rounded-full h-6 shadow-md inline-block mr-2" />
                                        Position
                                        <span class="text-gray-500 text-xs">{{ $user->employee->position }}</span>
                                    </p>

                                    <p class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                        <img src="{{ url('img/logo_company.png') }}" alt="" class="rounded-full h-6 shadow-md inline-block mr-2" />
                                        Your Salary
                                        <span class="text-gray-500 text-xs">Rp. {{ number_format($user->employee->base_salary) }}</span>
                                    </p>

                                    <p class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                        <img src="{{ url('img/logo_company.png') }}" alt="" class="rounded-full h-6 shadow-md inline-block mr-2" />
                                        Current QPA Score
                                        <span class="text-gray-500 text-xs">{{ $user->employee->qpa }}</span><a href= "{{ route('profile.qpa.index') }}" class="rounded p-1 text-center text-xs bg-gray-300 m-2">?</a>
                                    </p>

                                    <p class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150 overflow-hidden">
                                        <img src="{{ url('img/logo_company.png') }}" alt="" class="rounded-full h-6 shadow-md inline-block mr-2" />
                                        Leave Requests Left
                                        <span class="text-gray-500 text-xs">{{ $user->employee->leave_request_left }}</span>
                                    </p>
                                        <a href="{{ route('profile.leave_requests.show') }}" class="bg-blue-100 py-1 sm:py-2 px-2 sm:px-3 rounded text-xs sm:text-sm text-blue-600 my-1">See all my leave requests</a>
                                        <a href="{{ route('profile.permission.show') }}" class="bg-blue-100 py-1 sm:py-2 px-2 sm:px-3 rounded text-xs sm:text-sm text-blue-600 mb-2">See all my permissions</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @else
                        <p class="mt-12 text-center font-medium text-xs sm:text-base">You haven't registered as an employee yet.</p>
                    @endif
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
