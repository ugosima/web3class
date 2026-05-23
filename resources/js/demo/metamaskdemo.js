// ============================================================
// MetaMask Demo - No live Web3/MetaMask connections
// All wallet interactions are simulated for learning purposes
// ============================================================

// ----------------------------
// State
// ----------------------------
let currentStage = 1;
const totalStages = 4;

let currentAccount = '0x742d35Cc6634C0532925a3b8D4C9db96c4b4d8b3c';
let currentNetwork = '0x1';

// ----------------------------
// Stage Navigation
// ----------------------------
// function updateStage() {
//     document.querySelectorAll('.stage-container').forEach((container, index) => {
//         const stageNum = index + 1;
//         const image = container.querySelector('.stage-image');
//         if (stageNum === currentStage) {
//             image.classList.add('active');
//         } else {
//             image.classList.remove('active');
//         }
//     });
// }

// function nextStage() {
//     if (currentStage < totalStages) {
//         currentStage++;
//         updateStage();
//     }
// }

// function previousStage() {
//     if (currentStage > 1) {
//         currentStage--;
//         updateStage();
//     }
// }

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
// Wallet UI (demo state only)
// ----------------------------
function updateWalletUI() {
    const walletInfo = document.getElementById('wallet-info');
    if (!walletInfo) return;
    const addressElement = walletInfo.querySelector('.text-sm.font-mono.text-gray-700');
    if (addressElement && currentAccount) {
        addressElement.textContent =
            `${currentAccount.substring(0, 6)}...${currentAccount.substring(currentAccount.length - 4)}`;
    }
}

// ----------------------------
// Account / Dropdown
// ----------------------------
function toggleAccountDropdown() {
    const dropdown = document.getElementById('account-dropdown');
    dropdown.classList.toggle('hidden');
}

function switchAccount(accountNumber) {
    // Demo: just show a notification, no real MetaMask call
    const demoAddresses = [
        '0x742d35Cc6634C0532925a3b8D4C9db96c4b4d8b3c',
        '0x893Cb4f2E35C8d4A1B6e9c2D3f8A7b5C6d0E1F2a'
    ];
    currentAccount = demoAddresses[accountNumber - 1] || demoAddresses[0];
    updateWalletUI();
    document.getElementById('account-dropdown').classList.add('hidden');
    showNotification(`Switched to Account ${accountNumber}`, 'success');
}

function createAccount() {
    showNotification('In a real wallet, this would open MetaMask to create a new account.', 'info');
    document.getElementById('account-dropdown').classList.add('hidden');
}

function copyAddress() {
    navigator.clipboard.writeText(currentAccount)
        .then(() => showNotification('Address copied to clipboard!', 'success'))
        .catch(() => showNotification('Could not copy address.', 'error'));
}

// ----------------------------
// Menu
// ----------------------------
function toggleMenu() {
    document.getElementById('more-options-modal').classList.remove('hidden');
}

function closeMoreOptionsModal() {
    document.getElementById('more-options-modal').classList.add('hidden');
}

function logout() {
    if (confirm('Are you sure you want to log out?')) {
        closeMoreOptionsModal();
        showNotification('Logged out successfully (demo).', 'success');
    }
}

// ----------------------------
// Network (demo only — no wallet_switchEthereumChain)
// ----------------------------
const networkNames = {
    'ethereum': 'Ethereum Mainnet',
    'polygon':  'Polygon Mainnet',
    'bsc':      'BSC Mainnet',
    'arbitrum': 'Arbitrum One',
    'all':      'All Networks'
};

function switchNetwork(networkId) {
    const name = networkNames[networkId] || networkId;
    showNotification(`Demo: switched to ${name}`, 'info');
}

function selectNetwork(networkId) {
    switchNetwork(networkId);
    const dropdown = document.getElementById('network-dropdown');
    if (dropdown) dropdown.classList.add('hidden');
}

function toggleNetworkDropdown() {
    const dropdown = document.getElementById('network-dropdown');
    if (dropdown) dropdown.classList.toggle('hidden');
}

// ----------------------------
// Action Buttons
// ----------------------------
function addFunds() {
    showNotification('Demo: In a real wallet this would open a fiat on-ramp.', 'info');
}

function buyCrypto() {
    showNotification('Demo: Buy crypto via an on-ramp service.', 'info');
}

function swapCrypto() {
    showNotification('Demo: Swap interface would open here.', 'info');
}

function sendCrypto() {
    document.getElementById('send-modal').classList.remove('hidden');
    document.getElementById('send-balance').textContent = '2.456 ETH';
}

function receiveCrypto() {
    document.getElementById('receive-modal').classList.remove('hidden');
    document.getElementById('receive-address').value = currentAccount;
}

function closeSendModal() {
    document.getElementById('send-modal').classList.add('hidden');
    document.getElementById('send-recipient').value = '';
    document.getElementById('send-amount').value = '';
}

function closeReceiveModal() {
    document.getElementById('receive-modal').classList.add('hidden');
}

function confirmSend() {
    const recipient = document.getElementById('send-recipient').value;
    const amount    = document.getElementById('send-amount').value;

    if (!recipient || !amount) {
        showNotification('Please enter recipient address and amount.', 'error');
        return;
    }
    if (!recipient.startsWith('0x') || recipient.length !== 42) {
        showNotification('Please enter a valid Ethereum address.', 'error');
        return;
    }
    if (parseFloat(amount) <= 0) {
        showNotification('Please enter a valid amount.', 'error');
        return;
    }

    showNotification(
        `Demo: Sending ${amount} ETH to ${recipient.substring(0, 6)}...${recipient.substring(recipient.length - 4)}`,
        'info'
    );
    addActivity('Sent ETH', recipient, `-${amount} ETH`, 'red');

    setTimeout(() => {
        closeSendModal();
        showNotification('Demo: Transaction sent successfully!', 'success');
    }, 2000);
}

function copyReceiveAddress() {
    const address = document.getElementById('receive-address').value;
    navigator.clipboard.writeText(address)
        .then(() => showNotification('Address copied to clipboard!', 'success'))
        .catch(() => showNotification('Could not copy address.', 'error'));
}

// ----------------------------
// Tabs
// ----------------------------
function switchWalletTab(tabName) {
    document.querySelectorAll('.wallet-tab-panel').forEach(panel => {
        panel.classList.add('hidden');
    });
    document.querySelectorAll('[id$="-tab"]').forEach(tab => {
        tab.classList.remove('border-b-2', 'border-blue-600', 'text-gray-900');
        tab.classList.add('text-gray-500');
    });

    document.getElementById(`${tabName}-content`).classList.remove('hidden');

    const selectedTab = document.getElementById(`${tabName}-tab`);
    selectedTab.classList.add('border-b-2', 'border-blue-600', 'text-gray-900');
    selectedTab.classList.remove('text-gray-500');
}

// ----------------------------
// Token List
// ----------------------------
function handleTokenClick(tokenName, symbol, balance) {
    showNotification(`${tokenName} (${symbol}): ${balance}`, 'info');
}

function toggleFilter() {
    showNotification('Filter functionality coming soon!', 'info');
}

function sortWalletAssets() {
    const tokenList = document.getElementById('token-list');
    const tokenCards = Array.from(tokenList.children);

    tokenCards.sort((a, b) => {
        const val = el => parseFloat(
            el.querySelector('.font-semibold.text-gray-900').textContent.replace('$', '').replace(',', '')
        );
        return val(b) - val(a);
    });

    tokenCards.forEach(card => tokenList.appendChild(card));
    showNotification('Tokens sorted by value', 'success');
}

// ----------------------------
// Activity
// ----------------------------
function addActivity(type, address, amount, colorClass) {
    const activityList = document.getElementById('activity-list');
    const newActivity  = document.createElement('div');
    newActivity.className = 'transaction-item bg-white p-3 rounded-lg border border-gray-200';

    let iconHtml = '', iconBg = '';
    if      (type.includes('Sent'))     { iconHtml = '<i class="fas fa-arrow-up text-red-600 text-xs"></i>';       iconBg = 'bg-red-100';    }
    else if (type.includes('Received')) { iconHtml = '<i class="fas fa-arrow-down text-green-600 text-xs"></i>';   iconBg = 'bg-green-100';  }
    else if (type.includes('Swapped'))  { iconHtml = '<i class="fas fa-exchange-alt text-blue-600 text-xs"></i>';  iconBg = 'bg-blue-100';   }
    else                                { iconHtml = '<i class="fas fa-gift text-purple-600 text-xs"></i>';        iconBg = 'bg-purple-100'; }

    const colorClassMap = { red: 'text-red-600', green: 'text-green-600', blue: 'text-blue-600' };
    const shortAddress  = address
        ? `To: ${address.substring(0, 6)}...${address.substring(address.length - 4)}`
        : 'MetaMask Wallet';

    newActivity.innerHTML = `
        <div class="flex justify-between items-start">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 ${iconBg} rounded-full flex items-center justify-center">${iconHtml}</div>
                <div>
                    <p class="font-semibold text-sm text-gray-900">${type}</p>
                    <p class="text-xs text-gray-500">${shortAddress}</p>
                </div>
            </div>
            <div class="text-right">
                <p class="font-semibold ${colorClassMap[colorClass]}">${amount}</p>
                <p class="text-xs text-gray-500">Just now</p>
            </div>
        </div>`;

    activityList.insertBefore(newActivity, activityList.firstChild);
}

function clearActivity() {
    if (confirm('Are you sure you want to clear all transaction history?')) {
        document.getElementById('activity-list').innerHTML = `
            <div class="text-center py-8">
                <i class="fas fa-history text-4xl text-gray-300 mb-2"></i>
                <p class="text-gray-500">No transactions yet</p>
            </div>`;
        showNotification('Activity history cleared', 'success');
    }
}

// ----------------------------
// Lightbox (double-click explanations)
// ----------------------------
let clickCounters = new Map();
const DOUBLE_CLICK_DELAY = 300;

function showLightbox(title, description, why) {
    const modal = document.getElementById('lightbox-modal');
    document.getElementById('lightbox-title').textContent = title;
    document.getElementById('lightbox-description').textContent = description;
    document.getElementById('lightbox-sections').innerHTML = why ? `
        <div class="lightbox-section">
            <h3 class="lightbox-section-title">Explanation!</h3>
            <p class="text-gray-600">${why}</p>
        </div>` : '';

    modal.style.removeProperty('display');
    modal.classList.remove('hidden');
}


function closeLightbox() {
    document.getElementById('lightbox-modal').classList.add('hidden');
}
window.closeLightbox = closeLightbox; // expose to inline onclick


function setupDoubleClickHandlers() {
    const buttons = document.querySelectorAll('button[data-explanation-title], div[data-explanation-title]');

    buttons.forEach(button => {
        if (button.classList.contains('lightbox-close')) return;

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



// Expose functions used by inline onclick attributes in the HTML
window.closeLightbox         = closeLightbox;
window.toggleAccountDropdown = toggleAccountDropdown;
window.switchAccount         = switchAccount;
window.createAccount         = createAccount;
window.copyAddress           = copyAddress;
window.toggleMenu            = toggleMenu;
window.closeMoreOptionsModal = closeMoreOptionsModal;
window.logout                = logout;
window.addFunds              = addFunds;
window.buyCrypto             = buyCrypto;
window.swapCrypto            = swapCrypto;
window.sendCrypto            = sendCrypto;
window.receiveCrypto         = receiveCrypto;
window.closeSendModal        = closeSendModal;
window.closeReceiveModal     = closeReceiveModal;
window.confirmSend           = confirmSend;
window.copyReceiveAddress    = copyReceiveAddress;
window.switchWalletTab       = switchWalletTab;
window.toggleNetworkDropdown = toggleNetworkDropdown;
window.selectNetwork         = selectNetwork;
window.toggleFilter          = toggleFilter;
window.sortWalletAssets      = sortWalletAssets;
window.handleTokenClick      = handleTokenClick;
window.clearActivity         = clearActivity;
window.showNotification      = showNotification;








// ----------------------------
// Bootstrap
// ----------------------------
document.addEventListener('DOMContentLoaded', function () {
    setupDoubleClickHandlers();
    switchWalletTab('tokens');
    updateWalletUI();

    // Close lightbox on outside click
    document.addEventListener('click', function (event) {
        const modal = document.getElementById('lightbox-modal');
        if (event.target === modal) closeLightbox();
    });


    // Close lightbox on Escape
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') closeLightbox();
    });
    // Close dropdowns / modals on outside click
    document.addEventListener('click', function (event) {
        const accountDropdown  = document.getElementById('account-dropdown');
        const networkDropdown  = document.getElementById('network-dropdown');
        const moreOptionsModal = document.getElementById('more-options-modal');

        if (accountDropdown && !event.target.closest('#account-dropdown')) {
            accountDropdown.classList.add('hidden');
        }
        if (networkDropdown && !event.target.closest('#network-dropdown')) {
            networkDropdown.classList.add('hidden');
        }
        if (moreOptionsModal && !moreOptionsModal.classList.contains('hidden') &&
            !event.target.closest('#more-options-modal') &&
            !event.target.closest('button[data-uid]')) {
            // only close if click was truly outside
        }
    });
});