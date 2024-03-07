<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-3 sm:p-12">
        <div class="mx-auto max-w-lg px-6 py-12 bg-white border-0 shadow-lg rounded sm:rounded-2xl">
            <div class="mx-auto mb-4">
                <h2 class="text-gray-700 text-xl sm:text-3xl font-bold">Edit Salary Structure</h2>
                <p class="text-sm sm:text-base text-gray-500">Overtime bonus and Late cut</p>
            </div>
            <form action="{{ route('potongan-bonus.update', $item->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="relative z-0 w-full mb-2">
                    <label class="text-gray-500 text-xs sm:text-sm" for="bonus_overtime">Bonus overtime / hour</label>
                    <input
                        id="bonus_overtime"
                        type="number"
                        name="bonus_overtime"
                        required
                        value="{{ old('bonus_overtime') ?? $item->bonus_overtime }}"
                        class="pb-2 block text-sm sm:text-base w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200"
                    />
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label class="text-gray-500 text-xs sm:text-sm" for="potongan_terlambat">Late Cut / times</label>
                    <input
                        id="potongan_terlambat"
                        type="number"
                        name="potongan_terlambat"
                        required
                        value="{{ old('potongan_terlambat') ?? $item->potongan_terlambat }}"
                        class="pt-3 pb-2 block text-sm sm:text-base w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200"
                    />
                </div>
                
                <button
                    id="button"
                    type="submit"
                    class="px-4 py-2 mt-3 text-xs text-lg text-white transition-all duration-150 ease-linear rounded shadow outline-none bg-blue-500 hover:bg-blue-600 hover:shadow-lg focus:outline-none mb-3"
                >
                    Edit Structure
                </button>
                <a href="{{ route('salary-slips.index') }}" class="text-xs bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">Cancel</a>
            </form>
        </div>
    </div>
</x-app-layout>
