<nav class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between">
        <div class="text-lg font-semibold text-gray-900 dark:text-white">
            CRM Dashboard
        </div>
        <div class="text-sm text-gray-600 dark:text-gray-300">
            Logged in as: {{ Auth::user()->name }}
        </div>
    </div>
</nav>
