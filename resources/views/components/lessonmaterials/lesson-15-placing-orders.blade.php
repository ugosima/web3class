<section >
            <h2>What is an Order?</h2>
            <p>An order is an instruction you give to an exchange to buy or sell an asset at a specific price and quantity. All trades on centralized exchanges (CEXs) begin with placing an order, which goes into an order book where buyers and sellers are matched.</p>
        </section>
<br>
        <section>
            <h2>Types of Orders</h2>

            <div class="p-3 rounded-lg shadow mb-2">
                <b>1. Market Order</b>
                <p class="pl-3">This order executes immediately at the best available price. It is very useful for quick trades, but it may experience price slippage.</p>
            </div>

            <div class=" p-3 rounded-lg shadow mb-2">
                <b>2. Limit Order</b>
                <p class="pl-3">This order lets you set the price and quantity at which you want to buy or sell. The order remains on the book until your set price is reached and your order is matched.</p>
            </div>

            <div class=" p-3 rounded-lg shadow mb-2">
                <b>3. Stop Order (Stop-Loss)</b>
                <p class="pl-3">This order triggers a market order when the asset reaches a specific price. It is widely used to reduce losses or enter trends.</p>
            </div>

            <div class="p-3 rounded-lg shadow">
                <h3 class="text-lg font-semibold ">4. Stop-Limit Order</h3>
                <p class="pl-3">Triggers a limit order instead of a market order once the stop price is hit. Offers more control but might not be filled.</p>
            </div>
        </section>
<br>


        <section class="mb-6">
            <h2 class=" mb-2">Order duration</h2>
            <p class="pl-3">Order duration is simply the lifetime of an order, or the timed condition that determines whether an order will be executed, cancelled, or expired. They are classified as:</p>

            <ol class="list-[lower-roman] list-inside pl-4">
                <li><b>GTC (Good Till Cancelled):</b> Stays active until filled or manually canceled.</li>
                <li><b>IOC (Immediate or Cancel):</b> Fills what it can instantly, and cancels the rest.</li>
                <li><b>FOK (Fill or Kill):</b> Must fill the entire order immediately or cancel it all.</li>
            </ol>
            <br>
            <p class="pl-3">
              <b class="text-red-100">NOTE </b> : Orders are automatically set to GTC by default, meaning they will remain open until filled or canceled. You can change this setting in your exchange account preferences.
            </p>
        </section>
        <br><br>

        <section class="mb-6">
              <section >
            <h2>Order books</h2>
            <p>The order book is a live record of all open buy and sell orders. Buy orders are called <em>bids</em>, while sell orders are called <em>asks</em>. The exchange's matching engine finds matching pairs and executes trades automatically.</p>
        </section>
<br>

            <b>Sample order book</b>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left border border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-3 py-2">Buy Orders (Bids)</th>
                            <th></th>
                            <th class="px-3 py-2">Sell Orders (Asks)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t">
                            <td class="px-3 py-2">$29,950 - 0.5 BTC</td>
                            <td></td>
                            <td class="px-3 py-2">$30,000 - 0.7 BTC</td>
                        </tr>
                        <tr class="border-t">
                            <td class="px-3 py-2">$29,900 - 1.0 BTC</td>
                            <td></td>
                            <td class="px-3 py-2">$30,100 - 1.2 BTC</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class="mt-2 dark:text-gray-400">This is a simplified view of an order book. The left side shows buy orders (bids), while the right side shows sell orders (asks). On an exchange, the price and quantity of each order are usually displayed side by side with the order request form <span class="text-red-100"><i><a href="#demo_box">(Demo shown below)</a></i></span></p>
        </section>
        <br>
        <br>




        <section>
            <h2> Steps to placing an Order </h2>
        <p>Placing an order on a centralized exchange is straightforward. Follow these steps to help ensure your trades are executed correctly:</p>
        <br>
       
        <div class=" mx-auto">
        <!-- Step 1 -->
            <section class="mb-1">
                <b>1. Choose the asset to trade</b>
                <p class="pl-3">Select the cryptocurrency or trading pair you want to trade, such as <strong>BTC/USDT</strong> or <strong>ETH/USDT</strong>. Ensure the market has sufficient liquidity and matches your trading goals.</p>
            </section>
            <br>

        <!-- Step 2 -->
        <section>
            <b>2. Select the order type</b>
            <p  class="pl-3">Pick how you want the order to execute:</p>
            <ol class="list-disc list-inside mt-2 pl-3">
                <li><b>Market Order:</b> Fills immediately at the best available price.</li>
                <li><b>Limit Order:</b> Executes only at your specified price or better.</li>
                <li><b>Stop Order:</b> Triggers when a target price is reached.</li>
                <li><b>Stop-Limit Order:</b> Converts into a limit order after the stop price is hit.</li>
            </ol>
        </section>
        <br>

        <!-- Step 3 -->
        <section>
            <b>3. Enter price and amount</b>
            <p class="pl-3">Enter the <strong>price</strong> (for non-market orders) and the <strong>amount</strong> of the asset you want to buy or sell. Most exchanges will calculate the total cost or proceeds automatically.</p>
        </section>
        <br>

        <!-- Step 4 -->
        <section>
            <b>4. Review order details</b>
            <p  class="pl-3">Check all inputs carefully before submitting:</p>
            <ol class="list-disc list-inside mt-2 pl-3">
                <li>Buy or Sell side</li>
                <li>Order type</li>
                <li>Trading pair</li>
                <li>Price, amount, and estimated total</li>
                <li>Applicable fees</li>
            </ol>
        </section>
        <br>

        <!-- Step 5 -->
        <section>
            <b>5. Submit and monitor the order</b>
            <p class="pl-3">Submit your order. Market orders are executed instantly, while limit and stop orders remain open until they are filled. Monitor active orders under <strong>"Open Orders"</strong> and track completed trades in your order history. You can cancel or adjust unfilled orders if needed.</p>
        </section>
        </div>

        </section>
        <br>
        
        <section>
            <p> <i></i>   Orders are the backbone of trading on centralized exchanges. Whether you are trading as a beginner or as an experienced user, understanding how market, limit, stop, and other types of orders work will give you more control and help reduce unnecessary losses. Use the tools provided by your CEX wisely so you can trade safely and efficiently.           
            </p>
           
        </section>
<br>
 <br>
            <p class="text-red-500 font-italic text-center">Below is a simple demo order form.</p>
    <div class="max-w-md mx-auto mt-10 p-6 dark:bg-white rounded-xl shadow-md" id="demo_box">
        <h2 class="text-xl font-bold mb-4 text-center">  Place order  <span class="text-blue-500"><b> (DEMO) </b> </span>  </h2>

        <form method="POST" class="space-y-4">

            <!-- Order Side: Buy or Sell -->
            <div class="flex justify-between bg-gray-100 p-2 rounded-lg">
                <label class="w-1/2 text-center">
                    <input type="radio" name="side" value="buy" class="hidden peer" checked>
                    <div class="peer-checked:bg-green-500 peer-checked:text-white p-2 rounded-lg cursor-pointer">Buy</div>
                </label>
                <label class="w-1/2 text-center">
                    <input type="radio" name="side" value="sell" class="hidden peer">
                    <div class="peer-checked:bg-red-500 peer-checked:text-white p-2 rounded-lg cursor-pointer">Sell</div>
                </label>
            </div>

            <!-- Order Type: Market or Limit -->
            <div>
                <label for="order_type" class="block text-sm font-medium">Order Type</label>
                <select name="order_type" id="order_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="market">Market</option>
                    <option value="limit">Limit</option>
                </select>
            </div>

            <!-- Trading Pair -->
            <div>
                <label for="pair" class="block text-sm font-medium">Trading Pair</label>
                <select name="pair" id="pair" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="BTC/USDT">BTC/USDT</option>
                    <option value="ETH/USDT">ETH/USDT</option>
                    <option value="BNB/USDT">BNB/USDT</option>
                </select>
            </div>

            <!-- Price Field (for Limit Orders) -->
            <div>
                <label for="price" class="block text-sm font-medium">Price (USDT)</label>
                <input type="number" step="0.01" name="price" id="price" placeholder="Enter price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Amount Field -->
            <div>
                <label for="amount" class="block text-sm font-medium">Amount (e.g., BTC)</label>
                <input type="number" step="0.0001" name="amount" id="amount" placeholder="Enter amount" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Optional: Auto-Calculated Total -->
            <div>
                <label for="total" class="block text-sm font-medium">Total (USDT)</label>
                <input type="number" step="0.01" name="total" id="total" placeholder="Auto-calculated or manual" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700" disabled>Submit Order</button>
            </div>
        </form>
    </div>
