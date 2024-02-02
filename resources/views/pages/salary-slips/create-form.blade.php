<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-0 sm:p-12">
  <div class="mx-auto max-w-lg px-6 py-12 bg-white border-0 shadow-lg rounded-2xl">
    <div class="mx-auto mb-4">
    <h2 class="text-gray-700 text-3xl font-bold">New Salary Slip</h2>
    <p class="text-gray-500">Make slip in each month for staffs</p>
    </div>
    <form id="form" method="POST" action="{{ route('salary-slips.store') }}">
        @csrf
        <div class="relative z-0 w-full mb-2">
        <label class="text-gray-500 text-sm" for="employee_id">Staff name</label>
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
          class="pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200"
        />
        </div>
        <div class="relative z-0 w-full mb-5">
        <label class="text-gray-500 text-sm" for="salary">Current Salary</label>
        <input
        id="salary"
          type="number"
          name="salary"
          value="{{ $staff->base_salary }}"
          class="pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200"
        />
      </div>
      <div class="relative z-0 w-full mb-5">
        <label class="text-gray-500 text-sm" for="month">Choose Month</label>
            <select id="month" name="month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1">
                    <option disabled><--------></option>
                    <option value="january">January</option>
                    <option value="february">February</option>
                    <option value="march">March</option>
                    <option value="april">April</option>
                    <option value="may">May</option>
                    <option value="june">June</option>
                    <option value="july">July</option>
                    <option value="august">August</option>
                    <option value="september">September</option>
                    <option value="october">October</option>
                    <option value="november">November</option>
                    <option value="december">December</option>
            </select>
      </div>
      
      <div class="relative z-0 w-full mb-5">
        <label class="text-gray-500 text-sm" for="leave_request">Leave Request</label>
        <input
          type="number"
          name="leave_request"
          placeholder="Leave Requests ( Days )"
          value="{{ old('leave_request') }}"
          required
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200"
        />
      </div>


      <div class="relative z-0 w-full mb-5">
        <label class="text-gray-500 text-sm" for="overtime">Overtime</label>
        <input
          type="number"
          name="overtime"
          placeholder="Overtime ( Hours )"
          value="{{ old('overtime') }}"
          required
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200"
        />
      </div>

      <div class="relative z-0 w-full mb-5">
        <label class="text-gray-500 text-sm" for="late">Late</label>
        <input
          type="number"
          name="late"
          placeholder="Late ( Hours )"
          value="{{ old('late') }}"
          required
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200"
        />
      </div>

      <div class="relative z-0 w-full mb-5">
        <label class="text-gray-500 text-sm" for="tex">Tax (Rp.)</label>
        <input
          type="number"
          name="tax"
          placeholder="Tax ( Rp. )"
          value="{{ old('tax') }}"
          required
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200"
        />
      </div>

      <button
        id="button"
        type="submit"
        class=" px-4 py-2 mt-3 text-sm text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-500 hover:bg-blue-600 hover:shadow-lg focus:outline-none"
      >
        Create New Slip
      </button>
    </form>
  </div>
</div>
</x-app-layout>