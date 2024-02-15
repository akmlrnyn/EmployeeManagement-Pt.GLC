<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-3 sm:p-12">
        <div class="mx-auto max-w-lg px-6 py-12 bg-white border-0 shadow-lg rounded sm:rounded-2xl">
            <div class="mx-auto mb-4">
                <h2 class="text-gray-700 text-xl sm:text-3xl font-bold">New Salary Slip</h2>
                <p class="text-sm sm:text-base text-gray-500">Make slip in each month for staffs</p>
            </div>
            <form id="form" method="POST" action="{{ route('salary-slips.store') }}">
                @csrf
                <div class="relative z-0 w-full mb-2">
                    <label class="text-gray-500 text-xs sm:text-sm" for="employee_id">Staff name</label>
                    <input
                        type="hidden"
                        name="employee_id"
                        value="{{ $staff->id }}"
                    />
                    <input
                        id="employee_id"
                        type="text"
                        disabled
                        value="{{ $staff->name }}"
                        class="pb-2 block text-sm sm:text-base w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200"
                    />
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label class="text-gray-500 text-xs sm:text-sm" for="salary">Current Salary</label>
                    <input
                        id="salary"
                        type="number"
                        name="salary"
                        value="{{ $staff->base_salary }}"
                        class="pb-2 block text-sm sm:text-base w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200"
                    />
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label class="text-gray-500 text-xs sm:text-sm" for="month">Choose Month</label>
                    <select id="month" name="month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1">
                        <option disabled><--------></option>
                        <option value="january"{{ $currentMonth == 'January' ? 'selected' : '' }}>January</option>
                        <option value="february"{{ $currentMonth == 'February' ? 'selected' : '' }}>February</option>
                        <option value="march"{{ $currentMonth == 'March' ? 'selected' : '' }}>March</option>
                        <option value="april"{{ $currentMonth == 'April' ? 'selected' : '' }}>April</option>
                        <option value="may"{{ $currentMonth == 'May' ? 'selected' : '' }}>May</option>
                        <option value="june"{{ $currentMonth == 'June' ? 'selected' : '' }}>June</option>
                        <option value="july"{{ $currentMonth == 'July' ? 'selected' : '' }}>July</option>
                        <option value="august"{{ $currentMonth == 'August' ? 'selected' : '' }}>August</option>
                        <option value="september"{{ $currentMonth == 'September' ? 'selected' : '' }}>September</option>
                        <option value="october"{{ $currentMonth == 'October' ? 'selected' : '' }}>October</option>
                        <option value="november"{{ $currentMonth == 'November' ? 'selected' : '' }}>November</option>
                        <option value="december"{{ $currentMonth == 'December' ? 'selected' : '' }}>December</option>
                    </select>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label class="text-gray-500 text-xs sm:text-sm" for="leave_request">Leave Request</label>
                    <input
                        type="number"
                        name="leave_request"
                        placeholder="Leave Requests ( Days )"
                        value="{{ old('leave_request') }}"
                        required
                        class="pt-3 pb-2 block text-sm sm:text-base w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200"
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label class="text-gray-500 text-xs sm:text-sm" for="overtime">Overtime</label>
                    <input
                        type="number"
                        name="overtime"
                        placeholder="Overtime ( Hours )"
                        value="{{ old('overtime') }}"
                        required
                        class="pt-3 pb-2 block text-sm sm:text-base w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200"
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label class="text-gray-500 text-xs sm:text-sm" for="late">Late</label>
                    <input
                        type="number"
                        name="late"
                        placeholder="Late ( Hours )"
                        value="{{ old('late') }}"
                        required
                        class="pt-3 pb-2 block text-sm sm:text-base w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200"
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label class="text-gray-500 text-xs sm:text-sm" for="tax">Tax (Rp.)</label>
                    <input
                        type="number"
                        name="tax"
                        placeholder="Tax ( Rp. )"
                        value="{{ old('tax') }}"
                        required
                        class="pt-3 pb-2 block text-sm sm:text-base w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200"
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label class="text-gray-500 text-xs sm:text-sm" for="bpjs">BPJS (Rp.)</label>
                    <input
                        type="number"
                        name="bpjs"
                        placeholder="BPJS ( Rp. )"
                        value="{{ old('bpjs') }}"
                        required
                        class="pt-3 pb-2 block text-sm sm:text-base w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200"
                    />
                </div>

                <button
                    id="button"
                    type="submit"
                    class="px-4 py-2 mt-3 text-xs text-lg text-white transition-all duration-150 ease-linear rounded shadow outline-none bg-blue-500 hover:bg-blue-600 hover:shadow-lg focus:outline-none"
                >
                    Create New Slip
                </button>
                <a href="{{ route('salary-slips.create') }}" class="text-xs bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">Cancel</a>
            </form>
        </div>
    </div>
</x-app-layout>
