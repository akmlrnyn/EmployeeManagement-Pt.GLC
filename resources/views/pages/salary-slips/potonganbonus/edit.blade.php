<x-app-layout>
    <!-- component -->
    <div class=" p-6 bg-gray-100 flex items-center justify-center">
    <div class="container max-w-screen-lg mx-auto">
        <div>
        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
            <div class="text-gray-600">
                <p class="font-medium text-lg sm:text-2xl">Edit Salary Structure</p>
                <p class="text-xs sm:text-sm">Overtime bonus and Late cut</p>
            </div>

            <div class="lg:col-span-2">
                <form action="{{ route('potongan-bonus.update', $item->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                        <div class="md:col-span-5">
                            <label class="text-xs sm:text-base" for="bonus_overtime">Overtime Bonus / hour</label>
                            <input type="text" name="bonus_overtime" id="bonus_overtime" class="text-xs sm:text-base h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('bonus_overtime') ?? $item->bonus_overtime }}"  />
                        </div>

                        <div class="md:col-span-5">
                            <label class="text-xs sm:text-base" for="potongan_terlambat">Late Cut / hour</label>
                            <input type="text" name="potongan_terlambat" id="potongan_terlambat" class="text-xs sm:text-base h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('potongan_terlambat') ?? $item->potongan_terlambat }}" />
                        </div>
                
                        <div class="md:col-span-5 text-right">
                            <div class="inline-flex items-end gap-3">
                            <button class="text-xs bg-blue-500 hover:bg-blue-700 text-white sm:font-bold py-2 px-4 rounded" type="submit">Submit</button>
                            <a href="{{ route('salary-slips.index') }}" class="text-xs bg-red-500 hover:bg-red-700 text-white sm:font-bold py-2 px-4 rounded" >Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</x-app-layout>