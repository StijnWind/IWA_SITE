@if(session()->has('error'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" 
  x-animation:enter="transform ease-out duration-300 transition"
  x-animation:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
  x-animation:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
  x-animation:leave="transform ease-out duration-300 transition"
  x-animation:leave-start="translate-y-0 opacity-100 sm:translate-x-0"
  x-animation:leave-end="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
  aria-live="assertive" class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6 z-50">
  <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
    <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
      <div class="p-4">
        <div class="flex items-start">
          <div class="flex-shrink-0">
            <svg class="h-6 w-6 text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
            </svg>            
          </div>
          <div class="ml-3 w-0 flex-1 pt-0.5">
            <p class="text-sm font-medium text-gray-900">Error!</p>
            <p class="mt-1 text-sm text-gray-500">{{ session('error') }}</p>
          </div>
          <div class="ml-4 flex flex-shrink-0">
            <button @click.on="show=false" class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
              <span class="sr-only">Close</span>
              <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@if(session()->has('success'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" 
  x-animation:enter="transform ease-out duration-300 transition"
  x-animation:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
  x-animation:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
  x-animation:leave="transform ease-out duration-300 transition"
  x-animation:leave-start="translate-y-0 opacity-100 sm:translate-x-0"
  x-animation:leave-end="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
  aria-live="assertive" class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6 z-50">
  <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
    <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
      <div class="p-4">
        <div class="flex items-start">
          <div class="flex-shrink-0">
            <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div class="ml-3 w-0 flex-1 pt-0.5">
            <p class="text-sm font-medium text-gray-900">Success!</p>
            <p class="mt-1 text-sm text-gray-500">{{ session('success') }}</p>
          </div>
          <div class="ml-4 flex flex-shrink-0">
            <button @click.on="show=false" class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
              <span class="sr-only">Close</span>
              <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" 
  x-animation:enter="transform ease-out duration-300 transition"
  x-animation:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
  x-animation:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
  x-animation:leave="transform ease-out duration-300 transition"
  x-animation:leave-start="translate-y-0 opacity-100 sm:translate-x-0"
  x-animation:leave-end="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
  aria-live="assertive" class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6 z-50">
  <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
    <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
      <div class="p-4">
        <div class="flex items-start">
          <div class="flex-shrink-0">
            <svg class="h-6 w-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
            </svg>            
          </div>
          <div class="ml-3 w-0 flex-1 pt-0.5">
            <p class="text-sm font-medium text-gray-900">Melding!</p>
            <p class="mt-1 text-sm text-gray-500">{{ session('message') }}</p>
          </div>
          <div class="ml-4 flex flex-shrink-0">
            <button @click.on="show=false" class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
              <span class="sr-only">Close</span>
              <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif