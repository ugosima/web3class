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

        // Send the email to the backend
        console.log('Submitting waitlist form to:', waitlistRoute);
        console.log('CSRF Token:', document.querySelector('meta[name="csrf-token"]')?.content);
        console.log('Email:', email);
        
        fetch(waitlistRoute, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify({
                waitlist_email: email
            })
        })
        .then(response => {
            console.log('Response status:', response.status);
            console.log('Response headers:', response.headers);
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);
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
            console.error('Fetch Error Details:', {
                message: error.message,
                stack: error.stack,
                error: error
            });
            alert('An error occurred. Please try again. Check console for details.');
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


const coins = [
  "bitcoin",
  "ethereum",
  "solana",
  "binancecoin",
  "bittensor",
  "arbitrum",
  "sui"
];

const updateTime = document.getElementById("update-time");

function setLastUpdatedTime() {
  if (!updateTime) return;

  updateTime.textContent = new Intl.DateTimeFormat(undefined, {
    hour: "numeric",
    minute: "2-digit",
    second: "2-digit",
    day: "numeric",
    month: "short",
    year: "numeric"
  }).format(new Date());
}

fetch(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${coins.join(",")}`)
  .then(res => res.json())
  .then(data => {
    const body = document.getElementById("crypto-body");

    body.innerHTML = data.map(c => {
      const change = c.price_change_percentage_24h ?? 0;
      const isPositive = change >= 0;
      const changeClasses = isPositive
        ? "bg-emerald-50 text-emerald-600 ring-emerald-100"
        : "bg-red-50 text-red-600 ring-red-100";

      return `
        <tr class="border-b border-slate-100 hover:bg-slate-50/80 transition-colors">
          <td class="px-6 py-5 text-left">
            <div class="flex items-center gap-3">
              <img src="${c.image}" alt="${c.name} logo" class="h-10 w-10 rounded-full ring-1 ring-slate-200">
              <div>
                <div class="text-base font-extrabold text-slate-950 leading-tight">${c.name}</div>
                <div class="text-xs font-semibold uppercase tracking-wide text-slate-500">${c.symbol}/USD</div>
              </div>
            </div>
          </td>

          <td class="px-6 py-5 text-right font-semibold text-slate-800 tabular-nums">
            $${c.current_price.toLocaleString()}
          </td>

          <td class="px-6 py-5 text-right">
            <span class="inline-flex min-w-20 justify-center rounded-full px-3 py-1 text-xs font-bold ring-1 ${changeClasses}">
              ${isPositive ? '+' : ''}${change.toFixed(2)}%
            </span>
          </td>

          <td class="px-6 py-5 text-right hidden md:table-cell font-semibold text-slate-700 tabular-nums">
            $${(c.market_cap / 1e9).toFixed(2)}B
          </td>
        </tr>
      `;
    }).join("");

    setLastUpdatedTime();
  });





