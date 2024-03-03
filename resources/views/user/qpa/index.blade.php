<x-app-layout>
    {{-- information qpa --}}
    <div class="container mx-auto mt-5">
            <div
                class="transition ease-in duration-200 shadow-sm hover:shadow-md hover:shadow-blue-400/50 px-3 sm:px-7 pt-6 bg-white ring-1 ring-gray-900/5 rounded-lg">
                <a href="{{ route('profile.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mb-3" height="22" width="20.5" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                </a>
                <div class="">
                    <p class="text-sm sm:text-base text-slate-800">How the <strong>QPA</strong> works to calculate
                        employee predicates?</p>
                </div>
                <div class="flex flex-col sm:flex-row justify-around text-center">
                    <div class="py-8 px-5 w-full sm:w-1/4">
                        <h1 class="text-lg sm:text-2xl font-light">90 - 100</h1>
                        <p class="text-sm sm:text-base">Predicate: <span class="text-blue-600">Great</span></p>
                    </div>
                    <div class="py-8 px-5 w-full sm:w-1/4">
                        <h1 class="text-lg sm:text-2xl font-light">80 - 89</h1>
                        <p class="text-sm sm:text-base">Predicate: <span class="text-emerald-500">Good Enough</span></p>
                    </div>
                    <div class="py-8 px-5 w-full sm:w-1/4">
                        <h1 class="text-lg sm:text-2xl font-light">70 - 79</h1>
                        <p class="text-sm sm:text-base">Predicate: <span class="text-yellow-500">Need Enhancement</span>
                        </p>
                    </div>
                    <div class="py-8 px-5 w-full sm:w-1/4">
                        <h1 class="text-lg sm:text-2xl font-light">69-</h1>
                        <p class="text-sm sm:text-base">Predicate: <span class="text-red-500">Bad</span></p>
                    </div>
                </div>
                <hr>
                <div class="pb-3 pt-1">
                    <p class="text-gray-600 text-sm sm:text-base">What things that would impact the QPA Score?</p>
                    <div>
                        <p class="text-gray-600 text-xs sm:text-sm">- Once Late without permission will decrease of 5 points</p>
                        <p class="text-gray-600 text-xs sm:text-sm">- Once Take Permission will decrease of 3 points</p>
                    </div>
                </div>

            </div>
    </div>
</x-app-layout>