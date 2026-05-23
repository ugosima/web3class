// ============================================================
// Trading Demo - No live exchange connections
// All trading interactions are simulated for learning purposes
// ============================================================

// ----------------------------
// Notifications
// ----------------------------
function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 p-4 rounded-lg text-white z-50 ${
        type === 'success' ? 'bg-green-500' :
        type === 'error'   ? 'bg-red-500'   :
                             'bg-blue-500'
    }`;
    notification.textContent = message;
    document.body.appendChild(notification);
    setTimeout(() => notification.remove(), 3000);
}

// ----------------------------
// Lightbox (double-click explanations)
// ----------------------------
let clickCounters = new Map();
const DOUBLE_CLICK_DELAY = 300;

function showLightbox(title, description, why) {
    const modal = document.getElementById('lightbox-modal');
    if (!modal) {
        console.error('Lightbox modal not found');
        return;
    }
    
    const titleEl = document.getElementById('lightbox-title');
    const descEl = document.getElementById('lightbox-description');
    const sectionsEl = document.getElementById('lightbox-sections');
    
    if (titleEl) titleEl.textContent = title;
    if (descEl) descEl.textContent = description;
    if (sectionsEl) {
        sectionsEl.innerHTML = why ? `
            <div class="lightbox-section">
                <h3 class="lightbox-section-title">Explanation!</h3>
                <p class="text-gray-600">${why}</p>
            </div>` : '';
    }

    modal.style.removeProperty('display');
    modal.classList.remove('hidden');
}

function closeLightbox() {
    const modal = document.getElementById('lightbox-modal');
    if (modal) {
        modal.classList.add('hidden');
    }
}

function setupDoubleClickHandlers() {
    const buttons = document.querySelectorAll('button[data-explanation-title], div[data-explanation-title]');

    buttons.forEach(button => {
        if (button.classList.contains('lightbox-close')) return;
        if (button.classList.contains('no-double-click')) return;

        const originalOnclick = button.getAttribute('onclick');
        if (originalOnclick) button.removeAttribute('onclick');

        const uid = Math.random().toString(36).slice(2);
        button.dataset.uid = uid;

        button.addEventListener('click', function(event) {
            const title       = button.getAttribute('data-explanation-title');
            const explanation = button.getAttribute('data-explanation');
            const why         = button.getAttribute('data-explanation-why');

            const count = (clickCounters.get(uid) || 0) + 1;
            clickCounters.set(uid, count);

            if (count === 1) {
                setTimeout(() => {
                    if (clickCounters.get(uid) === 1) {
                        if (originalOnclick) {
                            try { new Function(originalOnclick).call(button); } catch(e) { console.error(e); }
                        }
                    }
                    clickCounters.delete(uid);
                }, DOUBLE_CLICK_DELAY);

            } else if (count === 2) {
                event.stopImmediatePropagation();
                showLightbox(title, explanation, why);
                clickCounters.delete(uid);
            }
        });
    });
}

// Expose functions to window
window.showNotification = showNotification;
window.closeLightbox = closeLightbox;

// ----------------------------
// Bootstrap
// ----------------------------
document.addEventListener('DOMContentLoaded', function () {
    setupDoubleClickHandlers();

    // Close lightbox on outside click
    document.addEventListener('click', function (event) {
        const modal = document.getElementById('lightbox-modal');
        if (modal && event.target === modal) closeLightbox();
    });

    // Close lightbox on Escape
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') closeLightbox();
    });
});
