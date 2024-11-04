<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Order Placed Successfully!</h2>
                    <div class="mb-4">
                        <p>Order ID: {{ $order->id }}</p>
                        <p>Total: ${{ number_format($order->total_price, 2) }}</p>
                        <p>Status: {{ $order->status->value }}</p>
                        <p>Payment Status: {{ $order->payment_status->value }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>