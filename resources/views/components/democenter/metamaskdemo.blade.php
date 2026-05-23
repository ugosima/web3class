<x-app-layout>
    <style>
        .metamask-orange { background: linear-gradient(135deg, #F6851B 0%, #E2761B 100%); }
        .metamask-dark { background: linear-gradient(135deg, #1B1B1B 0%, #2D2D2D 100%); }
        .card-shadow { box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .button-hover { transition: all 0.3s ease; }
        .button-hover:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
        .stage-image { border: 2px solid #e5e7eb; border-radius: 8px; }
        .stage-image.active { border-color: #F6851B; box-shadow: 0 0 20px rgba(246, 133, 27, 0.3); }
        .tab-active { background: #F6851B; color: white; }
        .transaction-item { transition: all 0.3s ease; }
        .transaction-item:hover { background: #f9fafb; }
        .wallet-tab-panel.active { display: block; }
        .hidden { display: none !important; }
        .lightbox-overlay { position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.75); display: flex; align-items: center; justify-content: center; z-index: 1000; }
        .lightbox-content { background: white; border-radius: 12px; padding: 32px; max-width: 600px; width: 90%; max-height: 80vh; overflow-y: auto; position: relative; }
        .lightbox-close { position: absolute; top: 16px; right: 16px; background: none; border: none; font-size: 24px; cursor: pointer; color: #6b7280; z-index: 1001; }
        .lightbox-close:hover { color: #1f2937; }
        .lightbox-title { font-size: 24px; font-weight: bold; color: #1f2937; margin-bottom: 16px; }
        .lightbox-description { color: #4b5563; line-height: 1.6; }
        .lightbox-section { margin-top: 16px; padding-top: 16px; border-top: 1px solid #e5e7eb; }
        .lightbox-section-title { font-weight: 600; color: #1f2937; margin-bottom: 8px; }
    </style>

    <div class="container mx-auto px-4 py-8 bg-gray-200">

        <div>
            <p class="text-gray-700 text-lg">
                <i class="fab fa-ethereum text-orange-500 mr-2"></i>
                Learn how to use MetaMask wallet with our interactive demonstration
            </p>
        </div>
        <br>

        <!-- Section 1: Picture Series -->
        <section class="mb-16">
            <div class="bg-white rounded-lg card-shadow p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">
                    <i class="fas fa-images mr-2 text-orange-500"></i>
                    MetaMask Setup Stages
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Stage 1 -->
                    <div class="text-center stage-container" data-stage="1">
                        <div class="stage-image mb-4 p-4 bg-gray-100 rounded-lg">
                            <i class="fas fa-download text-6xl text-orange-500"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Step 1: Install App</h3>
                        <p class="text-sm text-gray-600">Download MetaMask from App/browser store</p>
                        <div class="mt-2">
                            <span class="inline-block bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded">Stage 1</span>
                        </div>
                    </div>

                    <!-- Stage 2 -->
                    <div class="text-center stage-container" data-stage="2">
                        <div class="stage-image mb-4 p-4 bg-gray-100 rounded-lg">
                            <i class="fas fa-wallet text-6xl text-orange-500"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Step 2: Create Wallet</h3>
                        <p class="text-sm text-gray-600">Set up new wallet with password</p>
                        <div class="mt-2">
                            <span class="inline-block bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded">Stage 2</span>
                        </div>
                    </div>

                    <!-- Stage 3 -->
                    <div class="text-center stage-container" data-stage="3">
                        <div class="stage-image mb-4 p-4 bg-gray-100 rounded-lg">
                            <i class="fas fa-key text-6xl text-orange-500"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Step 3: Backup Phrase</h3>
                        <p class="text-sm text-gray-600">Save your (12 or 24)-word recovery phrase</p>
                        <div class="mt-2">
                            <span class="inline-block bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded">Stage 3</span>
                        </div>
                    </div>

                    <!-- Stage 4 -->
                    <div class="text-center stage-container" data-stage="4">
                        <div class="stage-image mb-4 p-4 bg-gray-100 rounded-lg">
                            <i class="fas fa-link text-6xl text-orange-500"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Step 4: Connect to DApp</h3>
                        <p class="text-sm text-gray-600">Connect wallet to decentralized applications</p>
                        <div class="mt-2">
                            <span class="inline-block bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded">Stage 4</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Guidelines -->
        <section>
            <p class="text-gray-700 text-lg">
                <i class="fab fa-ethereum text-orange-500 mr-2"></i>
                <i class="fas fa-robot text-orange-500 mr-2"></i>
                    <b>Metamask Demo guidelines</b>
            </p>
            <div class="text-gray-800">
                <ol class="list-decimal list-inside">
                    <li>This is the typical interface you will see after creating a wallet and storing your seed phrase on metamask</li>
                    <li>For this demo, you can click any button once to navigate,or double click to see what the button does.</li>
                    <li>The user interface and button positions may change with time and upgrades, but the foundation is primarily the same (Send, Receive, Connect to Dapps)</li>
                    <li>Your wallet is your identity on the blockchain, it is used to directly interact with applications on the blockchain.</li>
                </ol>
            </div>
        </section>
        <br>

        <!-- Section 2: Wallet Interface -->
        <section>
            <div class="bg-white rounded-lg shadow-sm p-6">
                <!-- Header -->
                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <button onclick="toggleAccountDropdown()"
                                data-explanation-title="Account Dropdown"
                                data-explanation="Switch between different accounts in your MetaMask wallet or create a new account."
                                data-explanation-why="MetaMask allows multiple accounts within one wallet, enabling users to separate funds and activities for better organization and privacy."
                                class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                                <span class="text-sm font-medium">Account 1</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            <!-- Account Dropdown -->
                            <div id="account-dropdown" class="hidden absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-10">
                                <div class="py-2">
                                    <button onclick="switchAccount(1)"
                                        data-explanation-title="Switch to Account 1"
                                        data-explanation="Switch to Account 1 in your MetaMask wallet."
                                        data-explanation-why="Each account has its own address and balance. Switching accounts allows you to manage different wallets for different purposes."
                                        class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Account 1
                                    </button>
                                    <button onclick="switchAccount(2)"
                                        data-explanation-title="Switch to Account 2"
                                        data-explanation="Switch to Account 2 in your MetaMask wallet."
                                        data-explanation-why="Each account has its own address and balance. Switching accounts allows you to manage different wallets for different purposes."
                                        class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 bg-gray-100">
                                        Account 2
                                    </button>
                                    <button onclick="createAccount()"
                                        data-explanation-title="Create Account"
                                        data-explanation="Create a new account in your MetaMask wallet."
                                        data-explanation-why="Creating additional accounts helps organize funds and activities. Each new account gets a unique address and private key."
                                        class="w-full text-left px-4 py-2 text-sm text-blue-600 hover:bg-blue-50 border-t border-gray-200">
                                        + Create account
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div id="wallet-info" class="flex items-center space-x-2 bg-gray-100 px-3 py-2 rounded-lg">
                            <span class="text-sm font-mono text-gray-700">0x893Cb...e6f0a</span>
                            <button onclick="copyAddress()"
                                data-explanation-title="Copy Address"
                                data-explanation="Copy your wallet address to clipboard."
                                data-explanation-why="Your wallet address is needed to receive funds. Copying it makes it easy to share with others or paste into applications."
                                class="text-gray-500 hover:text-gray-700" title="Copy address">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                        <button onclick="toggleMenu()"
                            data-explanation-title="Menu"
                            data-explanation="Open the main menu to access additional MetaMask features and settings."
                            data-explanation-why="The menu provides access to advanced features like networks, contacts, settings, and other wallet management options."
                            class="text-gray-500 hover:text-gray-700" title="Menu">
                            <i class="fas fa-bars text-lg"></i>
                        </button>
                    </div>
                </div>

                <!-- Fund Your Wallet -->
                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-building text-blue-600 text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Fund your wallet</h3>
                                <p class="text-sm text-gray-600">Get your wallet ready to use web3</p>
                            </div>
                        </div>
                        <button onclick="addFunds()"
                            data-explanation-title="Add Funds"
                            data-explanation="Add funds to your wallet through fiat on-ramp or crypto purchase."
                            data-explanation-why="You need funds in your wallet to interact with blockchain applications, pay gas fees, and make transactions."
                            class="bg-black text-white px-6 py-3 rounded-lg font-medium hover:bg-gray-800">
                            Add funds
                        </button>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="grid grid-cols-4 gap-4 mb-6">
                    <button onclick="buyCrypto()"
                        data-explanation-title="Buy Crypto"
                        data-explanation="Purchase cryptocurrency using fiat currency or other payment methods."
                        data-explanation-why="Buying crypto is the first step to getting funds into your wallet. MetaMask integrates with various on-ramp services to make this easy."
                        class="bg-white border border-gray-200 rounded-lg p-4 flex flex-col items-center justify-center hover:bg-gray-50">
                        <i class="fas fa-shopping-cart text-gray-700 mb-2"></i>
                        <span class="text-sm font-medium text-gray-700">Buy</span>
                    </button>
                    <button onclick="swapCrypto()"
                        data-explanation-title="Swap Crypto"
                        data-explanation="Exchange one cryptocurrency for another directly within your wallet."
                        data-explanation-why="Swapping allows you to convert tokens without leaving MetaMask, using decentralized exchanges like Uniswap for better rates and security."
                        class="bg-white border border-gray-200 rounded-lg p-4 flex flex-col items-center justify-center hover:bg-gray-50">
                        <i class="fas fa-exchange-alt text-gray-700 mb-2"></i>
                        <span class="text-sm font-medium text-gray-700">Swap</span>
                    </button>
                    <button onclick="sendCrypto()"
                        data-explanation-title="Send Crypto"
                        data-explanation="Send cryptocurrency to another wallet address."
                        data-explanation-why="Sending is the core function of any wallet. You can send funds to friends, pay for services, or transfer between your own accounts."
                        class="bg-white border border-gray-200 rounded-lg p-4 flex flex-col items-center justify-center hover:bg-gray-50">
                        <i class="fas fa-paper-plane text-gray-700 mb-2"></i>
                        <span class="text-sm font-medium text-gray-700">Send</span>
                    </button>
                    <button onclick="receiveCrypto()"
                        data-explanation-title="Receive Crypto"
                        data-explanation="Display your wallet address and QR code to receive cryptocurrency."
                        data-explanation-why="Receiving is how you get funds into your wallet. The QR code makes it easy for others to scan and send you crypto."
                        class="bg-white border border-gray-200 rounded-lg p-4 flex flex-col items-center justify-center hover:bg-gray-50">
                        <i class="fas fa-qrcode text-gray-700 mb-2"></i>
                        <span class="text-sm font-medium text-gray-700">Receive</span>
                    </button>
                </div>

                <!-- Tab Navigation -->
                <div class="border-b border-gray-200 mb-6">
                    <nav class="flex space-x-8">
                        <button onclick="switchWalletTab('tokens')"
                            data-explanation-title="Tokens Tab"
                            data-explanation="View all your cryptocurrency tokens and their balances."
                            data-explanation-why="The tokens tab shows all ERC-20 and other tokens in your wallet, including their current values and 24-hour price changes."
                            id="tokens-tab" class="pb-3 text-sm font-medium text-gray-900 border-b-2 border-blue-600">
                            Tokens
                        </button>
                        <button onclick="switchWalletTab('defi')"
                            data-explanation-title="DeFi Tab"
                            data-explanation="Access decentralized finance protocols and services."
                            data-explanation-why="DeFi protocols allow you to lend, borrow, earn interest, and participate in decentralized financial markets without intermediaries."
                            id="defi-tab" class="pb-3 text-sm font-medium text-gray-500 hover:text-gray-700">
                            DeFi
                        </button>
                        <button onclick="switchWalletTab('nfts')"
                            data-explanation-title="NFTs Tab"
                            data-explanation="View your non-fungible token collection."
                            data-explanation-why="NFTs represent unique digital assets like art, collectibles, and game items. This tab displays all NFTs owned by your wallet."
                            id="nfts-tab" class="pb-3 text-sm font-medium text-gray-500 hover:text-gray-700">
                            NFTs
                        </button>
                        <button onclick="switchWalletTab('activity')"
                            data-explanation-title="Activity Tab"
                            data-explanation="View your transaction history and recent wallet activity."
                            data-explanation-why="The activity tab shows all incoming and outgoing transactions, helping you track your wallet's history and verify transactions."
                            id="activity-tab" class="pb-3 text-sm font-medium text-gray-500 hover:text-gray-700">
                            Activity
                        </button>
                    </nav>
                </div>


                <!-- Portfolio Summary -->
                <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg p-6 mb-6 text-white">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm opacity-90">Total Portfolio Value</p>
                            <p class="text-3xl font-bold">$9,448.25</p>
                            <p class="text-sm opacity-90 mt-1">+$245.50 (2.67%) today</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm opacity-90">Network</p>
                            <p class="font-semibold">Ethereum Mainnet</p>
                        </div>
                    </div>
                </div>

                <!-- Tab Content -->
                <div id="wallet-tab-content">

                    <!-- Tokens Tab -->
                    <div id="tokens-content" class="wallet-tab-panel">
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center space-x-3">
                                <button onclick="toggleNetworkDropdown()"
                                    data-explanation-title="Network Filter"
                                    data-explanation="Filter tokens by blockchain network."
                                    data-explanation-why="Different tokens exist on different blockchains. Filtering by network helps you find tokens specific to Ethereum, Polygon, BSC, etc."
                                    class="flex items-center space-x-2 bg-white border border-gray-200 rounded-lg px-3 py-2 text-sm">
                                    <span>All popular networks</span>
                                    <i class="fas fa-chevron-down text-xs"></i>
                                </button>
                                <!-- Network Dropdown -->
                                <div id="network-dropdown" class="hidden absolute mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-10">
                                    <div class="py-2">
                                        <button onclick="selectNetwork('all')"
                                            data-explanation-title="All Networks"
                                            data-explanation="Show tokens from all blockchain networks."
                                            data-explanation-why="Viewing all networks gives you a complete picture of your entire portfolio across different blockchains."
                                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">All networks</button>
                                        <button onclick="selectNetwork('ethereum')"
                                            data-explanation-title="Ethereum Network"
                                            data-explanation="Show tokens only on the Ethereum blockchain."
                                            data-explanation-why="Ethereum is the most popular blockchain for DeFi and NFTs. Filtering to Ethereum helps focus on your main holdings."
                                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ethereum</button>
                                        <button onclick="selectNetwork('polygon')"
                                            data-explanation-title="Polygon Network"
                                            data-explanation="Show tokens only on the Polygon blockchain."
                                            data-explanation-why="Polygon offers lower fees and faster transactions. Many users hold assets here for cost-effective DeFi operations."
                                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Polygon</button>
                                        <button onclick="selectNetwork('bsc')"
                                            data-explanation-title="BSC Network"
                                            data-explanation="Show tokens only on the Binance Smart Chain."
                                            data-explanation-why="BSC is popular for its low fees and extensive ecosystem. Many tokens and dApps are built specifically for BSC."
                                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">BSC</button>
                                    </div>
                                </div>
                                <button onclick="toggleFilter()"
                                    data-explanation-title="Filter Assets"
                                    data-explanation="Apply filters to your token list."
                                    data-explanation-why="Filtering helps you quickly find specific tokens based on criteria like balance, name, or other attributes."
                                    class="text-gray-500 hover:text-gray-700" title="Filter">
                                    <i class="fas fa-filter"></i>
                                </button>
                                <button onclick="sortWalletAssets()"
                                    data-explanation-title="Sort Assets"
                                    data-explanation="Sort your tokens by value or other criteria."
                                    data-explanation-why="Sorting helps you organize your portfolio, making it easier to see your most valuable assets or find specific tokens."
                                    class="text-gray-500 hover:text-gray-700" title="Sort">
                                    <i class="fas fa-sort"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Asset List -->
                        <div id="token-list" class="space-y-4">
                            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-gray-300 transition-colors cursor-pointer" onclick="handleTokenClick('Ethereum', 'ETH', '2.456 ETH')">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center"><i class="fab fa-ethereum text-white text-sm"></i></div>
                                        <div><h4 class="font-semibold text-gray-900">Ethereum</h4><p class="text-sm text-gray-500">2.456 ETH</p></div>
                                    </div>
                                    <div class="text-right"><p class="font-semibold text-gray-900">$4,912.00</p><p class="text-xs text-green-600">+2.45%</p></div>
                                </div>
                            </div>
                            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-gray-300 transition-colors cursor-pointer" onclick="handleTokenClick('Tether USD', 'USDT', '1,250.00 USDT')">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center"><span class="text-white font-bold text-sm">₮</span></div>
                                        <div><h4 class="font-semibold text-gray-900">Tether USD</h4><p class="text-sm text-gray-500">1,250.00 USDT</p></div>
                                    </div>
                                    <div class="text-right"><p class="font-semibold text-gray-900">$1,250.00</p><p class="text-xs text-gray-500">0.00%</p></div>
                                </div>
                            </div>
                            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-gray-300 transition-colors cursor-pointer" onclick="handleTokenClick('USD Coin', 'USDC', '850.00 USDC')">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center"><span class="text-white font-bold text-sm">$</span></div>
                                        <div><h4 class="font-semibold text-gray-900">USD Coin</h4><p class="text-sm text-gray-500">850.00 USDC</p></div>
                                    </div>
                                    <div class="text-right"><p class="font-semibold text-gray-900">$850.00</p><p class="text-xs text-gray-500">0.01%</p></div>
                                </div>
                            </div>
                            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-gray-300 transition-colors cursor-pointer" onclick="handleTokenClick('Binance Coin', 'BNB', '5.25 BNB')">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center"><span class="text-white font-bold text-sm">B</span></div>
                                        <div><h4 class="font-semibold text-gray-900">Binance Coin</h4><p class="text-sm text-gray-500">5.25 BNB</p></div>
                                    </div>
                                    <div class="text-right"><p class="font-semibold text-gray-900">$1,575.00</p><p class="text-xs text-red-600">-1.23%</p></div>
                                </div>
                            </div>
                            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-gray-300 transition-colors cursor-pointer" onclick="handleTokenClick('Polygon', 'MATIC', '1,250.00 MATIC')">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center"><span class="text-white font-bold text-sm">M</span></div>
                                        <div><h4 class="font-semibold text-gray-900">Polygon</h4><p class="text-sm text-gray-500">1,250.00 MATIC</p></div>
                                    </div>
                                    <div class="text-right"><p class="font-semibold text-gray-900">$1,125.00</p><p class="text-xs text-green-600">+3.67%</p></div>
                                </div>
                            </div>
                            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-gray-300 transition-colors cursor-pointer" onclick="handleTokenClick('Shiba Inu', 'SHIB', '2,500,000 SHIB')">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center"><span class="text-white font-bold text-sm">Sh</span></div>
                                        <div><h4 class="font-semibold text-gray-900">Shiba Inu</h4><p class="text-sm text-gray-500">2,500,000 SHIB</p></div>
                                    </div>
                                    <div class="text-right"><p class="font-semibold text-gray-900">$25.00</p><p class="text-xs text-green-600">+5.12%</p></div>
                                </div>
                            </div>
                            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-gray-300 transition-colors cursor-pointer" onclick="handleTokenClick('Chainlink', 'LINK', '15.75 LINK')">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-blue-700 rounded-full flex items-center justify-center"><span class="text-white font-bold text-sm">L</span></div>
                                        <div><h4 class="font-semibold text-gray-900">Chainlink</h4><p class="text-sm text-gray-500">15.75 LINK</p></div>
                                    </div>
                                    <div class="text-right"><p class="font-semibold text-gray-900">$236.25</p><p class="text-xs text-green-600">+1.89%</p></div>
                                </div>
                            </div>
                            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-gray-300 transition-colors cursor-pointer" onclick="handleTokenClick('Uniswap', 'UNI', '25.00 UNI')">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-pink-500 rounded-full flex items-center justify-center"><span class="text-white font-bold text-sm">U</span></div>
                                        <div><h4 class="font-semibold text-gray-900">Uniswap</h4><p class="text-sm text-gray-500">25.00 UNI</p></div>
                                    </div>
                                    <div class="text-right"><p class="font-semibold text-gray-900">$125.00</p><p class="text-xs text-red-600">-0.75%</p></div>
                                </div>
                            </div>
                            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-gray-300 transition-colors cursor-pointer" onclick="handleTokenClick('Aave', 'AAVE', '2.5 AAVE')">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-purple-700 rounded-full flex items-center justify-center"><span class="text-white font-bold text-sm">A</span></div>
                                        <div><h4 class="font-semibold text-gray-900">Aave</h4><p class="text-sm text-gray-500">2.5 AAVE</p></div>
                                    </div>
                                    <div class="text-right"><p class="font-semibold text-gray-900">$300.00</p><p class="text-xs text-green-600">+4.21%</p></div>
                                </div>
                            </div>
                            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-gray-300 transition-colors cursor-pointer" onclick="handleTokenClick('MetaMask USD', 'mUSD', '$0.00')">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center"><span class="text-white font-bold text-sm">m</span></div>
                                        <div><h4 class="font-semibold text-gray-900">MetaMask USD</h4><p class="text-sm text-gray-500">$0.00</p></div>
                                    </div>
                                    <div class="text-right"><p class="font-semibold text-gray-900">$0.00</p><p class="text-xs text-gray-500">0.00%</p></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DeFi Tab -->
                    <div id="defi-content" class="wallet-tab-panel hidden">
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-gray-900">DeFi Protocols</h3>
                            <p class="text-sm text-gray-600 mb-4">Connect to popular decentralized finance protocols</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-gray-300 transition-colors cursor-pointer" onclick="showNotification('Opening Uniswap...', 'info')" data-explanation-title="Uniswap" data-explanation="Connect to Uniswap, the largest decentralized exchange on Ethereum." data-explanation-why="Uniswap allows you to swap tokens without intermediaries using automated market makers (AMMs). It's the most popular DEX for trading ERC-20 tokens.">
                                    <div class="flex items-center space-x-3"><div class="w-10 h-10 bg-pink-500 rounded-full flex items-center justify-center"><span class="text-white font-bold text-sm">U</span></div><div><h4 class="font-semibold text-gray-900">Uniswap</h4><p class="text-xs text-gray-500">Decentralized Exchange</p></div></div>
                                </div>
                                <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-gray-300 transition-colors cursor-pointer" onclick="showNotification('Opening Aave...', 'info')" data-explanation-title="Aave" data-explanation="Connect to Aave, a leading decentralized lending and borrowing protocol." data-explanation-why="Aave allows you to earn interest on deposits and borrow against your crypto collateral. It supports multiple assets and offers flash loans.">
                                    <div class="flex items-center space-x-3"><div class="w-10 h-10 bg-purple-700 rounded-full flex items-center justify-center"><span class="text-white font-bold text-sm">A</span></div><div><h4 class="font-semibold text-gray-900">Aave</h4><p class="text-xs text-gray-500">Lending & Borrowing</p></div></div>
                                </div>
                                <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-gray-300 transition-colors cursor-pointer" onclick="showNotification('Opening Compound...', 'info')" data-explanation-title="Compound" data-explanation="Connect to Compound, an algorithmic money market protocol." data-explanation-why="Compound lets users supply assets to earn interest or borrow against collateral. Interest rates are determined algorithmically based on supply and demand.">
                                    <div class="flex items-center space-x-3"><div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center"><span class="text-white font-bold text-sm">C</span></div><div><h4 class="font-semibold text-gray-900">Compound</h4><p class="text-xs text-gray-500">Money Market Protocol</p></div></div>
                                </div>
                                <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-gray-300 transition-colors cursor-pointer" onclick="showNotification('Opening Curve...', 'info')" data-explanation-title="Curve" data-explanation="Connect to Curve, a decentralized exchange optimized for stablecoin trading." data-explanation-why="Curve is designed for efficient stablecoin swaps with low slippage. It's ideal for trading between USD-pegged tokens like USDT, USDC, and DAI.">
                                    <div class="flex items-center space-x-3"><div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center"><span class="text-white font-bold text-sm">C</span></div><div><h4 class="font-semibold text-gray-900">Curve</h4><p class="text-xs text-gray-500">Stablecoin Exchange</p></div></div>
                                </div>
                                <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-gray-300 transition-colors cursor-pointer" onclick="showNotification('Opening SushiSwap...', 'info')" data-explanation-title="SushiSwap" data-explanation="Connect to SushiSwap, a community-driven DEX with yield farming opportunities." data-explanation-why="SushiSwap offers token swapping, yield farming through liquidity provision, and other DeFi services. It's known for its SUSHI token rewards.">
                                    <div class="flex items-center space-x-3"><div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center"><span class="text-white font-bold text-sm">S</span></div><div><h4 class="font-semibold text-gray-900">SushiSwap</h4><p class="text-xs text-gray-500">AMM & Yield Farming</p></div></div>
                                </div>
                                <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-gray-300 transition-colors cursor-pointer" onclick="showNotification('Opening Yearn Finance...', 'info')" data-explanation-title="Yearn Finance" data-explanation="Connect to Yearn Finance, a yield aggregation platform." data-explanation-why="Yearn automatically moves your funds between different lending protocols to maximize yield. It's a set-it-and-forget-it solution for earning interest on crypto.">
                                    <div class="flex items-center space-x-3"><div class="w-10 h-10 bg-cyan-600 rounded-full flex items-center justify-center"><span class="text-white font-bold text-sm">Y</span></div><div><h4 class="font-semibold text-gray-900">Yearn Finance</h4><p class="text-xs text-gray-500">Yield Aggregator</p></div></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- NFTs Tab -->
                    <div id="nfts-content" class="wallet-tab-panel hidden">
                        <div class="text-center py-12">
                            <i class="fas fa-image text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-semibold text-gray-700 mb-2">NFTs</h3>
                            <p class="text-gray-500">Your NFT collection will appear here</p>
                        </div>
                    </div>

                    <!-- Activity Tab -->
                    <div id="activity-content" class="wallet-tab-panel hidden">
                        <div class="space-y-4">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold text-gray-900">Transaction History</h3>
                                <button onclick="clearActivity()"
                                    data-explanation-title="Clear Activity"
                                    data-explanation="Clear all transaction history from your activity list."
                                    data-explanation-why="Clearing activity helps maintain privacy and declutters the interface. Note that this only clears the display, not the actual on-chain transaction history."
                                    class="text-sm text-gray-500 hover:text-gray-700">Clear All</button>
                            </div>
                            <div id="activity-list" class="space-y-3">
                                <div class="transaction-item bg-white p-3 rounded-lg border border-gray-200">
                                    <div class="flex justify-between items-start">
                                        <div class="flex items-center space-x-3"><div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center"><i class="fas fa-arrow-down text-green-600 text-xs"></i></div><div><p class="font-semibold text-sm text-gray-900">Received ETH</p><p class="text-xs text-gray-500">From: 0x1234...5678</p></div></div>
                                        <div class="text-right"><p class="font-semibold text-green-600">+0.5 ETH</p><p class="text-xs text-gray-500">2 hours ago</p></div>
                                    </div>
                                </div>
                                <div class="transaction-item bg-white p-3 rounded-lg border border-gray-200">
                                    <div class="flex justify-between items-start">
                                        <div class="flex items-center space-x-3"><div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center"><i class="fas fa-arrow-up text-red-600 text-xs"></i></div><div><p class="font-semibold text-sm text-gray-900">Sent USDT</p><p class="text-xs text-gray-500">To: 0xabcd...efgh</p></div></div>
                                        <div class="text-right"><p class="font-semibold text-red-600">-100 USDT</p><p class="text-xs text-gray-500">1 day ago</p></div>
                                    </div>
                                </div>
                                <div class="transaction-item bg-white p-3 rounded-lg border border-gray-200">
                                    <div class="flex justify-between items-start">
                                        <div class="flex items-center space-x-3"><div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center"><i class="fas fa-exchange-alt text-blue-600 text-xs"></i></div><div><p class="font-semibold text-sm text-gray-900">Swapped ETH → USDC</p><p class="text-xs text-gray-500">Via Uniswap</p></div></div>
                                        <div class="text-right"><p class="font-semibold text-blue-600">0.1 ETH</p><p class="text-xs text-gray-500">2 days ago</p></div>
                                    </div>
                                </div>
                                <div class="transaction-item bg-white p-3 rounded-lg border border-gray-200">
                                    <div class="flex justify-between items-start">
                                        <div class="flex items-center space-x-3"><div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center"><i class="fas fa-gift text-purple-600 text-xs"></i></div><div><p class="font-semibold text-sm text-gray-900">Received AAVE</p><p class="text-xs text-gray-500">From: 0x9876...5432</p></div></div>
                                        <div class="text-right"><p class="font-semibold text-green-600">+1.5 AAVE</p><p class="text-xs text-gray-500">3 days ago</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Send Modal -->
        <div id="send-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Send Crypto</h3>
                    <button onclick="closeSendModal()" class="text-gray-500 hover:text-gray-700"><i class="fas fa-times"></i></button>
                </div>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Recipient Address</label>
                        <input type="text" id="send-recipient" placeholder="0x..." class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Amount</label>
                        <div class="relative">
                            <input type="number" id="send-amount" placeholder="0.0" step="0.0001" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                            <span class="absolute right-3 top-2 text-gray-500">ETH</span>
                        </div>
                    </div>
                    <div class="flex justify-between text-sm text-gray-600">
                        <span>Balance: <span id="send-balance">2.456 ETH</span></span>
                        <span>Network: Ethereum</span>
                    </div>
                    <button onclick="confirmSend()"
                        data-explanation-title="Confirm Send"
                        data-explanation="Confirm and execute the cryptocurrency transaction."
                        data-explanation-why="This initiates the actual blockchain transaction. You'll need to pay gas fees, and the transaction will be recorded permanently on the blockchain."
                        class="w-full bg-orange-500 text-white py-3 rounded-lg font-medium hover:bg-orange-600">Send</button>
                </div>
            </div>
        </div>

        <!-- Receive Modal -->
        <div id="receive-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Receive Crypto</h3>
                    <button onclick="closeReceiveModal()" class="text-gray-500 hover:text-gray-700"><i class="fas fa-times"></i></button>
                </div>
                <div class="text-center space-y-4">
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <div id="qr-code" class="w-48 h-48 mx-auto bg-white p-4 rounded-lg flex items-center justify-center">
                            <i class="fas fa-qrcode text-6xl text-gray-400"></i>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Your Wallet Address</label>
                        <div class="flex items-center space-x-2">
                            <input type="text" id="receive-address" value="0x742d35Cc6634C0532925a3b8D4C9db96c4b4d8b3c" readonly class="flex-1 px-3 py-2 border border-gray-300 rounded-lg bg-gray-50">
                            <button onclick="copyReceiveAddress()"
                                data-explanation-title="Copy Receive Address"
                                data-explanation="Copy your wallet address to clipboard for sharing."
                                data-explanation-why="Makes it easy to share your address with others who want to send you cryptocurrency. The address is your public identifier on the blockchain."
                                class="px-3 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                    </div>
                    <div class="text-sm text-gray-600"><p>Share this address to receive ETH and other tokens</p></div>
                </div>
            </div>
        </div>
    </div>

    <!-- More Options Modal -->
    <div id="more-options-modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 p-6 relative">
            <div class="flex items-center mb-4">
                <button onclick="closeMoreOptionsModal()"
                    data-explanation-title="Close Menu"
                    data-explanation="Close the more options menu."
                    data-explanation-why="Returns to the main wallet interface. All menu options remain accessible through the menu button."
                    class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                </button>
                <div class="flex-grow flex justify-center space-x-4">
                    <button class="flex flex-col items-center p-3 rounded-lg hover:bg-gray-100" onclick="showNotification('Buy Crypto functionality coming soon!', 'info')" data-explanation-title="Buy Crypto" data-explanation="Buy cryptocurrency using fiat payment methods." data-explanation-why="Quick access to buy crypto directly from MetaMask using integrated on-ramp services like MoonPay, Transak, or others.">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                        <span class="text-xs mt-1 text-gray-700">Buy</span>
                    </button>
                    <button class="flex flex-col items-center p-3 rounded-lg hover:bg-gray-100" onclick="showNotification('Scan QR functionality coming soon!', 'info')" data-explanation-title="Scan QR" data-explanation="Scan a QR code to connect to a dApp or receive funds." data-explanation-why="QR codes provide a quick way to interact with dApps, sign transactions, or receive crypto without manually typing addresses.">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" /></svg>
                        <span class="text-xs mt-1 text-gray-700">Scan</span>
                    </button>
                </div>
            </div>
            <div class="space-y-1">
                <button onclick="showNotification('Notifications coming soon!', 'info')" data-explanation-title="Notifications" data-explanation="View and manage your wallet notifications." data-explanation-why="Notifications alert you about important events like transaction confirmations, dApp connections, and security alerts." class="w-full flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg">
                    <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg><span class="text-gray-700">Notifications</span></div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                </button>
                <button onclick="showNotification('MetaMask Card coming soon!', 'info')" data-explanation-title="MetaMask Card" data-explanation="Access the MetaMask debit card feature." data-explanation-why="The MetaMask Card allows you to spend your crypto at any merchant that accepts Visa, bridging the gap between crypto and everyday purchases." class="w-full flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg">
                    <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg><span class="text-gray-700">MetaMask Card</span></div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                </button>
                <div class="pt-2 pb-1"><p class="text-xs text-gray-500 font-medium px-3">MANAGE</p></div>
                <button onclick="showNotification('Settings coming soon!', 'info')" data-explanation-title="Settings" data-explanation="Configure MetaMask wallet settings and preferences." data-explanation-why="Settings allow you to customize security options, appearance, language, and other wallet preferences to suit your needs." class="w-full flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg">
                    <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg><span class="text-gray-700">Settings</span></div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                </button>
                <button onclick="showNotification('Contacts coming soon!', 'info')" data-explanation-title="Contacts" data-explanation="Manage your contact list for easy sending." data-explanation-why="Contacts save frequently used addresses with names, making it easier to send crypto to friends and family without copying addresses." class="w-full flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg">
                    <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg><span class="text-gray-700">Contacts</span></div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                </button>
                <button onclick="showNotification('Networks coming soon!', 'info')" data-explanation-title="Networks" data-explanation="Manage and switch between blockchain networks." data-explanation-why="Different blockchains (Ethereum, Polygon, BSC, etc.) have different dApps and tokens. Switching networks lets you interact with the appropriate blockchain." class="w-full flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg">
                    <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" /></svg><span class="text-gray-700">Networks</span></div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                </button>
                <div class="pt-2 pb-1"><p class="text-xs text-gray-500 font-medium px-3">RESOURCES</p></div>
                <button onclick="showNotification('About MetaMask coming soon!', 'info')" data-explanation-title="About MetaMask" data-explanation="Learn more about MetaMask and its mission." data-explanation-why="MetaMask is a gateway to decentralized web applications. Understanding its background helps you trust and use the wallet more effectively." class="w-full flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg">
                    <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg><span class="text-gray-700">About MetaMask</span></div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                </button>
                <button onclick="showNotification('Request a feature coming soon!', 'info')" data-explanation-title="Request a Feature" data-explanation="Suggest new features or improvements for MetaMask." data-explanation-why="User feedback helps shape the future of MetaMask. Your suggestions can lead to new features that benefit the entire community." class="w-full flex items-center p-3 hover:bg-gray-50 rounded-lg">
                    <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg><span class="text-gray-700">Request a feature</span></div>
                </button>
                <button onclick="showNotification('Contact support coming soon!', 'info')" data-explanation-title="Contact Support" data-explanation="Get help from MetaMask support team." data-explanation-why="If you encounter issues or have questions, the support team can help resolve problems and provide guidance on using MetaMask safely." class="w-full flex items-center p-3 hover:bg-gray-50 rounded-lg">
                    <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg><span class="text-gray-700">Contact support</span></div>
                </button>
                <div class="pt-2 border-t border-gray-100">
                    <button onclick="logout()" data-explanation-title="Log Out" data-explanation="Disconnect and lock your MetaMask wallet." data-explanation-why="Logging out secures your wallet when you're not using it. You'll need to unlock it with your password again to access your funds." class="w-full flex items-center p-3 hover:bg-red-50 rounded-lg text-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                        <span>Log out</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

        <div class="container mx-auto px-4 py-8 bg-gray-200 text-gray-800 px-5 py-5">
            
             <div>

                <p>
                    Dapps connection is quite easy when you get used to UI. Just visit the Dapp and click on the connect button,read the description to make sure it is safe and sign the transaction.                 
                </p>

                <br> <br>

                    <p>
                        This demo exposure is important to give you a view of the basic features of a wallet, so that the UI does not feel intimidating. You can download Metamask here <a class="text-indigo-500" href="https://metamask.io/" target="_blank">MetaMask website</a>, or app store on mobile devices, explore and learn more. 
                    </p>
                    <br>

                    <p>
                        This demo is basically the same steps for other web3 wallets like Trust Wallet, Binance wallet, Coinbase Wallet, OKX Wallet, Phantom , Solflare , e.t.c.
                    </p>
            </div>
        </div>

    <!-- Lightbox Modal -->
    <div id="lightbox-modal" class="lightbox-overlay hidden">
        <div class="lightbox-content">
            <button class="lightbox-close" onclick=" closeLightbox();">&times;</button>
            <h2 id="lightbox-title" class="lightbox-title"></h2>
            <div id="lightbox-description" class="lightbox-description"></div>
            <div id="lightbox-sections"></div>
        </div>
    </div>

    {{-- External JS (place metamask-demo.js in your public/js folder) --}}
    {{-- <script src="{{ asset('js/demo/metamaskdemo.js') }}"></script> --}}
        @vite('resources/js/demo/metamaskdemo.js')


</x-app-layout>