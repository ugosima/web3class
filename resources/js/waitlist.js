// Waitlist Modal Handler
document.addEventListener('DOMContentLoaded', () => {
    const joinWaitlistBtn = document.getElementById('joinWaitlistBtn');
    const waitlistModal = document.getElementById('waitlistModal');
    const closeModal = document.getElementById('closeModal');
    const waitlistForm = document.getElementById('waitlistForm');
    const waitlistEmail = document.getElementById('waitlistEmail');
    const waitlistRoute = joinWaitlistBtn?.dataset.route;

    if (!joinWaitlistBtn || !waitlistModal) return;

    // Open modal when button is clicked
    joinWaitlistBtn.addEventListener('click', () => {
        waitlistModal.classList.remove('hidden');
        waitlistEmail.focus();
    });

    // Close modal when close button is clicked
    closeModal.addEventListener('click', () => {
        waitlistModal.classList.add('hidden');
    });

    // Close modal when clicking outside the form
    waitlistModal.addEventListener('click', (e) => {
        if (e.target === waitlistModal) {
            waitlistModal.classList.add('hidden');
        }
    });

    // Handle form submission
    waitlistForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const email = waitlistEmail.value;
        const submitBtn = waitlistForm.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        
        // Disable button and show loading state
        submitBtn.disabled = true;
        submitBtn.textContent = 'Adding...';
        submitBtn.classList.add('opacity-70', 'cursor-not-allowed');

        fetch(waitlistRoute, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify({
                waitlist_email: email
            })
        })
        .then(async response => {
            const data = await response.json().catch(() => ({
                message: response.status === 419
                    ? 'Request expired: please reload and try again'
                    : 'Something went wrong. Please refresh the page and try again.'
            }));

            if (!response.ok) {
                if (response.status === 419) {
                    data.message = data.message || 'Request expired: please reload and try again';
                }

                throw data;
            }

            return data;
        })
        .then(data => {
            if (data.success) {
                // Show success feedback
                submitBtn.textContent = '✓ Added to Waitlist!';
                submitBtn.classList.remove('bg-gradient-to-r', 'from-slate-900', 'to-slate-800', 'hover:from-slate-950', 'hover:to-slate-900', 'opacity-70', 'cursor-not-allowed');
                submitBtn.classList.add('bg-emerald-600', 'hover:bg-emerald-700');
                
                // Reset form after 2 seconds and close modal
                setTimeout(() => {
                    waitlistForm.reset();
                    waitlistModal.classList.add('hidden');
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('bg-emerald-600', 'hover:bg-emerald-700');
                    submitBtn.classList.add('bg-gradient-to-r', 'from-slate-900', 'to-slate-800', 'hover:from-slate-950', 'hover:to-slate-900');
                }, 2000);
            } else {
                // Handle error
                alert(data.message || 'This email is already on the waitlist!');
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-70', 'cursor-not-allowed');
            }
        })
        .catch(error => {
            alert(error.message || 'Request expired: please reload and try again');
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
            submitBtn.classList.remove('opacity-70', 'cursor-not-allowed');
        });
    });

    // Close modal with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !waitlistModal.classList.contains('hidden')) {
            waitlistModal.classList.add('hidden');
        }
    });
});

