@props([ 
    'id' => 'customPopup',
    'title' => 'Notice',
    'message' => null,   // string | array
    'timeout' => 8000,   // auto-dismiss in ms
    'type' => null,      // info | status | warning | error
])

@php
    $popupId = $id;

    // Colors per type
    $colors = [
        'info'    => 'bg-blue-600 hover:bg-blue-700',
        'status'  => 'bg-green-600 hover:bg-green-700', // "status" = success
        'warning' => 'bg-yellow-600 hover:bg-yellow-700',
        'error'   => 'bg-red-600 hover:bg-red-700',
    ];

    // Prefer session type if set
    foreach ($colors as $key => $value) {
        if (session($key)) {
            $type = $key;
            $message = $message ?? session($key);
            break;
        }
    }

    $btnColor = $colors[$type] ?? $colors['info'];

    // Hide if nothing to show
    $hidden = $message ? '' : 'hidden';
@endphp

<div 
    id="{{ $popupId }}" 
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 transition-opacity duration-500 {{ $hidden }}"
>
    <div class="bg-white text-black dark:bg-gray-900 dark:text-gray-400 rounded-2xl shadow-xl max-w-sm w-full p-6 text-center relative">
        
        <!-- Title -->
        <h2 class="text-xl font-semibold mb-2" id="{{ $popupId }}Title">
            {{ $title }}
        </h2>

        <!-- Message(s) -->
        <div id="{{ $popupId }}Message">
            @if(is_array($message))
                <ul class="list-disc text-left pl-5 mb-4">
                    @foreach ($message as $msg)
                        <li>{{ $msg }}</li>
                    @endforeach
                </ul>
            @elseif($message)
                <p class="mb-4">{{ $message }}</p>
            @endif
        </div>

        <!-- Close button -->
        <button 
            onclick="closePopup('{{ $popupId }}')" 
            class="px-4 py-2 text-white rounded {{ $btnColor }}"
        >
            Close
        </button>
    </div>
</div>

<script>
    function closePopup(id) {
        const popup = document.getElementById(id);
        if (!popup) return;
        popup.classList.add("opacity-0");
        setTimeout(() => popup.classList.add("hidden"), 500);
    }

    function showPopup(id, message = null, title = null, timeout = {{ $timeout }}) {
        const popup = document.getElementById(id);
        if (!popup) return;

        popup.classList.remove("hidden", "opacity-0");

        if (title) {
            const titleEl = document.getElementById(id + "Title");
            if (titleEl) titleEl.textContent = title;
        }

        if (message) {
            const msgEl = document.getElementById(id + "Message");
            if (msgEl) msgEl.innerHTML = `<p class="mb-4">${message}</p>`;
        }

        if (timeout > 0) {
            setTimeout(() => closePopup(id), timeout);
        }
    }

    // Auto-dismiss if message came from backend
    @if ($message)
        setTimeout(() => closePopup("{{ $popupId }}"), {{ $timeout }});
    @endif
</script>
