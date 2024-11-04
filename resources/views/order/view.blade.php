<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Order #{{ $order->id }}</h2>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <h3 class="font-bold mb-2">Customer Information</h3>
                            <p>Name: {{ $order->user->name }}</p>
                            <p>Email: {{ $order->user->email }}</p>
                        </div>
                        <div>
                            <h3 class="font-bold mb-2">Order Information</h3>
                            <p>Total: ${{ number_format($order->total_price, 2) }}</p>
                            <p>Date: {{ $order->created_at->format('Y-m-d H:i') }}</p>
                        </div>
                    </div>

                    <form action="{{ route('admin.orders.update-status', $order) }}" method="POST" class="mt-4">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-2">Order Status</label>
                                <select name="status" class="w-full border rounded px-3 py-2">
                                    @foreach($orderStatuses as $status)
                                        <option value="{{ $status->value }}" 
                                            {{ $order->status === $status ? 'selected' : '' }}>
                                            {{ $status->value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div>
                                <label class="block mb-2">Payment Status</label>
                                <select name="payment_status" class="w-full border rounded px-3 py-2">
                                    @foreach($paymentStatuses as $status)
                                        <option value="{{ $status->value }}"
                                            {{ $order->payment_status === $status ? 'selected' : '' }}>
                                            {{ $status->value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" 
                                class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Update Status
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>