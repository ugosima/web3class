{{-- resources/views/trade.blade.php --}}

<x-app-layout>
    <style>
        .trading-blue { background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); }
        .trading-dark { background: linear-gradient(135deg, #1a1b24 0%, #2d2d3a 100%); }
        .card-shadow { box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .button-hover { transition: all 0.3s ease; }
        .button-hover:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
        .stage-image { border: 2px solid #e5e7eb; border-radius: 8px; }
        .stage-image.active { border-color: #3b82f6; box-shadow: 0 0 20px rgba(59, 130, 246, 0.3); }
        .tab-active { background: #3b82f6; color: white; }
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
                <i class="fab fa-bitcoin text-blue-500 mr-2"></i>
                Learn how to trade cryptocurrency with our interactive demonstration
            </p>
        </div>
        <br>

        <!-- Section 1: Picture Series -->
        <section class="mb-16">
            <div class="bg-white rounded-lg card-shadow p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">
                    <i class="fas fa-chart-line mr-2 text-blue-500"></i>
                    Trading Stages
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Stage 1 -->
                    <div class="text-center stage-container" data-stage="1">
                        <div class="stage-image mb-4 p-4 bg-gray-100 rounded-lg">
                            <i class="fas fa-wallet text-6xl text-blue-500"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Step 1: Fund Wallet</h3>
                        <p class="text-sm text-gray-600">Deposit USDT or other crypto to start trading</p>
                        <div class="mt-2">
                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Stage 1</span>
                        </div>
                    </div>

                    <!-- Stage 2 -->
                    <div class="text-center stage-container" data-stage="2">
                        <div class="stage-image mb-4 p-4 bg-gray-100 rounded-lg">
                            <i class="fas fa-exchange-alt text-6xl text-blue-500"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Step 2: Choose Pair</h3>
                        <p class="text-sm text-gray-600">Select trading pair like BTC/USDT</p>
                        <div class="mt-2">
                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Stage 2</span>
                        </div>
                    </div>

                    <!-- Stage 3 -->
                    <div class="text-center stage-container" data-stage="3">
                        <div class="stage-image mb-4 p-4 bg-gray-100 rounded-lg">
                            <i class="fas fa-hand-pointer text-6xl text-blue-500"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Step 3: Place Order</h3>
                        <p class="text-sm text-gray-600">Set amount and execute buy or sell order</p>
                        <div class="mt-2">
                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Stage 3</span>
                        </div>
                    </div>

                    <!-- Stage 4 -->
                    <div class="text-center stage-container" data-stage="4">
                        <div class="stage-image mb-4 p-4 bg-gray-100 rounded-lg">
                            <i class="fas fa-check-circle text-6xl text-blue-500"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Step 4: Manage Orders</h3>
                        <p class="text-sm text-gray-600">Monitor and manage your open orders</p>
                        <div class="mt-2">
                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Stage 4</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Guidelines -->
        <section>
            <p class="text-gray-700 text-lg">
                <i class="fab fa-bitcoin text-blue-500 mr-2"></i>
                <i class="fas fa-robot text-blue-500 mr-2"></i>
                    <b>Trading Demo guidelines</b>
            </p>
            
            <div class="text-gray-800">
                <p>Because the price of cryptocurrencies is always changing, an order is a way to tell the exchange that you want to buy or sell a certain amount of a cryptocurrency at a certain price.</p>
                <p>
                    When the price and amount of crypto available in the order book finally matches your order price, the order will be executed.
                </p>
            </div>
            <div class="text-gray-800">
                <ol class="list-decimal list-inside">
                    <li>This is the typical trading interface you will see on cryptocurrency exchanges.</li>
                    <li>For this demo, you can click any button once to navigate, or double click to see what the button does.</li>
                    <li>The user interface and button positions may vary between exchanges, but the foundation is primarily the same (Buy, Sell, Order Book, Price Charts)</li>
                    <li>Trading involves risk. Always do your own research and never invest more than you can afford to lose.</li>
                </ol>
            </div>
        </section>
        <br>

        <!-- Section 2: Trading Interface -->
        <section>
            <div class="bg-[#101116] rounded-lg shadow-sm p-3 sm:p-4 md:p-6 w-full break-words">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title x-text="`${selectedPair} Trade`">BTC/USDT Trade</title>

    <div
        x-data="{
            side: 'buy',
            amount: '',
            tokenAmount: '',
            targetPrice: 80169,
            slider: 0,
            slippage: false,
            selectedPair: 'BTC/USDT',
            tradingPairs: {
                'BTC/USDT': { price: 80169, change: 0.45 },
                'ETH/USDT': { price: 3245, change: 1.82 },
                'SOL/USDT': { price: 178, change: -0.54 },
                'BNB/USDT': { price: 612, change: 2.15 }
            },
            currentPrice: 80169,
            change: 0.45,
            orderTypeModal: false,
            selectedOrderType: 'Market',
            activeTab: 'spot',
            activeBottomTab: 'orders',
            activeMarginBottomTab: 'positions',
            marginSide: 'long',
            marginLeverage: 10,
            marginCollateral: '',
            marginBalance: 1000,
            marginPositions: [],
            marginHistory: [],
            activeEtfBottomTab: 'holdings',
            selectedEtf: 'BTCETF',
            etfOrderAmount: '',
            etfCashBalance: 1000,
            etfHoldings: {},
            etfHistory: [],
            activeAlphaBottomTab: 'strategies',
            selectedAlphaStrategy: 'signals',
            alphaAllocation: '',
            alphaBalance: 1000,
            alphaStrategies: [],
            alphaHistory: [],
            alphaStrategyTypes: {
                charts: { name: 'Advanced Charts', description: 'Technical Analysis', expected: 0.18, risk: 'Medium' },
                signals: { name: 'AI Signals', description: 'Smart Trading', expected: 0.24, risk: 'Medium' },
                flash: { name: 'Flash Trades', description: 'Instant Execution', expected: 0.32, risk: 'High' },
                predictions: { name: 'Predictions', description: 'Market Forecast', expected: 0.21, risk: 'High' }
            },
            convertFromAsset: 'BTC',
            convertToAsset: 'ETH',
            convertFromAmount: '',
            convertToAmount: '',
            convertHistory: [],
            activeConvertBottomTab: 'history',
            etfFunds: {
                BTCETF: { name: 'BTC ETF', description: 'Bitcoin Exchange Traded Fund', price: 80169, change: 2.45 },
                ETHETF: { name: 'ETH ETF', description: 'Ethereum Exchange Traded Fund', price: 3245, change: 1.82 },
                CRYPTOIDX: { name: 'Crypto Index ETF', description: 'Diversified Crypto Fund', price: 1250, change: -0.54 }
            },
            balances: {
                USDT: 1000,
                BTC: 0,
                ETH: 0,
                SOL: 0,
                BNB: 0
            },
            openOrders: [],
            orderHistory: [],
            sellOrders: [
                { price: '80,172.2', amount: '1.247692', depth: 35 },
                { price: '80,171.5', amount: '3.183800', depth: 60 },
                { price: '80,170.4', amount: '0.037431', depth: 25 },
                { price: '80,169.9', amount: '0.000300', depth: 45 },
                { price: '80,169.1', amount: '4.108223', depth: 80 },
            ],
            buyOrders: [
                { price: '80,169.0', amount: '3.167327', depth: 55 },
                { price: '80,168.1', amount: '0.000149', depth: 30 },
                { price: '80,165.7', amount: '0.032966', depth: 40 },
                { price: '80,165.6', amount: '0.000500', depth: 22 },
                { price: '80,163.6', amount: '0.000699', depth: 18 },
            ],
            selectPair(pair) {
                this.selectedPair = pair;
                this.currentPrice = this.tradingPairs[pair].price;
                this.targetPrice = this.currentPrice;
                this.change = this.tradingPairs[pair].change;
                this.updateOrderBook();
            },
            init() {
                tradeAppInstance = this;
                this.loadDemoState();
                this.targetPrice = this.currentPrice;
                setInterval(() => {
                    this.updateSimulatedPrices();
                    this.updateOrderBook();
                    this.checkOpenOrders();
                }, 2500);
            },
            currentAsset() {
                return this.selectedPair.split('/')[0];
            },
            storageKey() {
                return 'ordersdemo-simulated-state-v1';
            },
            loadDemoState() {
                try {
                    const saved = JSON.parse(localStorage.getItem(this.storageKey()));
                    if (!saved) return;
                    this.balances = { ...this.balances, ...(saved.balances || {}) };
                    this.openOrders = saved.openOrders || [];
                    this.orderHistory = saved.orderHistory || [];
                    this.marginBalance = Number(saved.marginBalance ?? this.marginBalance);
                    this.marginPositions = saved.marginPositions || [];
                    this.marginHistory = saved.marginHistory || [];
                    this.etfCashBalance = Number(saved.etfCashBalance ?? this.etfCashBalance);
                    this.etfHoldings = saved.etfHoldings || {};
                    this.etfHistory = saved.etfHistory || [];
                    this.alphaBalance = Number(saved.alphaBalance ?? this.alphaBalance);
                    this.alphaStrategies = saved.alphaStrategies || [];
                    this.alphaHistory = saved.alphaHistory || [];
                    this.convertFromAsset = saved.convertFromAsset || 'BTC';
                    this.convertToAsset = saved.convertToAsset || 'ETH';
                    this.convertHistory = saved.convertHistory || [];
                } catch (error) {
                    console.warn('Unable to load simulated order state', error);
                }
            },
            saveDemoState() {
                localStorage.setItem(this.storageKey(), JSON.stringify({
                    balances: this.balances,
                    openOrders: this.openOrders,
                    orderHistory: this.orderHistory,
                    marginBalance: this.marginBalance,
                    marginPositions: this.marginPositions,
                    marginHistory: this.marginHistory,
                    etfCashBalance: this.etfCashBalance,
                    etfHoldings: this.etfHoldings,
                    etfHistory: this.etfHistory,
                    alphaBalance: this.alphaBalance,
                    alphaStrategies: this.alphaStrategies,
                    alphaHistory: this.alphaHistory,
                    convertFromAsset: this.convertFromAsset,
                    convertToAsset: this.convertToAsset,
                    convertHistory: this.convertHistory
                }));
            },
            notify(message, type = 'info') {
                if (window.showNotification) {
                    window.showNotification(message, type);
                    return;
                }
                alert(message);
            },
            formatNumber(value, decimals = 2) {
                return Number(value || 0).toLocaleString(undefined, {
                    minimumFractionDigits: decimals,
                    maximumFractionDigits: decimals
                });
            },
            formatAsset(value) {
                return Number(value || 0).toLocaleString(undefined, {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 8
                });
            },
            maxBuyAmount() {
                return this.currentPrice > 0 ? this.balances.USDT / this.currentPrice : 0;
            },
            orderPrice() {
                return this.selectedOrderType === 'Market'
                    ? Number(this.currentPrice)
                    : Number(this.targetPrice || this.currentPrice);
            },
            syncTokenFromUsdt() {
                const total = Number(this.amount);
                const price = this.orderPrice();
                this.tokenAmount = total > 0 && price > 0
                    ? Number((total / price).toFixed(8))
                    : '';
            },
            syncUsdtFromToken() {
                const tokens = Number(this.tokenAmount);
                const price = this.orderPrice();
                this.amount = tokens > 0 && price > 0
                    ? Number((tokens * price).toFixed(2))
                    : '';
            },
            priceForPair(pair) {
                return this.tradingPairs[pair]?.price || this.currentPrice;
            },
            updateSimulatedPrices() {
                Object.keys(this.tradingPairs).forEach(pair => {
                    const basePrice = this.tradingPairs[pair].price;
                    const randomMove = (Math.random() - 0.5) * basePrice * 0.001;
                    const nextPrice = Math.max(0.01, basePrice + randomMove);

                    this.tradingPairs[pair].price = pair === 'BTC/USDT'
                        ? Math.floor(nextPrice)
                        : Number(nextPrice.toFixed(2));
                    this.tradingPairs[pair].change = parseFloat(((Math.random() * 2) - 1).toFixed(2));
                });

                Object.keys(this.etfFunds).forEach(symbol => {
                    const fund = this.etfFunds[symbol];
                    const randomMove = (Math.random() - 0.5) * fund.price * 0.001;
                    fund.price = Number(Math.max(0.01, fund.price + randomMove).toFixed(2));
                    fund.change = parseFloat(((Math.random() * 2) - 1).toFixed(2));
                });

                this.currentPrice = this.tradingPairs[this.selectedPair].price;
                this.change = this.tradingPairs[this.selectedPair].change;
                this.updateAlphaStrategies();
            },
            portfolioRows() {
                const labels = {
                    BTC: 'Bitcoin',
                    ETH: 'Ethereum',
                    SOL: 'Solana',
                    BNB: 'Binance Coin',
                    USDT: 'Tether'
                };
                const colors = {
                    BTC: 'bg-orange-500',
                    ETH: 'bg-blue-500',
                    SOL: 'bg-purple-500',
                    BNB: 'bg-yellow-500',
                    USDT: 'bg-green-500'
                };
                return Object.keys(this.balances).map(symbol => ({
                    symbol,
                    name: labels[symbol] || symbol,
                    color: colors[symbol] || 'bg-gray-500',
                    amount: this.balances[symbol],
                    value: symbol === 'USDT'
                        ? this.balances[symbol]
                        : this.balances[symbol] * (this.tradingPairs[`${symbol}/USDT`]?.price || 0)
                }));
            },
            updateOrderBook() {
                this.sellOrders = this.sellOrders.map(order => ({
                    ...order,
                    depth: Math.floor(Math.random() * 90) + 10
                }));

                this.buyOrders = this.buyOrders.map(order => ({
                    ...order,
                    depth: Math.floor(Math.random() * 90) + 10
                }));
            },
            submitOrder() {
                const price = this.orderPrice();
                const asset = this.currentAsset();
                const enteredTotal = Number(this.amount);
                const enteredAssetAmount = Number(this.tokenAmount);
                const assetAmount = enteredAssetAmount > 0
                    ? enteredAssetAmount
                    : (price > 0 ? enteredTotal / price : 0);
                const total = enteredTotal > 0
                    ? enteredTotal
                    : assetAmount * price;

                if (!assetAmount || assetAmount <= 0 || !total || total <= 0) {
                    this.notify('Please enter a token amount or USDT amount', 'error');
                    return;
                }

                if (!price || price <= 0) {
                    this.notify('Please enter a valid target price', 'error');
                    return;
                }

                if (this.side === 'buy' && this.balances.USDT < total) {
                    this.notify(`Insufficient USDT balance. Available: ${this.formatNumber(this.balances.USDT)} USDT`, 'error');
                    return;
                }

                if (this.side === 'sell' && (this.balances[asset] || 0) < assetAmount) {
                    this.notify(`Insufficient ${asset} balance. Available: ${this.formatAsset(this.balances[asset])} ${asset}`, 'error');
                    return;
                }

                const order = {
                    id: `demo-${Date.now()}-${Math.random().toString(36).slice(2, 8)}`,
                    pair: this.selectedPair,
                    asset,
                    side: this.side,
                    type: this.selectedOrderType,
                    total,
                    assetAmount,
                    targetPrice: price,
                    status: 'Open',
                    createdAt: new Date().toISOString()
                };

                this.openOrders.unshift(order);
                this.amount = '';
                this.tokenAmount = '';
                this.saveDemoState();
                this.notify(`${order.side.toUpperCase()} order placed in demo orders`, 'success');

                if (order.type === 'Market') {
                    this.executeOrder(order.id, this.currentPrice);
                }
            },
            shouldExecute(order) {
                if (order.type === 'Market') return true;
                const pairPrice = this.priceForPair(order.pair);
                if (order.side === 'buy') return pairPrice <= order.targetPrice;
                return pairPrice >= order.targetPrice;
            },
            checkOpenOrders() {
                this.openOrders
                    .filter(order => this.shouldExecute(order))
                    .forEach(order => this.executeOrder(order.id, this.priceForPair(order.pair)));
                this.checkMarginLiquidations();
            },
            cancelOrder(orderId) {
                const orderIndex = this.openOrders.findIndex(order => order.id === orderId);
                if (orderIndex === -1) return;

                const [cancelled] = this.openOrders.splice(orderIndex, 1);
                this.saveDemoState();
                this.notify(`${cancelled.side.toUpperCase()} ${cancelled.pair} demo order cancelled`, 'info');
            },
            executeOrder(orderId, executionPrice) {
                const orderIndex = this.openOrders.findIndex(order => order.id === orderId);
                if (orderIndex === -1) return;

                const order = this.openOrders[orderIndex];
                const total = order.assetAmount * executionPrice;

                if (order.side === 'buy') {
                    if (this.balances.USDT < total) {
                        this.notify(`Demo order could not execute: insufficient USDT`, 'error');
                        return;
                    }
                    this.balances.USDT -= total;
                    this.balances[order.asset] = (this.balances[order.asset] || 0) + order.assetAmount;
                } else {
                    if ((this.balances[order.asset] || 0) < order.assetAmount) {
                        this.notify(`Demo order could not execute: insufficient ${order.asset}`, 'error');
                        return;
                    }
                    this.balances[order.asset] -= order.assetAmount;
                    this.balances.USDT += total;
                }

                const [executed] = this.openOrders.splice(orderIndex, 1);
                this.orderHistory.unshift({
                    ...executed,
                    total,
                    executionPrice,
                    status: 'Executed',
                    executedAt: new Date().toISOString()
                });
                this.saveDemoState();
                this.notify(`${executed.side.toUpperCase()} ${executed.pair} demo order executed`, 'success');
            },
            setMarginLeverage(leverage) {
                this.marginLeverage = leverage;
            },
            marginNotional() {
                return Number(this.marginCollateral || 0) * this.marginLeverage;
            },
            maxMarginNotional() {
                return this.marginBalance * this.marginLeverage;
            },
            marginPnl(position, price = this.priceForPair(position.pair)) {
                const direction = position.side === 'long' ? 1 : -1;
                return (price - position.entryPrice) * position.assetAmount * direction;
            },
            marginRoi(position) {
                return position.collateral > 0
                    ? (this.marginPnl(position) / position.collateral) * 100
                    : 0;
            },
            openMarginPosition() {
                const collateral = Number(this.marginCollateral);
                const entryPrice = Number(this.currentPrice);
                const asset = this.currentAsset();

                if (!collateral || collateral <= 0) {
                    this.notify('Please enter margin collateral', 'error');
                    return;
                }

                if (collateral > this.marginBalance) {
                    this.notify(`Insufficient margin balance. Available: ${this.formatNumber(this.marginBalance)} USDT`, 'error');
                    return;
                }

                const notional = collateral * this.marginLeverage;
                const position = {
                    id: `margin-${Date.now()}-${Math.random().toString(36).slice(2, 8)}`,
                    pair: this.selectedPair,
                    asset,
                    side: this.marginSide,
                    leverage: this.marginLeverage,
                    collateral,
                    notional,
                    assetAmount: entryPrice > 0 ? notional / entryPrice : 0,
                    entryPrice,
                    status: 'Open',
                    openedAt: new Date().toISOString()
                };

                this.marginBalance -= collateral;
                this.marginPositions.unshift(position);
                this.marginCollateral = '';
                this.activeMarginBottomTab = 'positions';
                this.saveDemoState();
                this.notify(`${position.side.toUpperCase()} ${position.pair} margin position opened`, 'success');
            },
            closeMarginPosition(positionId, status = 'Closed') {
                const positionIndex = this.marginPositions.findIndex(position => position.id === positionId);
                if (positionIndex === -1) return;

                const position = this.marginPositions[positionIndex];
                const exitPrice = this.priceForPair(position.pair);
                const pnl = this.marginPnl(position, exitPrice);
                const returnedCollateral = Math.max(0, position.collateral + pnl);

                this.marginBalance += returnedCollateral;
                const [closed] = this.marginPositions.splice(positionIndex, 1);
                this.marginHistory.unshift({
                    ...closed,
                    exitPrice,
                    pnl,
                    returnedCollateral,
                    status,
                    closedAt: new Date().toISOString()
                });
                this.saveDemoState();
                this.notify(`${closed.side.toUpperCase()} ${closed.pair} margin position ${status.toLowerCase()}`, status === 'Liquidated' ? 'error' : 'success');
            },
            checkMarginLiquidations() {
                [...this.marginPositions].forEach(position => {
                    if (position.collateral + this.marginPnl(position) <= 0) {
                        this.closeMarginPosition(position.id, 'Liquidated');
                    }
                });
            },
            selectEtf(symbol) {
                this.selectedEtf = symbol;
            },
            selectedEtfFund() {
                return this.etfFunds[this.selectedEtf];
            },
            etfUnitsForAmount() {
                const amount = Number(this.etfOrderAmount);
                const price = this.selectedEtfFund()?.price || 0;
                return amount > 0 && price > 0 ? amount / price : 0;
            },
            etfHoldingUnits(symbol = this.selectedEtf) {
                return Number(this.etfHoldings[symbol]?.units || 0);
            },
            etfHoldingCost(symbol = this.selectedEtf) {
                return Number(this.etfHoldings[symbol]?.cost || 0);
            },
            etfHoldingValue(symbol = this.selectedEtf) {
                return this.etfHoldingUnits(symbol) * (this.etfFunds[symbol]?.price || 0);
            },
            etfHoldingPnl(symbol = this.selectedEtf) {
                return this.etfHoldingValue(symbol) - this.etfHoldingCost(symbol);
            },
            etfHoldingRows() {
                return Object.keys(this.etfHoldings)
                    .filter(symbol => this.etfHoldingUnits(symbol) > 0)
                    .map(symbol => ({
                        symbol,
                        ...this.etfFunds[symbol],
                        units: this.etfHoldingUnits(symbol),
                        cost: this.etfHoldingCost(symbol),
                        value: this.etfHoldingValue(symbol),
                        pnl: this.etfHoldingPnl(symbol)
                    }));
            },
            buyEtf() {
                const amount = Number(this.etfOrderAmount);
                const fund = this.selectedEtfFund();

                if (!amount || amount <= 0) {
                    this.notify('Please enter an ETF order amount', 'error');
                    return;
                }

                if (amount > this.etfCashBalance) {
                    this.notify(`Insufficient ETF demo cash. Available: ${this.formatNumber(this.etfCashBalance)} USDT`, 'error');
                    return;
                }

                const units = amount / fund.price;
                const currentHolding = this.etfHoldings[this.selectedEtf] || { units: 0, cost: 0 };
                this.etfHoldings = {
                    ...this.etfHoldings,
                    [this.selectedEtf]: {
                        units: currentHolding.units + units,
                        cost: currentHolding.cost + amount
                    }
                };
                this.etfCashBalance -= amount;
                this.recordEtfTrade('Buy', amount, units, fund.price);
                this.etfOrderAmount = '';
                this.activeEtfBottomTab = 'holdings';
                this.saveDemoState();
                this.notify(`${fund.name} ETF demo purchase completed`, 'success');
            },
            sellEtf() {
                const amount = Number(this.etfOrderAmount);
                const fund = this.selectedEtfFund();
                const units = fund.price > 0 ? amount / fund.price : 0;
                const currentHolding = this.etfHoldings[this.selectedEtf] || { units: 0, cost: 0 };

                if (!amount || amount <= 0) {
                    this.notify('Please enter an ETF order amount', 'error');
                    return;
                }

                if (units > currentHolding.units) {
                    this.notify(`Insufficient ${fund.name} units. Available: ${this.formatAsset(currentHolding.units)}`, 'error');
                    return;
                }

                const costReduction = currentHolding.units > 0
                    ? currentHolding.cost * (units / currentHolding.units)
                    : 0;
                currentHolding.units -= units;
                currentHolding.cost -= costReduction;

                if (currentHolding.units <= 0.00000001) {
                    const updatedHoldings = { ...this.etfHoldings };
                    delete updatedHoldings[this.selectedEtf];
                    this.etfHoldings = updatedHoldings;
                } else {
                    this.etfHoldings = {
                        ...this.etfHoldings,
                        [this.selectedEtf]: currentHolding
                    };
                }

                this.etfCashBalance += amount;
                this.recordEtfTrade('Sell', amount, units, fund.price);
                this.etfOrderAmount = '';
                this.activeEtfBottomTab = 'history';
                this.saveDemoState();
                this.notify(`${fund.name} ETF demo sale completed`, 'success');
            },
            recordEtfTrade(side, amount, units, price) {
                this.etfHistory.unshift({
                    id: `etf-${Date.now()}-${Math.random().toString(36).slice(2, 8)}`,
                    symbol: this.selectedEtf,
                    name: this.selectedEtfFund().name,
                    side,
                    amount,
                    units,
                    price,
                    tradedAt: new Date().toISOString()
                });
            },
            closeEtfHolding(symbol) {
                const holding = this.etfHoldings[symbol];
                if (!holding || holding.units <= 0) {
                    this.notify(`No ${symbol} holding to close`, 'error');
                    return;
                }

                const fund = this.etfFunds[symbol];
                const currentValue = holding.units * fund.price;
                const pnl = currentValue - holding.cost;

                this.etfCashBalance += currentValue;
                const updatedHoldings = { ...this.etfHoldings };
                delete updatedHoldings[symbol];
                this.etfHoldings = updatedHoldings;

                this.recordEtfTrade('Sell', currentValue, holding.units, fund.price);
                this.activeEtfBottomTab = 'history';
                this.saveDemoState();
                this.notify(`${fund.name} ETF holding closed. P&L: ${pnl >= 0 ? '+' : ''}${this.formatNumber(pnl)} USDT`, pnl >= 0 ? 'success' : 'error');
            },
            selectAlphaStrategy(type) {
                this.selectedAlphaStrategy = type;
            },
            convertRate() {
                const fromPrice = this.tradingPairs[`${this.convertFromAsset}/USDT`]?.price || 1;
                const toPrice = this.tradingPairs[`${this.convertToAsset}/USDT`]?.price || 1;
                return fromPrice / toPrice;
            },
            syncConvertFromAmount() {
                const amount = Number(this.convertFromAmount);
                const rate = this.convertRate();
                this.convertToAmount = amount > 0 && rate > 0 ? Number((amount * rate).toFixed(8)) : '';
            },
            syncConvertToAmount() {
                const amount = Number(this.convertToAmount);
                const rate = this.convertRate();
                this.convertFromAmount = amount > 0 && rate > 0 ? Number((amount / rate).toFixed(8)) : '';
            },
            swapConvertAssets() {
                const temp = this.convertFromAsset;
                this.convertFromAsset = this.convertToAsset;
                this.convertToAsset = temp;
                this.syncConvertFromAmount();
            },
            executeConvert() {
                const fromAmount = Number(this.convertFromAmount);
                const toAmount = Number(this.convertToAmount);
                const rate = this.convertRate();

                if (!fromAmount || fromAmount <= 0) {
                    this.notify('Please enter an amount to convert', 'error');
                    return;
                }

                if ((this.balances[this.convertFromAsset] || 0) < fromAmount) {
                    this.notify(`Insufficient ${this.convertFromAsset} balance. Available: ${this.formatAsset(this.balances[this.convertFromAsset])} ${this.convertFromAsset}`, 'error');
                    return;
                }

                this.balances[this.convertFromAsset] = (this.balances[this.convertFromAsset] || 0) - fromAmount;
                this.balances[this.convertToAsset] = (this.balances[this.convertToAsset] || 0) + toAmount;

                this.recordConvertTrade(fromAmount, toAmount, rate);
                this.convertFromAmount = '';
                this.convertToAmount = '';
                this.activeConvertBottomTab = 'history';
                this.saveDemoState();
                this.notify(`Converted ${this.formatAsset(fromAmount)} ${this.convertFromAsset} to ${this.formatAsset(toAmount)} ${this.convertToAsset}`, 'success');
            },
            recordConvertTrade(fromAmount, toAmount, rate) {
                this.convertHistory.unshift({
                    id: `convert-${Date.now()}-${Math.random().toString(36).slice(2, 8)}`,
                    fromAsset: this.convertFromAsset,
                    toAsset: this.convertToAsset,
                    fromAmount,
                    toAmount,
                    rate,
                    convertedAt: new Date().toISOString()
                });
            },
            selectedAlphaStrategyType() {
                return this.alphaStrategyTypes[this.selectedAlphaStrategy];
            },
            alphaTotalValue() {
                return this.alphaBalance + this.alphaStrategies.reduce((total, strategy) => total + strategy.value, 0);
            },
            alphaTotalPnl() {
                return this.alphaStrategies.reduce((total, strategy) => total + (strategy.value - strategy.allocation), 0);
            },
            startAlphaStrategy() {
                const allocation = Number(this.alphaAllocation);
                const strategyType = this.selectedAlphaStrategyType();

                if (!allocation || allocation <= 0) {
                    this.notify('Please enter an Alpha allocation', 'error');
                    return;
                }

                if (allocation > this.alphaBalance) {
                    this.notify(`Insufficient Alpha demo balance. Available: ${this.formatNumber(this.alphaBalance)} USDT`, 'error');
                    return;
                }

                const strategy = {
                    id: `alpha-${Date.now()}-${Math.random().toString(36).slice(2, 8)}`,
                    type: this.selectedAlphaStrategy,
                    name: strategyType.name,
                    risk: strategyType.risk,
                    allocation,
                    value: allocation,
                    status: 'Running',
                    startedAt: new Date().toISOString(),
                    ticks: 0
                };

                this.alphaBalance -= allocation;
                this.alphaStrategies.unshift(strategy);
                this.alphaAllocation = '';
                this.activeAlphaBottomTab = 'strategies';
                this.saveDemoState();
                this.notify(`${strategy.name} demo strategy started`, 'success');
            },
            updateAlphaStrategies() {
                this.alphaStrategies = this.alphaStrategies.map(strategy => {
                    if (strategy.status !== 'Running') return strategy;

                    const config = this.alphaStrategyTypes[strategy.type];
                    const volatility = config.risk === 'High' ? 0.018 : 0.01;
                    const drift = config.expected / 100;
                    const move = (Math.random() - 0.48) * volatility + drift;
                    return {
                        ...strategy,
                        value: Math.max(0, Number((strategy.value * (1 + move)).toFixed(2))),
                        ticks: strategy.ticks + 1
                    };
                });
                this.saveDemoState();
            },
            pauseAlphaStrategy(strategyId) {
                this.alphaStrategies = this.alphaStrategies.map(strategy => (
                    strategy.id === strategyId
                        ? { ...strategy, status: strategy.status === 'Running' ? 'Paused' : 'Running' }
                        : strategy
                ));
                this.saveDemoState();
            },
            stopAlphaStrategy(strategyId) {
                const strategyIndex = this.alphaStrategies.findIndex(strategy => strategy.id === strategyId);
                if (strategyIndex === -1) return;

                const [strategy] = this.alphaStrategies.splice(strategyIndex, 1);
                const pnl = strategy.value - strategy.allocation;
                this.alphaBalance += strategy.value;
                this.alphaHistory.unshift({
                    ...strategy,
                    pnl,
                    status: 'Stopped',
                    stoppedAt: new Date().toISOString()
                });
                this.saveDemoState();
                this.notify(`${strategy.name} demo strategy stopped`, pnl >= 0 ? 'success' : 'info');
            },
            selectOrderType(type) {
                this.selectedOrderType = type;
                this.orderTypeModal = false;
            }
        }"
        class="min-h-screen bg-black text-white overflow-hidden"
        id="trade-app-container"
        x-init="init()"
    >

        {{-- top nav --}}
        <div class="flex items-center gap-6 px-5 pt-5 pb-4 border-b border-white/5 overflow-x-auto whitespace-nowrap">

            <button 
                data-explanation-title="Back Button"
                data-explanation="Navigate back to the previous screen."
                data-explanation-why="Navigation allows you to move between different sections of the exchange interface."
                class="text-2xl leading-none text-gray-300">
                ‹
            </button>

            <button
                @click="activeTab = 'spot'"
                :class="activeTab === 'spot' ? 'text-white font-bold' : 'text-gray-500 font-semibold'"
                data-explanation-title="Spot Trading"
                data-explanation="Access spot trading for immediate buy/sell orders at current market prices."
                data-explanation-why="Spot trading is the most basic form of trading where you buy or sell assets for immediate delivery."
                class="text-lg">
                Spot
            </button>

            <button
                @click="activeTab = 'margin'"
                :class="activeTab === 'margin' ? 'text-white font-bold' : 'text-gray-500 font-semibold'"
                data-explanation-title="Margin Trading"
                data-explanation="Access margin trading with leverage to amplify potential gains (and losses)."
                data-explanation-why="Margin trading allows you to trade with borrowed funds, increasing your buying power but also your risk."
                class="text-lg">
                Margin
            </button>

            <button
                @click="activeTab = 'etf'"
                :class="activeTab === 'etf' ? 'text-white font-bold' : 'text-gray-500 font-semibold'"
                data-explanation-title="ETF Trading"
                data-explanation="Trade cryptocurrency ETFs (Exchange Traded Funds)."
                data-explanation-why="ETFs provide exposure to crypto without directly holding the assets, often with regulatory oversight."
                class="text-lg">
                ETF
            </button>

            <button
                @click="activeTab = 'alpha'"
                :class="activeTab === 'alpha' ? 'text-white font-bold' : 'text-gray-500 font-semibold'"
                data-explanation-title="Alpha Trading"
                data-explanation="Access advanced trading features and strategies."
                data-explanation-why="Alpha features are designed for experienced traders seeking advanced tools and analytics."
                class="text-lg">
                Alpha
            </button>

            <button
                @click="activeTab = 'convert'"
                :class="activeTab === 'convert' ? 'text-white font-bold' : 'text-gray-500 font-semibold'"
                data-explanation-title="Convert"
                data-explanation="Convert one cryptocurrency to another instantly."
                data-explanation-why="Convert provides a simple way to swap tokens without complex order placement."
                class="text-lg">
                Convert
            </button>

        </div>

        {{-- pair header --}}
        <div class="px-5 pt-5 flex items-start justify-between">

            <div>

                <div class="flex items-center gap-2">
                    <h1 class="text-2xl font-bold tracking-tight" x-text="selectedPair">
                        BTC/USDT
                    </h1>

                    <svg
                        class="w-4 h-4 text-gray-300 mt-1"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path d="M5.5 7l4.5 5 4.5-5z"/>
                    </svg>
                </div>

                {{-- trading pair selector --}}
                <div class="flex gap-2 mt-3">
                    <button 
                        @click="selectPair('BTC/USDT')"
                        :class="selectedPair === 'BTC/USDT' ? 'bg-blue-600 text-white' : 'bg-[#2d2d3a] text-gray-400'"
                        class="px-3 py-1 rounded-lg text-xs font-semibold transition-all">
                        BTC/USDT
                    </button>
                    <button 
                        @click="selectPair('ETH/USDT')"
                        :class="selectedPair === 'ETH/USDT' ? 'bg-blue-600 text-white' : 'bg-[#2d2d3a] text-gray-400'"
                        class="px-3 py-1 rounded-lg text-xs font-semibold transition-all">
                        ETH/USDT
                    </button>
                    <button 
                        @click="selectPair('SOL/USDT')"
                        :class="selectedPair === 'SOL/USDT' ? 'bg-blue-600 text-white' : 'bg-[#2d2d3a] text-gray-400'"
                        class="px-3 py-1 rounded-lg text-xs font-semibold transition-all">
                        SOL/USDT
                    </button>
                    <button 
                        @click="selectPair('BNB/USDT')"
                        :class="selectedPair === 'BNB/USDT' ? 'bg-blue-600 text-white' : 'bg-[#2d2d3a] text-gray-400'"
                        class="px-3 py-1 rounded-lg text-xs font-semibold transition-all">
                        BNB/USDT
                    </button>
                </div>

                <p
                    class="text-base font-semibold mt-1"
                    :class="change >= 0 ? 'text-[#16c784]' : 'text-[#ef4444]'"
                    x-text="`${change > 0 ? '+' : ''}${change.toFixed(2)}%`"
                ></p>

            </div>

            <div class="flex items-center gap-5 text-gray-300 pt-2">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M4 19h16"/>
                    <path d="M4 15l4-4 4 3 5-7 3 2"/>
                    <circle cx="18" cy="18" r="3"/>
                </svg>

                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M6 3v18"/>
                    <path d="M18 3v18"/>
                    <rect x="4" y="7" width="4" height="10"/>
                    <rect x="16" y="5" width="4" height="12"/>
                </svg>

                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <circle cx="5" cy="12" r="2"/>
                    <circle cx="12" cy="12" r="2"/>
                    <circle cx="19" cy="12" r="2"/>
                </svg>

            </div>

        </div>

        {{-- content --}}
        <div x-show="activeTab === 'spot'" class="grid grid-cols-2 gap-4 px-5 pt-6">

            {{-- left side --}}
            <div>

                {{-- buy sell --}}
                <div class="bg-[#1a1b24] rounded-3xl p-1 flex">

                    <button
                        @click="side = 'buy'"
                        :class="side === 'buy'
                            ? 'bg-[#2fc48d] text-white'
                            : 'text-gray-400'"
                        data-explanation-title="Buy Button"
                        data-explanation="Switch to buy mode to purchase cryptocurrency."
                        data-explanation-why="Buying allows you to acquire cryptocurrency at the current market price or a specified limit price."
                        class="flex-1 py-2 rounded-full text-lg font-semibold transition"
                    >
                        Buy
                    </button>

                    <button
                        @click="side = 'sell'"
                        :class="side === 'sell'
                            ? 'bg-[#ef4444] text-white'
                            : 'text-gray-400'"
                        data-explanation-title="Sell Button"
                        data-explanation="Switch to sell mode to sell your cryptocurrency."
                        data-explanation-why="Selling allows you to convert your cryptocurrency back to USDT or other fiat at the current market price or a specified limit price."
                        class="flex-1 py-2 rounded-full text-lg font-semibold transition"
                    >
                        Sell
                    </button>

                </div>

                {{-- order type --}}
                <div class="mt-5 space-y-4" x-ignore>

                    <div 
                        id="order-type-button"
                        onclick="openOrderTypeModal()"
                        data-explanation-title="Market Order"
                        data-explanation="Execute order immediately at the best available current market price."
                        data-explanation-why="Market orders are filled quickly but the exact price may vary slightly due to market volatility and slippage."
                        class="w-full bg-[#1a1b24] rounded-2xl h-14 px-4 flex items-center justify-between cursor-pointer"
                        style="pointer-events: auto; z-index: 10; position: relative;">
                        <span class="text-lg font-semibold" id="order-type-text">
                            Market
                        </span>

                        <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5.5 7l4.5 5 4.5-5z"/>
                        </svg>
                    </div>

                    <button 
                        data-explanation-title="Best Market Price"
                        data-explanation="Get the best available price across multiple order book levels."
                        data-explanation-why="This option helps minimize slippage by spreading the order across multiple price levels for better execution."
                        class="w-full bg-[#1a1b24] rounded-2xl h-14 px-4 flex items-center justify-between">
                        <span class="text-lg font-semibold">
                            Best Market Price
                        </span>

                        <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5.5 7l4.5 5 4.5-5z"/>
                        </svg>
                    </button>

                </div>

                {{-- token amount input --}}
                <label class="block mt-5 text-xs font-semibold uppercase tracking-wide text-gray-400">
                    Amount in <span x-text="currentAsset()"></span>
                </label>

                <div class="mt-2 bg-[#1a1b24] rounded-2xl h-16 px-4 flex items-center justify-between">

                    <input
                        type="number"
                        x-model.number="tokenAmount"
                        @input="syncUsdtFromToken()"
                        :placeholder="`Amount in ${currentAsset()}`"
                        class="bg-transparent outline-none text-lg placeholder:text-gray-500 w-full"
                    >

                    <div class="flex items-center gap-2 text-2xl font-semibold">

                        <span x-text="currentAsset()"></span>

                        <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5.5 7l4.5 5 4.5-5z"/>
                        </svg>

                    </div>

                </div>

                {{-- total input --}}
                <label class="block mt-4 text-xs font-semibold uppercase tracking-wide text-gray-400">
                    Amount in USDT
                </label>

                <div class="mt-2 bg-[#1a1b24] rounded-2xl h-16 px-4 flex items-center justify-between">

                    <input
                        type="number"
                        x-model.number="amount"
                        @input="syncTokenFromUsdt()"
                        placeholder="Amount in USDT"
                        class="bg-transparent outline-none text-lg placeholder:text-gray-500 w-full"
                    >

                    <div class="flex items-center gap-2 text-2xl font-semibold">

                        <span>
                            USDT
                        </span>

                        <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5.5 7l4.5 5 4.5-5z"/>
                        </svg>

                    </div>

                </div>

                {{-- target price --}}
                <label class="block mt-4 text-xs font-semibold uppercase tracking-wide text-gray-400">
                    Target price in USDT
                </label>

                <div class="mt-4 bg-[#1a1b24] rounded-2xl h-16 px-4 flex items-center justify-between">

                    <input
                        type="number"
                        x-model.number="targetPrice"
                        @input="syncTokenFromUsdt()"
                        placeholder="Target price"
                        class="bg-transparent outline-none text-lg placeholder:text-gray-500 w-full"
                    >

                    <span class="text-2xl font-semibold">
                        USDT
                    </span>

                </div>

                {{-- slider --}}
                <div class="mt-6">

                    <input
                        type="range"
                        min="0"
                        max="100"
                        step="1"
                        x-model="slider"
                        class="w-full accent-white"
                    >

                    <div class="flex justify-between mt-2 px-1">

                        <template x-for="i in 5">
                            <div class="w-4 h-4 rounded-full border border-gray-600 bg-black"></div>
                        </template>

                    </div>

                </div>

                {{-- slippage --}}
                <div class="mt-7 flex items-center gap-3">

                    <button
                        @click="slippage = !slippage"
                        data-explanation-title="Slippage Tolerance"
                        data-explanation="Set the maximum acceptable price slippage for your order."
                        data-explanation-why="Slippage tolerance protects you from executing orders at significantly worse prices than expected during high volatility."
                        class="w-6 h-6 border border-gray-600 rounded"
                    >
                        <div
                            x-show="slippage"
                            class="w-full h-full bg-white rounded-sm"
                        ></div>
                    </button>

                    <span class="text-base border-b border-dotted border-gray-500 pb-1">
                        Slippage
                    </span>

                </div>

                {{-- balances --}}
                <div class="mt-24 space-y-4">

                    <div class="flex items-center justify-between">
                        <span class="text-gray-400 text-base">
                            Available
                        </span>

                        <div class="flex items-center gap-2">

                            <span class="text-lg font-semibold">
                                <span x-text="formatNumber(balances.USDT)"></span> USDT
                            </span>

                            <button class="w-6 h-6 rounded-full border border-white flex items-center justify-center text-sm">
                                +
                            </button>

                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-gray-400 text-base">
                            <span x-text="side === 'buy' ? 'Max Buy' : `Available ${currentAsset()}`"></span>
                        </span>

                        <span class="text-lg font-semibold">
                            <span x-text="side === 'buy' ? formatAsset(maxBuyAmount()) : formatAsset(balances[currentAsset()] || 0)"></span>
                            <span x-text="currentAsset()"></span>
                        </span>
                    </div>

                </div>

                {{-- action --}}
                <button
                    @click="submitOrder()"
                    :class="side === 'buy'
                        ? 'bg-[#2fc48d]'
                        : 'bg-[#ef4444]'"
                    data-explanation-title="Submit Order"
                    data-explanation="Execute your buy or sell order at the specified amount."
                    data-explanation-why="This submits your order to the exchange matching engine. Market orders execute immediately, while limit orders wait for your target price."
                    class="mt-8 w-full h-16 rounded-3xl text-xl font-bold transition active:scale-[0.98]"
                >
                    <span x-text="`${side === 'buy' ? 'Buy' : 'Sell'} ${currentAsset()}`"></span>
                </button>

            </div>

            {{-- orderbook --}}
            <div>

                <div class="flex justify-between text-gray-400 text-sm mb-3">

                    <div>
                        Price (USDT)
                    </div>

                    <div>
                        Amount (<span x-text="currentAsset()"></span>)
                    </div>

                </div>

                {{-- sell orders --}}
                <div class="space-y-2">

                    <template x-for="item in sellOrders">

                        <div class="flex justify-between relative overflow-hidden rounded">

                            <div
                                class="absolute right-0 top-0 h-full bg-red-900/40"
                                :style="`width:${item.depth}%`"
                            ></div>

                            <div class="relative z-10 text-[#ff4d6d] text-base">
                                <span x-text="item.price"></span>
                            </div>

                            <div class="relative z-10 text-base">
                                <span x-text="item.amount"></span>
                            </div>

                        </div>

                    </template>

                </div>

                {{-- current price --}}
                <div class="mt-5">

                    <div class="text-5xl font-bold">
                        <span x-text="currentPrice.toLocaleString()"></span>
                    </div>

                    <div class="text-gray-500 text-2xl mt-1">
                        ≈ $<span x-text="currentPrice.toLocaleString()"></span>
                    </div>

                </div>

                {{-- buy orders --}}
                <div class="mt-5 space-y-2">

                    <template x-for="item in buyOrders">

                        <div class="flex justify-between relative overflow-hidden rounded">

                            <div
                                class="absolute right-0 top-0 h-full bg-green-900/40"
                                :style="`width:${item.depth}%`"
                            ></div>

                            <div class="relative z-10 text-[#16c784] text-base">
                                <span x-text="item.price"></span>
                            </div>

                            <div class="relative z-10 text-base">
                                <span x-text="item.amount"></span>
                            </div>

                        </div>

                    </template>

                </div>

                {{-- buy sell ratio --}}
                <div class="mt-6">

                    <div class="flex items-center gap-2">

                        <span class="text-[#16c784] text-base">
                            B 26%
                        </span>

                        <div class="flex-1 h-3 rounded-full overflow-hidden flex">

                            <div class="w-[26%] bg-[#16c784]"></div>
                            <div class="w-[74%] bg-pink-500"></div>

                        </div>

                        <span class="text-pink-500 text-base">
                            74% S
                        </span>

                    </div>

                </div>

                {{-- controls --}}
                <div class="mt-5 flex gap-3">

                    <button 
                        data-explanation-title="Order Percentage"
                        data-explanation="Quickly set order amount as a percentage of your available balance."
                        data-explanation-why="Percentage buttons allow fast order sizing - 0.1 means 10% of your balance, commonly used for position sizing strategies."
                        class="flex-1 bg-[#1a1b24] rounded-2xl h-14 px-4 flex items-center justify-between text-base">
                        <span>0.1</span>

                        <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5.5 7l4.5 5 4.5-5z"/>
                        </svg>
                    </button>

                    <button 
                        data-explanation-title="Order Book Settings"
                        data-explanation="Access order book display settings and depth configuration."
                        data-explanation-why="Order book settings control how much depth is shown, aggregation levels, and other visualization preferences."
                        class="w-12 bg-[#1a1b24] rounded-2xl flex items-center justify-center"
                        >
                        

                        <div class="grid grid-cols-2 gap-1">
                            <div class="w-3 h-6 bg-gray-400 rounded-sm"></div>
                            <div class="w-3 h-6 bg-pink-500 rounded-sm"></div>
                            <div class="w-3 h-6 bg-gray-400 rounded-sm"></div>
                            <div class="w-3 h-6 bg-[#16c784] rounded-sm"></div>
                        </div>

                    </button>

                </div>

            </div>

        </div>

        {{-- bottom section --}}
        <div x-show="activeTab === 'spot'" class="mt-8 border-t border-white/5">

            {{-- tabs --}}
            <div class="flex items-center gap-6 px-4 pt-4 text-base overflow-x-auto whitespace-nowrap">

                <button
                    @click="activeBottomTab = 'orders'"
                    :class="activeBottomTab === 'orders' ? 'font-semibold text-white' : 'text-gray-400'"
                    data-explanation-title="Orders Tab"
                    data-explanation="View your open orders and order history."
                    data-explanation-why="The orders tab shows all your active limit orders, market orders, and order history for the current trading pair."
                    class="relative pb-4">
                    Orders (<span x-text="openOrders.length"></span>)

                    <div x-show="activeBottomTab === 'orders'" class="absolute bottom-0 left-0 w-14 h-1.5 bg-white rounded-full"></div>
                </button>

                <button
                    @click="activeBottomTab = 'assets'"
                    :class="activeBottomTab === 'assets' ? 'font-semibold text-white' : 'text-gray-400'"
                    data-explanation-title="Assets Tab"
                    data-explanation="View your asset balances and portfolio including BTC, ETH, USDT, and other cryptocurrencies."
                    data-explanation-why="The assets tab displays all your cryptocurrency holdings with real-time values, profit/loss calculations, and portfolio allocation across different tokens."
                    class="relative pb-4">
                    Assets

                    <div x-show="activeBottomTab === 'assets'" class="absolute bottom-0 left-0 w-14 h-1.5 bg-white rounded-full"></div>
                </button>

                <button
                    @click="activeBottomTab = 'bots'"
                    :class="activeBottomTab === 'bots' ? 'font-semibold text-white' : 'text-gray-400'"
                    data-explanation-title="Bots Tab"
                    data-explanation="Access trading bots and automated trading strategies like DCA, grid trading, and arbitrage."
                    data-explanation-why="Trading bots can automate your trading strategies 24/7, executing orders based on predefined rules like dollar-cost averaging, grid trading, or arbitrage without manual intervention."
                    class="relative pb-4">
                    Bots (0)

                    <div x-show="activeBottomTab === 'bots'" class="absolute bottom-0 left-0 w-14 h-1.5 bg-white rounded-full"></div>
                </button>

                <button 
                    @click="activeBottomTab = 'history'"
                    :class="activeBottomTab === 'history' ? 'font-semibold text-white' : 'text-gray-400'"
                    data-explanation-title="Order History"
                    data-explanation="View detailed order history and transaction records."
                    data-explanation-why="Order history provides a complete record of all your past trades, useful for analysis and tax reporting."
                    class="relative pb-4 ml-auto">
                    📄
                    <div x-show="activeBottomTab === 'history'" class="absolute bottom-0 left-0 w-8 h-1.5 bg-white rounded-full"></div>
                </button>

            </div>

            {{-- open orders --}}
            <div x-show="activeBottomTab === 'orders' && openOrders.length === 0" class="h-[240px] flex flex-col items-center justify-center">

                <div class="w-20 h-20 bg-gray-700/50 rounded-2xl flex items-center justify-center text-3xl">
                    📄
                </div>

                <p class="mt-6 text-2xl font-medium text-gray-300">
                    No open orders
                </p>

            </div>

            <div x-show="activeBottomTab === 'orders' && openOrders.length > 0" class="px-4 py-4 space-y-3">
                <template x-for="order in openOrders" :key="order.id">
                    <div class="bg-[#1a1b24] rounded-xl p-4">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span
                                        class="text-xs font-bold uppercase px-2 py-1 rounded"
                                        :class="order.side === 'buy' ? 'bg-green-500/15 text-green-400' : 'bg-red-500/15 text-red-400'"
                                        x-text="order.side"
                                    ></span>
                                    <span class="text-white font-semibold" x-text="order.pair"></span>
                                    <span class="text-gray-400 text-sm" x-text="order.type"></span>
                                </div>
                                <p class="text-gray-400 text-sm mt-2">
                                    Target <span class="text-white" x-text="formatNumber(order.targetPrice)"></span> USDT
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-white font-semibold">
                                    <span x-text="formatNumber(order.total)"></span> USDT
                                </p>
                                <p class="text-gray-400 text-sm">
                                    <span x-text="formatAsset(order.assetAmount)"></span>
                                    <span x-text="order.asset"></span>
                                </p>
                                <button
                                    @click="cancelOrder(order.id)"
                                    class="mt-3 px-3 py-1.5 rounded-lg border border-red-500/40 text-red-400 text-sm font-semibold hover:bg-red-500/10 transition"
                                >
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            {{-- assets section --}}
            <div x-show="activeBottomTab === 'assets'" class="px-4 py-4 space-y-3">
                <template x-for="asset in portfolioRows()" :key="asset.symbol">
                    <div class="bg-[#1a1b24] rounded-xl p-4 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center text-lg" :class="asset.color" x-text="asset.symbol.charAt(0)"></div>
                            <div>
                                <p class="text-white font-semibold" x-text="asset.name"></p>
                                <p class="text-gray-400 text-sm" x-text="asset.symbol"></p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-white font-semibold">
                                <span x-text="formatAsset(asset.amount)"></span>
                                <span x-text="asset.symbol"></span>
                            </p>
                            <p class="text-gray-400 text-sm">
                                $<span x-text="formatNumber(asset.value)"></span>
                            </p>
                        </div>
                    </div>
                </template>

                <div class="hidden">
                <div class="bg-[#1a1b24] rounded-xl p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center text-lg">₿</div>
                        <div>
                            <p class="text-white font-semibold">Bitcoin</p>
                            <p class="text-gray-400 text-sm">BTC</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-white font-semibold">0.025 BTC</p>
                        <p class="text-green-500 text-sm">+$2,004.23</p>
                    </div>
                </div>

                <div class="bg-[#1a1b24] rounded-xl p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-lg">Ξ</div>
                        <div>
                            <p class="text-white font-semibold">Ethereum</p>
                            <p class="text-gray-400 text-sm">ETH</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-white font-semibold">1.5 ETH</p>
                        <p class="text-green-500 text-sm">+$4,867.50</p>
                    </div>
                </div>

                <div class="bg-[#1a1b24] rounded-xl p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center text-lg">$</div>
                        <div>
                            <p class="text-white font-semibold">Tether</p>
                            <p class="text-gray-400 text-sm">USDT</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-white font-semibold">5,000 USDT</p>
                        <p class="text-gray-400 text-sm">$5,000.00</p>
                    </div>
                </div>

                <div class="bg-[#1a1b24] rounded-xl p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center text-lg">◎</div>
                        <div>
                            <p class="text-white font-semibold">Solana</p>
                            <p class="text-gray-400 text-sm">SOL</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-white font-semibold">25 SOL</p>
                        <p class="text-red-500 text-sm">-$178.50</p>
                    </div>
                </div>

                <div class="bg-[#1a1b24] rounded-xl p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center text-lg">◆</div>
                        <div>
                            <p class="text-white font-semibold">Binance Coin</p>
                            <p class="text-gray-400 text-sm">BNB</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-white font-semibold">3.2 BNB</p>
                        <p class="text-green-500 text-sm">+$1,958.40</p>
                    </div>
                </div>

                <div class="bg-[#1a1b24] rounded-xl p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-400 rounded-full flex items-center justify-center text-lg">●</div>
                        <div>
                            <p class="text-white font-semibold">Cardano</p>
                            <p class="text-gray-400 text-sm">ADA</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-white font-semibold">500 ADA</p>
                        <p class="text-green-500 text-sm">+$245.00</p>
                    </div>
                </div>
            </div>

                </div>

            {{-- order history --}}
            <div x-show="activeBottomTab === 'history' && orderHistory.length === 0" class="h-[240px] flex flex-col items-center justify-center">
                <div class="w-20 h-20 bg-gray-700/50 rounded-2xl flex items-center justify-center text-3xl">
                    ðŸ“„
                </div>

                <p class="mt-6 text-2xl font-medium text-gray-300">
                    No order history
                </p>
            </div>

            <div x-show="activeBottomTab === 'history' && orderHistory.length > 0" class="px-4 py-4 space-y-3">
                <template x-for="order in orderHistory" :key="`${order.id}-${order.executedAt}`">
                    <div class="bg-[#1a1b24] rounded-xl p-4">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span
                                        class="text-xs font-bold uppercase px-2 py-1 rounded"
                                        :class="order.side === 'buy' ? 'bg-green-500/15 text-green-400' : 'bg-red-500/15 text-red-400'"
                                        x-text="order.side"
                                    ></span>
                                    <span class="text-white font-semibold" x-text="order.pair"></span>
                                    <span class="text-gray-400 text-sm" x-text="order.status"></span>
                                </div>
                                <p class="text-gray-400 text-sm mt-2">
                                    Filled at <span class="text-white" x-text="formatNumber(order.executionPrice)"></span> USDT
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-white font-semibold">
                                    <span x-text="formatNumber(order.total)"></span> USDT
                                </p>
                                <p class="text-gray-400 text-sm">
                                    <span x-text="formatAsset(order.assetAmount)"></span>
                                    <span x-text="order.asset"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            {{-- bots section --}}
            <div x-show="activeBottomTab === 'bots'" class="h-[240px] flex flex-col items-center justify-center">

                <div class="w-20 h-20 bg-gray-700/50 rounded-2xl flex items-center justify-center text-3xl">
                    🤖
                </div>

                <p class="mt-6 text-2xl font-medium text-gray-300">
                    No active bots
                </p>

                <p class="mt-2 text-gray-400 text-sm">
                    Create a bot to automate your trading strategy
                </p>

                <button class="mt-4 px-6 py-2 bg-blue-600 rounded-xl text-white font-semibold hover:bg-blue-700 transition">
                    Create Bot
                </button>

            </div>

        </div>

        {{-- margin trading content --}}
        <div x-show="activeTab === 'margin'" class="px-5 pt-6">
            <div class="bg-[#1a1b24] rounded-3xl p-6">
                <h2 class="text-xl font-bold mb-4">Margin Trading</h2>
                
                {{-- leverage selector --}}
                <div class="mb-6">
                    <label class="text-gray-400 text-sm mb-2 block">Leverage</label>
                    <div class="flex gap-2">
                        <template x-for="leverage in [2, 5, 10, 20]" :key="leverage">
                            <button
                                @click="setMarginLeverage(leverage)"
                                :class="marginLeverage === leverage ? 'bg-blue-600 h-14 text-xl' : 'bg-[#2d2d3a] h-12 text-base'"
                                class="flex-1 rounded-2xl font-semibold text-white transition-all"
                                x-text="`${leverage}x`"
                                data-explanation-title="Leverage Selector"
                                data-explanation="Select your leverage multiplier for margin trading."
                                data-explanation-why="Leverage amplifies both potential gains and losses. Higher leverage means more exposure with less collateral, but increases liquidation risk."
                            ></button>
                        </template>
                    </div>
                </div>

                {{-- long short selector --}}
                <div class="bg-[#2d2d3a] rounded-2xl p-1 flex mb-4">
                    <button
                        @click="marginSide = 'long'"
                        :class="marginSide === 'long' ? 'bg-[#2fc48d] text-white' : 'text-gray-400'"
                        class="flex-1 py-2 rounded-xl font-semibold transition"
                        data-explanation-title="Long Position"
                        data-explanation="Open a long position to profit from price increases."
                        data-explanation-why="Going long means you're betting the price will go up. If it does, you profit. If it goes down, you incur losses."
                    >
                        Long
                    </button>
                    <button
                        @click="marginSide = 'short'"
                        :class="marginSide === 'short' ? 'bg-[#ef4444] text-white' : 'text-gray-400'"
                        class="flex-1 py-2 rounded-xl font-semibold transition"
                        data-explanation-title="Short Position"
                        data-explanation="Open a short position to profit from price decreases."
                        data-explanation-why="Going short means you're betting the price will go down. If it does, you profit. If it goes up, you incur losses."
                    >
                        Short
                    </button>
                </div>

                {{-- collateral input --}}
                <label class="text-gray-400 text-sm mb-2 block">Collateral in USDT</label>
                <div class="bg-[#2d2d3a] rounded-2xl h-14 px-4 flex items-center justify-between mb-4">
                    <input
                        type="number"
                        x-model.number="marginCollateral"
                        placeholder="Margin collateral"
                        class="bg-transparent outline-none text-base placeholder:text-gray-500 w-full"
                    >
                    <span class="text-white font-semibold">USDT</span>
                </div>

                {{-- margin balance --}}
                <div class="flex justify-between mb-4">
                    <span class="text-gray-400 text-sm">Available Margin</span>
                    <span class="text-white text-base font-semibold">
                        <span x-text="formatNumber(marginBalance)"></span> USDT
                    </span>
                </div>

                {{-- position info --}}
                <div class="bg-[#2d2d3a] rounded-2xl p-3 mb-4">
                    <div class="flex justify-between mb-3">
                        <span class="text-gray-400">Position Size</span>
                        <span class="text-white font-semibold">
                            <span x-text="formatNumber(marginNotional())"></span> USDT
                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Max Position Size</span>
                        <span class="text-white font-semibold">
                            <span x-text="formatNumber(maxMarginNotional())"></span> USDT
                        </span>
                    </div>
                </div>

                <button
                    @click="openMarginPosition()"
                    :class="marginSide === 'long' ? 'bg-[#2fc48d]' : 'bg-[#ef4444]'"
                    class="w-full h-12 rounded-2xl text-base font-bold text-white transition active:scale-[0.98]"
                    data-explanation-title="Open Margin Position"
                    data-explanation="Open a leveraged margin position with your selected collateral and leverage."
                    data-explanation-why="Opening a margin position allows you to trade with borrowed funds, amplifying both potential profits and losses based on your leverage multiplier."
                >
                    <span x-text="`${marginSide === 'long' ? 'Open Long' : 'Open Short'} ${currentAsset()}`"></span>
                </button>
            </div>
        </div>

        {{-- etf trading content --}}
        <div x-show="activeTab === 'etf'" class="px-5 pt-6">
            <div class="bg-[#1a1b24] rounded-3xl p-6">
                <h2 class="text-xl font-bold mb-4">ETF Trading</h2>
                
                {{-- etf list --}}
                <div class="space-y-4">
                    <template x-for="(fund, symbol) in etfFunds" :key="symbol">
                        <button
                            @click="selectEtf(symbol)"
                            :class="selectedEtf === symbol ? 'border-blue-500 bg-blue-500/10' : 'border-transparent bg-[#2d2d3a]'"
                            class="w-full rounded-2xl p-3 border flex items-center justify-between text-left transition"
                            data-explanation-title="ETF Selection"
                            data-explanation="Select an ETF fund to trade."
                            data-explanation-why="ETFs offer diversified exposure to cryptocurrency markets without directly holding the underlying assets, often with regulatory oversight and lower volatility."
                        >
                            <div>
                                <h3 class="text-base font-bold text-white" x-text="fund.name"></h3>
                                <p class="text-gray-400 text-sm" x-text="fund.description"></p>
                            </div>
                            <div class="text-right">
                                <p class="text-base font-bold text-white">
                                    $<span x-text="formatNumber(fund.price)"></span>
                                </p>
                                <p
                                    class="text-xs"
                                    :class="fund.change >= 0 ? 'text-green-500' : 'text-red-500'"
                                >
                                    <span x-text="fund.change >= 0 ? '+' : ''"></span><span x-text="formatNumber(fund.change)"></span>%
                                </p>
                            </div>
                        </button>
                    </template>
                </div>

                <label class="text-gray-400 text-sm mt-4 mb-2 block">Order amount in USDT</label>
                <div class="bg-[#2d2d3a] rounded-2xl h-14 px-4 flex items-center justify-between mb-3">
                    <input
                        type="number"
                        x-model.number="etfOrderAmount"
                        placeholder="ETF order amount"
                        class="bg-transparent outline-none text-base placeholder:text-gray-500 w-full"
                    >
                    <span class="text-white font-semibold">USDT</span>
                </div>

                <div class="bg-[#2d2d3a] rounded-2xl p-3 mb-4">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-400">Selected</span>
                        <span class="text-white font-semibold" x-text="selectedEtfFund().name"></span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-400">Estimated units</span>
                        <span class="text-white font-semibold" x-text="formatAsset(etfUnitsForAmount())"></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">ETF cash</span>
                        <span class="text-white font-semibold"><span x-text="formatNumber(etfCashBalance)"></span> USDT</span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <button
                        @click="buyEtf()"
                        class="w-full h-12 bg-[#2fc48d] rounded-2xl text-base font-bold text-white transition active:scale-[0.98]"
                        data-explanation-title="Buy ETF"
                        data-explanation="Purchase ETF units with your ETF cash balance."
                        data-explanation-why="Buying ETF units adds to your portfolio and gives you exposure to the underlying cryptocurrency basket without directly managing individual assets."
                    >
                        Buy ETF
                    </button>
                    <button
                        @click="sellEtf()"
                        class="w-full h-12 bg-[#ef4444] rounded-2xl text-base font-bold text-white transition active:scale-[0.98]"
                        data-explanation-title="Sell ETF"
                        data-explanation="Sell your ETF units and receive USDT back."
                        data-explanation-why="Selling ETF units liquidates your position, returning the current value to your ETF cash balance minus any losses or plus any gains."
                    >
                        Sell ETF
                    </button>
                </div>
            </div>
        </div>

        {{-- alpha trading content --}}
        <div x-show="activeTab === 'alpha'" class="px-5 pt-6">
            <div class="bg-[#1a1b24] rounded-3xl p-6">
                <h2 class="text-xl font-bold mb-4">Alpha Trading</h2>
                
                {{-- advanced tools --}}
                <div class="grid grid-cols-2 gap-3 mb-4">
                    <template x-for="(strategy, type) in alphaStrategyTypes" :key="type">
                        <button
                            @click="selectAlphaStrategy(type)"
                            :class="selectedAlphaStrategy === type ? 'border-purple-500 bg-purple-500/10' : 'border-transparent bg-[#2d2d3a]'"
                            class="rounded-2xl p-3 text-center border transition"
                            data-explanation-title="Alpha Strategy Selection"
                            data-explanation="Select an advanced trading strategy to automate your trading."
                            data-explanation-why="Alpha strategies use sophisticated algorithms and AI to identify trading opportunities, potentially generating higher returns but with varying risk levels."
                        >
                            <h3 class="text-sm font-bold text-white" x-text="strategy.name"></h3>
                            <p class="text-gray-400 text-sm" x-text="strategy.description"></p>
                            <p
                                class="text-xs mt-2"
                                :class="strategy.risk === 'High' ? 'text-red-400' : 'text-green-400'"
                                x-text="`${strategy.risk} risk`"
                            ></p>
                        </button>
                    </template>

                    <div class="hidden">
                    <div class="bg-[#2d2d3a] rounded-2xl p-3 text-center">
                        <div class="text-2xl mb-1">📊</div>
                        <h3 class="text-sm font-bold text-white">Advanced Charts</h3>
                        <p class="text-gray-400 text-sm">Technical Analysis</p>
                    </div>
                    <div class="bg-[#2d2d3a] rounded-2xl p-3 text-center">
                        <div class="text-2xl mb-1">🤖</div>
                        <h3 class="text-sm font-bold text-white">AI Signals</h3>
                        <p class="text-gray-400 text-sm">Smart Trading</p>
                    </div>
                    <div class="bg-[#2d2d3a] rounded-2xl p-3 text-center">
                        <div class="text-2xl mb-1">⚡</div>
                        <h3 class="text-sm font-bold text-white">Flash Trades</h3>
                        <p class="text-gray-400 text-sm">Instant Execution</p>
                    </div>
                    <div class="bg-[#2d2d3a] rounded-2xl p-3 text-center">
                        <div class="text-2xl mb-1">🔮</div>
                        <h3 class="text-sm font-bold text-white">Predictions</h3>
                        <p class="text-gray-400 text-sm">Market Forecast</p>
                    </div>
                    </div>
                </div>

                <label class="text-gray-400 text-sm mb-2 block">Allocation in USDT</label>
                <div class="bg-[#2d2d3a] rounded-2xl h-14 px-4 flex items-center justify-between mb-4">
                    <input
                        type="number"
                        x-model.number="alphaAllocation"
                        placeholder="Strategy allocation"
                        class="bg-transparent outline-none text-base placeholder:text-gray-500 w-full"
                    >
                    <span class="text-white font-semibold">USDT</span>
                </div>

                <div class="bg-[#2d2d3a] rounded-2xl p-3 mb-4">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-400">Selected Strategy</span>
                        <span class="text-white font-semibold" x-text="selectedAlphaStrategyType().name"></span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-400">Available Alpha Balance</span>
                        <span class="text-white font-semibold"><span x-text="formatNumber(alphaBalance)"></span> USDT</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Simulated Risk</span>
                        <span class="text-white font-semibold" x-text="selectedAlphaStrategyType().risk"></span>
                    </div>
                </div>

                <button
                    @click="startAlphaStrategy()"
                    class="w-full h-12 bg-purple-600 rounded-2xl text-base font-bold text-white transition active:scale-[0.98]"
                    data-explanation-title="Start Alpha Strategy"
                    data-explanation="Allocate funds to your selected alpha trading strategy."
                    data-explanation-why="Starting an alpha strategy commits your allocation to the automated trading system, which will execute trades based on the strategy's algorithms and risk parameters."
                >
                    Start Alpha Strategy
                </button>
            </div>
        </div>

        {{-- convert content --}}
        <div x-show="activeTab === 'convert'" class="px-5 pt-6">
            <div class="bg-[#1a1b24] rounded-3xl p-6">
                <h2 class="text-xl font-bold mb-4">Convert</h2>

                {{-- from --}}
                <div class="mb-4">
                    <label class="text-gray-400 text-sm mb-2 block">From</label>
                    <div class="bg-[#2d2d3a] rounded-2xl p-3 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center text-base" x-text="convertFromAsset === 'BTC' ? '₿' : convertFromAsset === 'ETH' ? 'Ξ' : convertFromAsset === 'SOL' ? '◎' : convertFromAsset === 'BNB' ? '◆' : '$'"></div>
                            <span class="text-base font-semibold text-white" x-text="convertFromAsset"></span>
                        </div>
                        <input
                            type="number"
                            x-model.number="convertFromAmount"
                            @input="syncConvertFromAmount()"
                            placeholder="0.00"
                            class="bg-transparent text-right text-base font-bold text-white outline-none w-24"
                        >
                    </div>
                </div>

                {{-- swap icon --}}
                <div class="flex justify-center my-4">
                    <button
                        @click="swapConvertAssets()"
                        class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-lg hover:bg-blue-700 transition"
                        data-explanation-title="Swap Assets"
                        data-explanation="Swap the from and to assets for conversion."
                        data-explanation-why="Swapping allows you to quickly reverse the conversion direction, making it easy to convert in either direction without manually changing both fields."
                    >
                        ⇅
                    </button>
                </div>

                {{-- to --}}
                <div class="mb-6">
                    <label class="text-gray-400 text-sm mb-2 block">To</label>
                    <div class="bg-[#2d2d3a] rounded-2xl p-3 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-base" x-text="convertToAsset === 'BTC' ? '₿' : convertToAsset === 'ETH' ? 'Ξ' : convertToAsset === 'SOL' ? '◎' : convertToAsset === 'BNB' ? '◆' : '$'"></div>
                            <span class="text-base font-semibold text-white" x-text="convertToAsset"></span>
                        </div>
                        <input
                            type="number"
                            x-model.number="convertToAmount"
                            @input="syncConvertToAmount()"
                            placeholder="0.00"
                            class="bg-transparent text-right text-base font-bold text-white outline-none w-24"
                        >
                    </div>
                </div>

                {{-- rate info --}}
                <div class="flex justify-between mb-4 text-gray-400 text-sm">
                    <span>Rate</span>
                    <span>1 <span x-text="convertFromAsset"></span> = <span x-text="formatNumber(convertRate())"></span> <span x-text="convertToAsset"></span></span>
                </div>

                <button
                    @click="executeConvert()"
                    class="w-full h-12 bg-green-600 rounded-2xl text-base font-bold text-white hover:bg-green-700 transition"
                    data-explanation-title="Convert Now"
                    data-explanation="Execute the conversion from one cryptocurrency to another."
                    data-explanation-why="Converting allows you to swap between different cryptocurrencies instantly at the current market rate, useful for rebalancing your portfolio or taking advantage of price movements."
                >
                    Convert Now
                </button>
            </div>
        </div>

        {{-- margin bottom section --}}
        <div x-show="activeTab === 'margin'" class="mt-8 border-t border-white/5">

            {{-- tabs --}}
            <div class="flex items-center gap-6 px-4 pt-4 text-base overflow-x-auto whitespace-nowrap">

                <button 
                    @click="activeMarginBottomTab = 'positions'"
                    :class="activeMarginBottomTab === 'positions' ? 'font-semibold text-white' : 'text-gray-400'"
                    data-explanation-title="Positions Tab"
                    data-explanation="View your open margin positions and leverage details."
                    data-explanation-why="The positions tab shows all your active margin trades, including leverage, entry price, and unrealized P&L."
                    class="relative pb-4">
                    Positions (<span x-text="marginPositions.length"></span>)

                    <div x-show="activeMarginBottomTab === 'positions'" class="absolute bottom-0 left-0 w-14 h-1.5 bg-white rounded-full"></div>
                </button>

                <button 
                    @click="activeMarginBottomTab = 'history'"
                    :class="activeMarginBottomTab === 'history' ? 'font-semibold text-white' : 'text-gray-400'"
                    data-explanation-title="Margin History Tab"
                    data-explanation="View your margin trading history and closed positions."
                    data-explanation-why="Margin history provides a record of all your past margin trades, useful for analyzing your leverage trading performance."
                    class="relative pb-4">
                    History
                    <div x-show="activeMarginBottomTab === 'history'" class="absolute bottom-0 left-0 w-14 h-1.5 bg-white rounded-full"></div>
                </button>

                <button 
                    @click="activeMarginBottomTab = 'assets'"
                    :class="activeMarginBottomTab === 'assets' ? 'font-semibold text-white' : 'text-gray-400'"
                    @click="activeEtfBottomTab = 'assets'"
                    :class="activeEtfBottomTab === 'assets' ? 'font-semibold text-white' : 'text-gray-400'"
                    data-explanation-title="Assets Tab"
                    data-explanation="View your margin balance and collateral assets."
                    data-explanation-why="The assets tab shows your available margin balance and collateral used for leverage trading."
                    class="relative pb-4">
                    Assets
                    <div x-show="activeMarginBottomTab === 'assets'" class="absolute bottom-0 left-0 w-14 h-1.5 bg-white rounded-full"></div>
                </button>

                <button 
                    data-explanation-title="Margin Settings"
                    data-explanation="Configure margin settings and risk management."
                    data-explanation-why="Margin settings allow you to manage your leverage preferences, liquidation thresholds, and risk parameters."
                    class="ml-auto text-gray-400">
                    ⚙️
                </button>

            </div>

            {{-- margin positions --}}
            <div x-show="activeMarginBottomTab === 'positions' && marginPositions.length === 0" class="h-[240px] flex flex-col items-center justify-center">

                <div class="w-20 h-20 bg-gray-700/50 rounded-2xl flex items-center justify-center text-3xl">
                    📊
                </div>

                <p class="mt-6 text-2xl font-medium text-gray-300">
                    No open positions
                </p>

            </div>

            <div x-show="activeMarginBottomTab === 'positions' && marginPositions.length > 0" class="px-4 py-4 space-y-3">
                <template x-for="position in marginPositions" :key="position.id">
                    <div class="bg-[#1a1b24] rounded-xl p-4">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span
                                        class="text-xs font-bold uppercase px-2 py-1 rounded"
                                        :class="position.side === 'long' ? 'bg-green-500/15 text-green-400' : 'bg-red-500/15 text-red-400'"
                                        x-text="position.side"
                                    ></span>
                                    <span class="text-white font-semibold" x-text="position.pair"></span>
                                    <span class="text-gray-400 text-sm" x-text="`${position.leverage}x`"></span>
                                </div>
                                <p class="text-gray-400 text-sm mt-2">
                                    Entry <span class="text-white" x-text="formatNumber(position.entryPrice)"></span>
                                    · Mark <span class="text-white" x-text="formatNumber(priceForPair(position.pair))"></span>
                                </p>
                                <p class="text-gray-400 text-sm">
                                    Collateral <span class="text-white" x-text="formatNumber(position.collateral)"></span> USDT
                                </p>
                            </div>
                            <div class="text-right">
                                <p
                                    class="font-semibold"
                                    :class="marginPnl(position) >= 0 ? 'text-green-400' : 'text-red-400'"
                                >
                                    <span x-text="marginPnl(position) >= 0 ? '+' : ''"></span><span x-text="formatNumber(marginPnl(position))"></span> USDT
                                </p>
                                <p
                                    class="text-sm"
                                    :class="marginRoi(position) >= 0 ? 'text-green-400' : 'text-red-400'"
                                >
                                    <span x-text="marginRoi(position) >= 0 ? '+' : ''"></span><span x-text="formatNumber(marginRoi(position))"></span>%
                                </p>
                                <button
                                    @click="closeMarginPosition(position.id)"
                                    class="mt-3 px-3 py-1.5 rounded-lg border border-blue-500/40 text-blue-400 text-sm font-semibold hover:bg-blue-500/10 transition"
                                    data-explanation-title="Close Position"
                                    data-explanation="Close your margin position and realize your profit or loss."
                                    data-explanation-why="Closing a position ends your margin trade, returning your collateral plus any profit or minus any loss. This is how you exit a leveraged trade."
                                >
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            {{-- margin history --}}
            <div x-show="activeMarginBottomTab === 'history' && marginHistory.length === 0" class="h-[240px] flex flex-col items-center justify-center">
                <div class="w-20 h-20 bg-gray-700/50 rounded-2xl flex items-center justify-center text-3xl">
                    ðŸ“Š
                </div>

                <p class="mt-6 text-2xl font-medium text-gray-300">
                    No margin history
                </p>
            </div>

            <div x-show="activeMarginBottomTab === 'history' && marginHistory.length > 0" class="px-4 py-4 space-y-3">
                <template x-for="position in marginHistory" :key="`${position.id}-${position.closedAt}`">
                    <div class="bg-[#1a1b24] rounded-xl p-4">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span
                                        class="text-xs font-bold uppercase px-2 py-1 rounded"
                                        :class="position.side === 'long' ? 'bg-green-500/15 text-green-400' : 'bg-red-500/15 text-red-400'"
                                        x-text="position.side"
                                    ></span>
                                    <span class="text-white font-semibold" x-text="position.pair"></span>
                                    <span class="text-gray-400 text-sm" x-text="position.status"></span>
                                </div>
                                <p class="text-gray-400 text-sm mt-2">
                                    Entry <span class="text-white" x-text="formatNumber(position.entryPrice)"></span>
                                    · Exit <span class="text-white" x-text="formatNumber(position.exitPrice)"></span>
                                </p>
                            </div>
                            <div class="text-right">
                                <p
                                    class="font-semibold"
                                    :class="position.pnl >= 0 ? 'text-green-400' : 'text-red-400'"
                                >
                                    <span x-text="position.pnl >= 0 ? '+' : ''"></span><span x-text="formatNumber(position.pnl)"></span> USDT
                                </p>
                                <p class="text-gray-400 text-sm">
                                    Returned <span x-text="formatNumber(position.returnedCollateral)"></span> USDT
                                </p>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            {{-- margin assets --}}
            <div x-show="activeMarginBottomTab === 'assets'" class="px-4 py-4 space-y-3">
                <div class="bg-[#1a1b24] rounded-xl p-4 flex items-center justify-between">
                    <div>
                        <p class="text-white font-semibold">Available Margin</p>
                        <p class="text-gray-400 text-sm">Free simulated collateral</p>
                    </div>
                    <p class="text-white font-semibold">
                        <span x-text="formatNumber(marginBalance)"></span> USDT
                    </p>
                </div>

                <div class="bg-[#1a1b24] rounded-xl p-4 flex items-center justify-between">
                    <div>
                        <p class="text-white font-semibold">Locked Collateral</p>
                        <p class="text-gray-400 text-sm">Open margin positions</p>
                    </div>
                    <p class="text-white font-semibold">
                        <span x-text="formatNumber(marginPositions.reduce((total, position) => total + position.collateral, 0))"></span> USDT
                    </p>
                </div>
            </div>

        </div>

        {{-- etf bottom section --}}
        <div x-show="activeTab === 'etf'" class="mt-8 border-t border-white/5">

            {{-- tabs --}}
            <div class="flex items-center gap-6 px-4 pt-4 text-base overflow-x-auto whitespace-nowrap">

                <button 
                    @click="activeEtfBottomTab = 'holdings'"
                    :class="activeEtfBottomTab === 'holdings' ? 'font-semibold text-white' : 'text-gray-400'"
                    data-explanation-title="Holdings Tab"
                    data-explanation="View your ETF holdings and portfolio allocation."
                    data-explanation-why="The holdings tab shows all your ETF positions, their current value, and performance over time."
                    class="relative pb-4">
                    Holdings (<span x-text="etfHoldingRows().length"></span>)

                    <div x-show="activeEtfBottomTab === 'holdings'" class="absolute bottom-0 left-0 w-14 h-1.5 bg-white rounded-full"></div>
                </button>

                <button 
                    @click="activeEtfBottomTab = 'history'"
                    :class="activeEtfBottomTab === 'history' ? 'font-semibold text-white' : 'text-gray-400'"
                    data-explanation-title="ETF History Tab"
                    data-explanation="View your ETF trading history and transactions."
                    data-explanation-why="ETF history provides a complete record of all your ETF purchases and sales for tracking and analysis."
                    class="relative pb-4">
                    History
                    <div x-show="activeEtfBottomTab === 'history'" class="absolute bottom-0 left-0 w-14 h-1.5 bg-white rounded-full"></div>
                </button>

                <button 
                    data-explanation-title="Assets Tab"
                    data-explanation="View your total portfolio including ETF holdings."
                    data-explanation-why="The assets tab displays your complete portfolio including both direct crypto holdings and ETF positions."
                    class="relative pb-4">
                    Assets
                    <div x-show="activeEtfBottomTab === 'assets'" class="absolute bottom-0 left-0 w-14 h-1.5 bg-white rounded-full"></div>
                </button>

                <button 
                    @click="activeEtfBottomTab = 'details'"
                    :class="activeEtfBottomTab === 'details' ? 'font-semibold text-white' : 'text-gray-400'"
                    data-explanation-title="ETF Details"
                    data-explanation="View detailed information about available ETFs."
                    data-explanation-why="ETF details provide comprehensive information about each fund including holdings, expense ratio, and performance metrics."
                    class="relative pb-4 ml-auto">
                    ℹ️
                    <div x-show="activeEtfBottomTab === 'details'" class="absolute bottom-0 left-0 w-8 h-1.5 bg-white rounded-full"></div>
                </button>

            </div>

            {{-- holdings --}}
            <div x-show="activeEtfBottomTab === 'holdings' && etfHoldingRows().length === 0" class="h-[240px] flex flex-col items-center justify-center">

                <div class="w-20 h-20 bg-gray-700/50 rounded-2xl flex items-center justify-center text-3xl">
                    📈
                </div>

                <p class="mt-6 text-2xl font-medium text-gray-300">
                    No ETF holdings
                </p>

            </div>

            <div x-show="activeEtfBottomTab === 'holdings' && etfHoldingRows().length > 0" class="px-4 py-4 space-y-3">
                <template x-for="holding in etfHoldingRows()" :key="holding.symbol">
                    <div class="bg-[#1a1b24] rounded-xl p-4">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-white font-semibold" x-text="holding.name"></p>
                                <p class="text-gray-400 text-sm">
                                    <span x-text="formatAsset(holding.units)"></span> units · $<span x-text="formatNumber(holding.price)"></span>
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-white font-semibold">
                                    $<span x-text="formatNumber(holding.value)"></span>
                                </p>
                                <p class="text-sm" :class="holding.pnl >= 0 ? 'text-green-400' : 'text-red-400'">
                                    <span x-text="holding.pnl >= 0 ? '+' : ''"></span><span x-text="formatNumber(holding.pnl)"></span> USDT
                                </p>
                                <button
                                    @click="closeEtfHolding(holding.symbol)"
                                    class="mt-3 px-3 py-1.5 rounded-lg border border-blue-500/40 text-blue-400 text-sm font-semibold hover:bg-blue-500/10 transition"
                                    data-explanation-title="Close ETF Holding"
                                    data-explanation="Close your entire ETF position and realize profit or loss."
                                    data-explanation-why="Closing an ETF holding liquidates your entire position in that fund, returning the current value to your ETF cash balance and recording the profit or loss."
                                >
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            {{-- history --}}
            <div x-show="activeEtfBottomTab === 'history' && etfHistory.length === 0" class="h-[240px] flex flex-col items-center justify-center">
                <div class="w-20 h-20 bg-gray-700/50 rounded-2xl flex items-center justify-center text-3xl">
                    ðŸ“ˆ
                </div>

                <p class="mt-6 text-2xl font-medium text-gray-300">
                    No ETF history
                </p>
            </div>

            <div x-show="activeEtfBottomTab === 'history' && etfHistory.length > 0" class="px-4 py-4 space-y-3">
                <template x-for="trade in etfHistory" :key="trade.id">
                    <div class="bg-[#1a1b24] rounded-xl p-4 flex items-center justify-between gap-4">
                        <div>
                            <div class="flex items-center gap-2">
                                <span
                                    class="text-xs font-bold uppercase px-2 py-1 rounded"
                                    :class="trade.side === 'Buy' ? 'bg-green-500/15 text-green-400' : 'bg-red-500/15 text-red-400'"
                                    x-text="trade.side"
                                ></span>
                                <span class="text-white font-semibold" x-text="trade.name"></span>
                            </div>
                            <p class="text-gray-400 text-sm mt-2">
                                <span x-text="formatAsset(trade.units)"></span> units at $<span x-text="formatNumber(trade.price)"></span>
                            </p>
                        </div>
                        <p class="text-white font-semibold">
                            $<span x-text="formatNumber(trade.amount)"></span>
                        </p>
                    </div>
                </template>
            </div>

            {{-- assets --}}
            <div x-show="activeEtfBottomTab === 'assets'" class="px-4 py-4 space-y-3">
                <div class="bg-[#1a1b24] rounded-xl p-4 flex items-center justify-between">
                    <div>
                        <p class="text-white font-semibold">ETF Cash</p>
                        <p class="text-gray-400 text-sm">Available for ETF demo trades</p>
                    </div>
                    <p class="text-white font-semibold">
                        <span x-text="formatNumber(etfCashBalance)"></span> USDT
                    </p>
                </div>

                <div class="bg-[#1a1b24] rounded-xl p-4 flex items-center justify-between">
                    <div>
                        <p class="text-white font-semibold">ETF Holdings Value</p>
                        <p class="text-gray-400 text-sm">Current simulated market value</p>
                    </div>
                    <p class="text-white font-semibold">
                        <span x-text="formatNumber(etfHoldingRows().reduce((total, holding) => total + holding.value, 0))"></span> USDT
                    </p>
                </div>
            </div>

            {{-- details --}}
            <div x-show="activeEtfBottomTab === 'details'" class="px-4 py-4 space-y-3">
                <template x-for="(fund, symbol) in etfFunds" :key="symbol">
                    <div class="bg-[#1a1b24] rounded-xl p-4">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-white font-semibold" x-text="fund.name"></p>
                                <p class="text-gray-400 text-sm" x-text="fund.description"></p>
                            </div>
                            <div class="text-right">
                                <p class="text-white font-semibold">$<span x-text="formatNumber(fund.price)"></span></p>
                                <p class="text-sm" :class="fund.change >= 0 ? 'text-green-400' : 'text-red-400'">
                                    <span x-text="fund.change >= 0 ? '+' : ''"></span><span x-text="formatNumber(fund.change)"></span>%
                                </p>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

        </div>

        {{-- alpha bottom section --}}
        <div x-show="activeTab === 'alpha'" class="mt-8 border-t border-white/5">

            {{-- tabs --}}
            <div class="flex items-center gap-6 px-4 pt-4 text-base overflow-x-auto whitespace-nowrap">

                <button 
                    @click="activeAlphaBottomTab = 'strategies'"
                    :class="activeAlphaBottomTab === 'strategies' ? 'font-semibold text-white' : 'text-gray-400'"
                    data-explanation-title="Strategies Tab"
                    data-explanation="View your active trading strategies and automated bots."
                    data-explanation-why="The strategies tab shows all your active Alpha trading strategies, their performance, and configuration."
                    class="relative pb-4">
                    Strategies (<span x-text="alphaStrategies.length"></span>)

                    <div x-show="activeAlphaBottomTab === 'strategies'" class="absolute bottom-0 left-0 w-14 h-1.5 bg-white rounded-full"></div>
                </button>

                <button 
                    @click="activeAlphaBottomTab = 'performance'"
                    :class="activeAlphaBottomTab === 'performance' ? 'font-semibold text-white' : 'text-gray-400'"
                    data-explanation-title="Performance Tab"
                    data-explanation="View performance metrics and analytics for your Alpha strategies."
                    data-explanation-why="Performance metrics provide detailed analytics on your strategy returns, win rate, and risk-adjusted performance."
                    class="relative pb-4">
                    Performance
                    <div x-show="activeAlphaBottomTab === 'performance'" class="absolute bottom-0 left-0 w-14 h-1.5 bg-white rounded-full"></div>
                </button>

                <button 
                    @click="activeAlphaBottomTab = 'assets'"
                    :class="activeAlphaBottomTab === 'assets' ? 'font-semibold text-white' : 'text-gray-400'"
                    data-explanation-title="Assets Tab"
                    data-explanation="View assets managed by Alpha strategies."
                    data-explanation-why="The assets tab shows the portfolio value and allocation of assets under Alpha strategy management."
                    class="relative pb-4">
                    Assets
                    <div x-show="activeAlphaBottomTab === 'assets'" class="absolute bottom-0 left-0 w-14 h-1.5 bg-white rounded-full"></div>
                </button>

                <button 
                    @click="activeAlphaBottomTab = 'settings'"
                    :class="activeAlphaBottomTab === 'settings' ? 'font-semibold text-white' : 'text-gray-400'"
                    data-explanation-title="Strategy Settings"
                    data-explanation="Configure and manage your Alpha trading strategies."
                    data-explanation-why="Strategy settings allow you to customize parameters, risk limits, and execution rules for your automated trading."
                    class="relative pb-4 ml-auto">
                    ⚙️
                    <div x-show="activeAlphaBottomTab === 'settings'" class="absolute bottom-0 left-0 w-8 h-1.5 bg-white rounded-full"></div>
                </button>

            </div>

            {{-- alpha strategies --}}
            <div x-show="activeAlphaBottomTab === 'strategies' && alphaStrategies.length === 0" class="h-[240px] flex flex-col items-center justify-center">

                <div class="w-20 h-20 bg-gray-700/50 rounded-2xl flex items-center justify-center text-3xl">
                    🤖
                </div>

                <p class="mt-6 text-2xl font-medium text-gray-300">
                    No active strategies
                </p>

            </div>

            <div x-show="activeAlphaBottomTab === 'strategies' && alphaStrategies.length > 0" class="px-4 py-4 space-y-3">
                <template x-for="strategy in alphaStrategies" :key="strategy.id">
                    <div class="bg-[#1a1b24] rounded-xl p-4">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span class="text-white font-semibold" x-text="strategy.name"></span>
                                    <span class="text-xs px-2 py-1 rounded bg-purple-500/15 text-purple-300" x-text="strategy.status"></span>
                                </div>
                                <p class="text-gray-400 text-sm mt-2">
                                    Allocation <span class="text-white" x-text="formatNumber(strategy.allocation)"></span> USDT ·
                                    Risk <span class="text-white" x-text="strategy.risk"></span>
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-white font-semibold">
                                    <span x-text="formatNumber(strategy.value)"></span> USDT
                                </p>
                                <p class="text-sm" :class="strategy.value - strategy.allocation >= 0 ? 'text-green-400' : 'text-red-400'">
                                    <span x-text="strategy.value - strategy.allocation >= 0 ? '+' : ''"></span><span x-text="formatNumber(strategy.value - strategy.allocation)"></span>
                                </p>
                                <div class="mt-3 flex gap-2 justify-end">
                                    <button
                                        @click="pauseAlphaStrategy(strategy.id)"
                                        class="px-3 py-1.5 rounded-lg border border-purple-500/40 text-purple-300 text-sm font-semibold hover:bg-purple-500/10 transition"
                                        x-text="strategy.status === 'Running' ? 'Pause' : 'Resume'"
                                    ></button>
                                    <button
                                        @click="stopAlphaStrategy(strategy.id)"
                                        class="px-3 py-1.5 rounded-lg border border-red-500/40 text-red-400 text-sm font-semibold hover:bg-red-500/10 transition"
                                    >
                                        Stop
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            {{-- alpha performance --}}
            <div x-show="activeAlphaBottomTab === 'performance'" class="px-4 py-4 space-y-3">
                <div class="bg-[#1a1b24] rounded-xl p-4 flex items-center justify-between">
                    <div>
                        <p class="text-white font-semibold">Total Alpha P&L</p>
                        <p class="text-gray-400 text-sm">Running strategies only</p>
                    </div>
                    <p class="font-semibold" :class="alphaTotalPnl() >= 0 ? 'text-green-400' : 'text-red-400'">
                        <span x-text="alphaTotalPnl() >= 0 ? '+' : ''"></span><span x-text="formatNumber(alphaTotalPnl())"></span> USDT
                    </p>
                </div>

                <template x-for="strategy in alphaHistory" :key="`${strategy.id}-${strategy.stoppedAt}`">
                    <div class="bg-[#1a1b24] rounded-xl p-4 flex items-center justify-between">
                        <div>
                            <p class="text-white font-semibold" x-text="strategy.name"></p>
                            <p class="text-gray-400 text-sm" x-text="strategy.status"></p>
                        </div>
                        <p class="font-semibold" :class="strategy.pnl >= 0 ? 'text-green-400' : 'text-red-400'">
                            <span x-text="strategy.pnl >= 0 ? '+' : ''"></span><span x-text="formatNumber(strategy.pnl)"></span> USDT
                        </p>
                    </div>
                </template>
            </div>

            {{-- alpha assets --}}
            <div x-show="activeAlphaBottomTab === 'assets'" class="px-4 py-4 space-y-3">
                <div class="bg-[#1a1b24] rounded-xl p-4 flex items-center justify-between">
                    <div>
                        <p class="text-white font-semibold">Available Alpha Balance</p>
                        <p class="text-gray-400 text-sm">Free simulated strategy cash</p>
                    </div>
                    <p class="text-white font-semibold"><span x-text="formatNumber(alphaBalance)"></span> USDT</p>
                </div>

                <div class="bg-[#1a1b24] rounded-xl p-4 flex items-center justify-between">
                    <div>
                        <p class="text-white font-semibold">Total Alpha Value</p>
                        <p class="text-gray-400 text-sm">Cash plus running strategies</p>
                    </div>
                    <p class="text-white font-semibold"><span x-text="formatNumber(alphaTotalValue())"></span> USDT</p>
                </div>
            </div>

            {{-- alpha settings --}}
            <div x-show="activeAlphaBottomTab === 'settings'" class="px-4 py-4 space-y-3">
                <template x-for="(strategy, type) in alphaStrategyTypes" :key="type">
                    <div class="bg-[#1a1b24] rounded-xl p-4 flex items-center justify-between">
                        <div>
                            <p class="text-white font-semibold" x-text="strategy.name"></p>
                            <p class="text-gray-400 text-sm" x-text="strategy.description"></p>
                        </div>
                        <div class="text-right">
                            <p class="text-white font-semibold" x-text="strategy.risk"></p>
                            <p class="text-gray-400 text-sm">
                                Drift <span x-text="formatNumber(strategy.expected)"></span>%
                            </p>
                        </div>
                    </div>
                </template>
            </div>

        </div>

        {{-- convert bottom section --}}
        <div x-show="activeTab === 'convert'" class="mt-8 border-t border-white/5">

            {{-- tabs --}}
            <div class="flex items-center gap-6 px-4 pt-4 text-base overflow-x-auto whitespace-nowrap">

                <button
                    @click="activeConvertBottomTab = 'history'"
                    :class="activeConvertBottomTab === 'history' ? 'font-semibold text-white' : 'text-gray-400'"
                    data-explanation-title="History Tab"
                    data-explanation="View your conversion history and transactions."
                    data-explanation-why="The history tab shows all your past crypto-to-crypto conversions with rates and timestamps."
                    class="relative pb-4">
                    History (<span x-text="convertHistory.length"></span>)

                    <div x-show="activeConvertBottomTab === 'history'" class="absolute bottom-0 left-0 w-14 h-1.5 bg-white rounded-full"></div>
                </button>

                <button
                    @click="activeConvertBottomTab = 'assets'"
                    :class="activeConvertBottomTab === 'assets' ? 'font-semibold text-white' : 'text-gray-400'"
                    data-explanation-title="Assets Tab"
                    data-explanation="View your available assets for conversion."
                    data-explanation-why="The assets tab shows all your cryptocurrency balances that can be converted using the convert feature."
                    class="relative pb-4">
                    Assets

                    <div x-show="activeConvertBottomTab === 'assets'" class="absolute bottom-0 left-0 w-14 h-1.5 bg-white rounded-full"></div>
                </button>

                <button
                    data-explanation-title="Convert Settings"
                    data-explanation="Configure convert preferences and slippage tolerance."
                    data-explanation-why="Convert settings allow you to set preferred pairs, slippage tolerance, and other conversion parameters."
                    class="ml-auto text-gray-400">
                    ⚙️
                </button>

            </div>

            {{-- history section --}}
            <div x-show="activeConvertBottomTab === 'history' && convertHistory.length === 0" class="h-[240px] flex flex-col items-center justify-center">

                <div class="w-20 h-20 bg-gray-700/50 rounded-2xl flex items-center justify-center text-3xl">
                    🔄
                </div>

                <p class="mt-6 text-2xl font-medium text-gray-300">
                    No conversion history
                </p>

            </div>

            <div x-show="activeConvertBottomTab === 'history' && convertHistory.length > 0" class="px-4 py-4 space-y-3">
                <template x-for="trade in convertHistory" :key="trade.id">
                    <div class="bg-[#1a1b24] rounded-xl p-4">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span class="text-xs font-bold uppercase px-2 py-1 rounded bg-blue-500/15 text-blue-400">Convert</span>
                                    <span class="text-white font-semibold"><span x-text="trade.fromAsset"></span> → <span x-text="trade.toAsset"></span></span>
                                </div>
                                <p class="text-gray-400 text-sm mt-2">
                                    Rate: 1 <span x-text="trade.fromAsset"></span> = <span x-text="formatNumber(trade.rate)"></span> <span x-text="trade.toAsset"></span>
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-white font-semibold">
                                    <span x-text="formatAsset(trade.fromAmount)"></span> <span x-text="trade.fromAsset"></span>
                                </p>
                                <p class="text-gray-400 text-sm">
                                    → <span x-text="formatAsset(trade.toAmount)"></span> <span x-text="trade.toAsset"></span>
                                </p>
                                <p class="text-gray-500 text-xs mt-2" x-text="new Date(trade.convertedAt).toLocaleString()"></p>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            {{-- assets section --}}
            <div x-show="activeConvertBottomTab === 'assets'" class="px-4 py-4 space-y-3">
                <template x-for="asset in portfolioRows()" :key="asset.symbol">
                    <div class="bg-[#1a1b24] rounded-xl p-4 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center text-lg" :class="asset.color" x-text="asset.symbol.charAt(0)"></div>
                            <div>
                                <p class="text-white font-semibold" x-text="asset.name"></p>
                                <p class="text-gray-400 text-sm" x-text="asset.symbol"></p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-white font-semibold">
                                <span x-text="formatAsset(asset.amount)"></span>
                                <span x-text="asset.symbol"></span>
                            </p>
                            <p class="text-gray-400 text-sm">
                                $<span x-text="formatNumber(asset.value)"></span>
                            </p>
                        </div>
                    </div>
                </template>
            </div>

        </div>

        {{-- bottom navigation --}}
        <div class="bg-[#101116] border-t border-white/5 h-28 flex items-center justify-around mt-8">

            <button 
                data-explanation-title="Home"
                data-explanation="Navigate to the home screen and dashboard."
                data-explanation-why="The home screen provides an overview of your portfolio, market trends, and quick access to key features."
                class="flex flex-col items-center text-gray-500">
                <span class="text-3xl">◔</span>
                <span class="text-lg mt-1">Home</span>
            </button>

            <button 
                data-explanation-title="Futures"
                data-explanation="Access futures trading with leverage and derivatives."
                data-explanation-why="Futures trading allows you to trade contracts with expiration dates, offering leverage for potentially higher returns (and risks)."
                class="flex flex-col items-center text-gray-500">
                <span class="text-3xl">▣</span>
                <span class="text-lg mt-1">Futures</span>
            </button>

            <button 
                data-explanation-title="Trade"
                data-explanation="Quick access to spot trading interface."
                data-explanation-why="The trade button is the main navigation to the spot trading screen where you can buy and sell cryptocurrencies."
                class="flex flex-col items-center">

                <div class="w-20 h-20 rounded-full bg-blue-600 flex items-center justify-center text-4xl -mt-10 shadow-2xl">
                    ⇅
                </div>

                <span class="text-lg mt-1 text-white">
                    Trade
                </span>

            </button>

            <button 
                data-explanation-title="Earn"
                data-explanation="Access earning products like staking, savings, and yield farming."
                data-explanation-why="Earn products allow you to generate passive income on your crypto holdings through staking, lending, or providing liquidity."
                class="flex flex-col items-center text-gray-500">
                <span class="text-3xl">⌂</span>
                <span class="text-lg mt-1">Earn</span>
            </button>

            <button 
                data-explanation-title="Assets"
                data-explanation="View and manage your cryptocurrency assets and portfolio."
                data-explanation-why="The assets section shows all your holdings, allows deposits/withdrawals, and provides portfolio management tools."
                class="flex flex-col items-center text-gray-500">
                <span class="text-3xl">▤</span>
                <span class="text-lg mt-1">Assets</span>
            </button>

        </div>

    </div>

    <script>
        let tradeAppInstance = null;

        function openOrderTypeModal() {
            if (tradeAppInstance) {
                tradeAppInstance.orderTypeModal = true;
            }
            const modal = document.getElementById('order-type-modal');
            if (modal) {
                modal.classList.remove('hidden');
            }
        }

        function closeOrderTypeModal() {
            const modal = document.getElementById('order-type-modal');
            if (modal) {
                modal.classList.add('hidden');
            }
        }

        function selectOrderType(type) {
            // Update Alpine.js state if it exists
            if (tradeAppInstance) {
                tradeAppInstance.selectedOrderType = type;
                tradeAppInstance.orderTypeModal = false;
            }
            
            // Update button text
            const buttonText = document.getElementById('order-type-text');
            if (buttonText) {
                buttonText.textContent = type;
            }
            
            // Update checkmarks
            const orderTypes = ['Limit', 'Market', 'Conditional', 'Advanced Limit', 'TWAP', 'TP/SL', 'Trailing Stop'];
            orderTypes.forEach(orderType => {
                const checkEl = document.getElementById(`check-${orderType}`);
                if (checkEl) {
                    if (orderType === type) {
                        checkEl.classList.remove('hidden');
                    } else {
                        checkEl.classList.add('hidden');
                    }
                }
            });
            
            // Close modal
            closeOrderTypeModal();
        }
    </script>

    </div>
    </section>

    <!-- Order Type Modal -->
    <div id="order-type-modal" 
         class="fixed inset-0 bg-black/80 z-[9999] flex items-center justify-center hidden">
        
        <div class="bg-[#1a1b24] rounded-2xl w-full max-w-md mx-4 overflow-hidden">
            
            <!-- Header -->
            <div class="flex items-center justify-between px-4 py-3 border-b border-white/10">
                <button onclick="closeOrderTypeModal()" class="text-gray-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <div class="flex items-center gap-4 text-sm">
                    <button class="text-white font-semibold">Spot</button>
                    <button class="text-gray-500">Margin</button>
                    <button class="text-gray-500">ETF</button>
                    <button class="text-gray-500">Alpha</button>
                    <button class="text-gray-500">Convert</button>
                </div>
                <div class="w-6"></div>
            </div>

            <!-- Content -->
            <div class="p-4">
                <h2 class="text-lg font-bold text-white mb-2">Order Type</h2>

                <!-- Basic Orders -->
                <div class="mb-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-gray-400 text-sm font-medium">Basic</span>
                        <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <!-- Limit -->
                    <button onclick="selectOrderType('Limit')" 
                            class="w-full flex items-center justify-between p-3 rounded-lg hover:bg-white/5 transition mb-2">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="text-white font-medium">Limit</p>
                                <p class="text-gray-500 text-xs">Buy or sell at a given price or better.</p>
                            </div>
                        </div>
                        <div id="check-Limit" class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center hidden">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </button>

                    <!-- Market -->
                    <button onclick="selectOrderType('Market')" 
                            class="w-full flex items-center justify-between p-3 rounded-lg hover:bg-white/5 transition mb-2">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="text-white font-medium">Market</p>
                                <p class="text-gray-500 text-xs">Quickly buy or sell at the best market price.</p>
                            </div>
                        </div>
                        <div id="check-Market" class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </button>

                    <!-- Conditional -->
                    <button onclick="selectOrderType('Conditional')" 
                            class="w-full flex items-center justify-between p-3 rounded-lg hover:bg-white/5 transition">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="text-white font-medium">Conditional</p>
                                <p class="text-gray-500 text-xs">The system will place an order automatically when the preset price is reached.</p>
                            </div>
                        </div>
                        <div id="check-Conditional" class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center hidden">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </button>
                </div>

                <!-- Advanced Orders -->
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-gray-400 text-sm font-medium">Advanced</span>
                        <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>

                    <!-- Advanced Limit -->
                    <button onclick="selectOrderType('Advanced Limit')" 
                            class="w-full flex items-center justify-between p-3 rounded-lg hover:bg-white/5 transition mb-2">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="text-white font-medium">Advanced Limit</p>
                                <p class="text-gray-500 text-xs">Advanced Limit allows advance limit order types, such as Post Only, IOC and FOK.</p>
                            </div>
                        </div>
                        <div id="check-Advanced Limit" class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center hidden">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </button>

                    <!-- TWAP -->
                    <button onclick="selectOrderType('TWAP')" 
                            class="w-full flex items-center justify-between p-3 rounded-lg hover:bg-white/5 transition mb-2">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="text-white font-medium">TWAP</p>
                                <p class="text-gray-500 text-xs">Split large orders and place orders at regular intervals to reduce slippage.</p>
                            </div>
                        </div>
                        <div id="check-TWAP" class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center hidden">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </button>

                    <!-- TP/SL -->
                    <button onclick="selectOrderType('TP/SL')" 
                            class="w-full flex items-center justify-between p-3 rounded-lg hover:bg-white/5 transition mb-2">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="text-white font-medium">TP/SL</p>
                                <p class="text-gray-500 text-xs">When order of either side is triggered, the other side will be auto canceled.</p>
                            </div>
                        </div>
                        <div id="check-TP/SL" class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center hidden">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </button>

                    <!-- Trailing Stop -->
                    <button onclick="selectOrderType('Trailing Stop')" 
                            class="w-full flex items-center justify-between p-3 rounded-lg hover:bg-white/5 transition">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" stroke-width="2"/>
                                    <circle cx="12" cy="12" r="3" stroke-width="2"/>
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="text-white font-medium">Trailing Stop</p>
                                <p class="text-gray-500 text-xs">Track the market price, and once the preset value is reached, a market order will be automatically placed.</p>
                            </div>
                        </div>
                        <div id="check-Trailing Stop" class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center hidden">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div id="lightbox-modal" class="lightbox-overlay hidden">
        <div class="lightbox-content">
            <button class="lightbox-close" onclick="closeLightbox();">&times;</button>
            <h2 id="lightbox-title" class="lightbox-title"></h2>
            <div id="lightbox-description" class="lightbox-description"></div>
            <div id="lightbox-sections"></div>
        </div>
    </div>

        <div class="container mx-auto px-4 py-8 bg-gray-200 text-gray-800 px-5 py-5">
            
             <div>

                <p>
                    Trading on cryptocurrency exchanges is quite straightforward once you understand the interface. The key elements are the order book showing buy/sell orders, price charts, and the trading panel where you place orders.                  
                </p>

                <br> <br>

                    <p>
                        This demo exposure is important to give you a view of the basic features of a trading interface, so that the UI does not feel intimidating. You can practice trading on testnets or paper trading platforms before using real funds. Always start with small amounts and never invest more than you can afford to lose.
                    </p>
                    <br>

                    <p>
                        This demo is basically the same steps for other cryptocurrency exchanges like Binance, Coinbase, Kraken, Bybit, OKX, e.t.c. While the UI may differ slightly, the core concepts of buying, selling, and managing orders remain consistent across platforms.
                    </p>
            </div>
        </div>

    {{-- External JS (place ordersdemo.js in your public/js folder) --}}
    {{-- <script src="{{ asset('js/demo/ordersdemo.js') }}"></script> --}}
    @vite('resources/js/demo/ordersdemo.js')

</x-app-layout>
