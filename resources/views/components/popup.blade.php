<!-- resources/views/components/popup.blade.php -->
<div 
    id="{{ $id ?? 'customPopup' }}" 
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden "
>
    <div class="bg-white text-black dark:bg-gray-900 dark:text-gray-400 rounded-2xl shadow-xl max-w-sm w-full p-6 text-center relative">
        <h2 class="text-xl font-semibold mb-2" id="{{ $id ?? 'customPopup' }}Title">
            {{ $title ?? 'Notice' }}
        </h2>
        <p class="text-gray-700 mb-4 dark:bg-gray-900 text-gray-400" id="{{ $id ?? 'customPopup' }}Message    ">
            {{ $message ?? 'Something happened!' }}
        </p>
        <button 
            onclick="document.getElementById('{{ $id ?? 'customPopup' }}').classList.add('hidden')" 
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
        >
            Close
        </button>
    </div>
</div>
