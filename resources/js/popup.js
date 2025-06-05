    
window.showPopup = function (id, title = null, message = null) {
    const popup = document.getElementById(id);
    if (!popup) return;

    if (title) {
        const titleEl = document.getElementById(id + 'Title');
        if (titleEl) titleEl.innerHTML = title;
    }

    else {
console.log('No title provided for popup with id:', id); }

    if (message) {
        const msgEl = document.getElementById(id + 'Message');
        if (msgEl) msgEl.innerHTML = message;
    }

     popup.classList.remove('hidden');
}

