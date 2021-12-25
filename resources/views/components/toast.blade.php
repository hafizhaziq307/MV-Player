<!-- toast -->
<div x-data="{ open: true }" @click="open = false" x-show="open" x-transition.duration.300ms
    class="fixed top-4 right-4 transition text-white bg-emerald-500 hover:bg-emerald-600 rounded-md px-5 py-4 cursor-pointer z-50 select-none shadow-md shadow-green-700">

    <div class="flex items-center space-x-2">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
        </svg>

        <p class="font-bold">{{ $message }}</p>
    </div>
</div>
