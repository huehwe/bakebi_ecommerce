<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <div class="text-red-500 mb-4">
                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
            
            <h2 class="text-2xl font-bold mb-4">Order Failed</h2>
            <p class="mb-4">{{ session('error') ?? 'Something went wrong with your order.' }}</p>

            <div class="mt-6 space-x-4">
                <a href="{{ route('cart.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Return to Cart
                </a>
                <a href="{{ route('checkout.index') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Try Again
                </a>
            </div>
        </div>
    </div>
</x-app-layout>