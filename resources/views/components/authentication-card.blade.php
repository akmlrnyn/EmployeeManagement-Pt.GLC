<div class="min-h-screen w-full flex flex-col justify-center items-center bg-gray-100">
    <div>
        {{ $logo }}
    </div>

    <div style="width: 90%" class="sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden rounded-lg">
        {{ $slot }}
    </div>
</div>
