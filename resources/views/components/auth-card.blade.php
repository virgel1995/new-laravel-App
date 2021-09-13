<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-blue-500">

    <div class="pt-10">
        {{ $logo }}
    </div>

    <div class="py-3 ">
        {{ $head }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
    <div class="py-3"></div>
</div>
