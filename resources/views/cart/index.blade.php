<x-app-layout>
    <div class="">
        <h1 class="">Sản phẩm trong giỏ hàng</h1>

        <div x-data="{
            cartItems: {{
                json_encode(
                    $products->map(fn($product) => [
                        'id' => $product->id,
                        'slug' => $product->slug,
                        'image' => $product->image,
                        'title' => $product->title,
                        'price' => $product->price,
                        'quantity' => $cartItems[$product->id]['quantity'],
                        'href' => route('product.view', $product->slug),
                        'removeUrl' => route('cart.remove', $product),
                        'updateQuantityUrl' => route('cart.update-quantity', $product)
                    ])
                )
            }},
            get cartTotal() {
                return this.cartItems.reduce((accum, next) => accum + next.price * next.quantity, 0).toFixed(2)
            },
        }" class="bg-white p-4 rounded-lg shadow">
            <!-- Product Items -->
            <template x-if="cartItems.length">
                <div>
                    <!-- Product Item -->
                    <template x-for="product of cartItems" :key="product.id">
                        <div x-data="productItem(product)">
                            <div
                                class="">
                                <a :href="product.href"
                                   class="">
                                    <img :src="product.image" class="object-cover" alt=""/>
                                </a>
                                <div class="">
                                    <div class="">
                                        <h3 x-text=""></h3>
                                        <span class="">
                                            $<span x-text="product.price"></span>
                                        </span>
                                    </div>
                                    <div class="">
                                        <div class="">
                                            Số lượng:
                                            <input
                                                type="number"
                                                min="1"
                                                x-model="product.quantity"
                                                @change="changeQuantity()"
                                                class=""
                                            />
                                        </div>
                                        <a
                                            href="#"
                                            @click.prevent="removeItemFromCart()"
                                            class=""
                                        >Xóa</a
                                        >
                                    </div>
                                </div>
                            </div>
                            <!--/ Product Item -->
                            <hr class="my-5"/>
                        </div>
                    </template>
                    <!-- Product Item -->

                    <div class="">
                        <div class="">
                            <span class="font-semibold">Tổng tạm tính</span>
                            <span id="cartTotal" class="" x-text="`$${cartTotal}`"></span>
                        </div>
                        <p class="">
                            Phí vận chuyển được tính tại thanh toán.
                        </p>

                        <button type="submit" class="">
                            Thanh toán
                        </button>
                    </div>
                </div>
                <!--/ Product Items -->
            </template>
            <template x-if="!cartItems.length">
                <div class="text-center py-8 text-gray-500">
                    Bạn không có sản phẩm nào trong giỏ hàng
                </div>
            </template>

        </div>
    </div>
</x-app-layout>
