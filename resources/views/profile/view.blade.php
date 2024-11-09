<x-app-layout>
    <div x-data="{
            flashMessage: '{{\Illuminate\Support\Facades\Session::get('flash_message')}}',
            init() {
                if (this.flashMessage) {
                    setTimeout(() => this.$dispatch('notify', {message: this.flashMessage}), 200)
                }
            }
        }" class="profile-container">
        
        <div class="w-full">

            <form x-data="{
                countries: {{ json_encode($countries) }},
                billingAddress: {{ json_encode([
                    'address1' => old('billing.address1', $billingAddress->address1),
                    'province' => old('billing.province', $billingAddress->province),
                    'district' => old('billing.district', $billingAddress->district),
                ]) }},
                get provinces() {
                    const country = this.countries.find(c => c.code === 'VN');
                    return country ? country.provinces : [];
                },
                get districts() {
                    const country = this.countries.find(c => c.code === 'VN');
                    return country ? country.districts[this.billingAddress.province] || [] : [];
                }
            }" action="{{ route('profile.update') }}" method="post">
                @csrf
                
                <h2 class="text-[26px] font-semibold mb-4">Thông tin tài khoản</h2>
                
                <!-- Hàng đầu tiên: Họ và Tên -->
                <div class="input-row mb-4">
                    <div class="input-item">
                        <x-input type="text" name="first_name" value="{{ old('first_name', $customer->first_name) }}" placeholder="Họ" class="w-full h-[50px]" />
                    </div>
                    <div class="input-item">
                        <x-input type="text" name="last_name" value="{{ old('last_name', $customer->last_name) }}" placeholder="Tên" class="w-full h-[50px]" />
                    </div>
                </div>

                <!-- Hàng tiếp theo: Email và Số điện thoại -->
                <div class="input-row mb-4">
                    <div class="input-item">
                        <x-input type="text" name="email" value="{{ old('email', $user->email) }}" placeholder="Email" class="w-full h-[50px]" />
                    </div>
                </div>
                <div class="input-row mb-4">
                    <div class="input-item">
                        <x-input type="text" name="phone" value="{{ old('phone', $customer->phone) }}" placeholder="Số điện thoại" class="w-full h-[50px]" />
                    </div>
                </div>

                <h2 class="text-[26px] mt-6 font-semibold mb-4">Địa chỉ</h2>

                <!-- Địa chỉ -->
                <div class="input-row mb-4">
                    <div class="input-item">
                        <x-input type="text" name="billing[address1]" value="{{ old('address1', $customer->address1) }}" x-model="billingAddress.address1" placeholder="Số nhà, tên đường" class="w-full h-[50px]" />
                    </div>
                </div>

                <div class="input-row mb-4">
                    <div class="input-item">
                        <x-input type="select" name="billing[province]" x-model="billingAddress.province" class="w-full h-[50px]">
                            <option value="">Chọn Tỉnh/Thành phố</option>
                            <template x-for="province in provinces" :key="province">
                                <option :value="province" :selected="province === billingAddress.province" x-text="province"></option>
                            </template>
                        </x-input>
                    </div>
                    <div class="input-item">
                        <x-input type="select" name="billing[district]" x-model="billingAddress.district" value="{{ old('district', $customer->district) }}" class="w-full h-[50px]">
                            <option value="">Chọn Quận/Huyện</option>
                            <template x-for="district in districts" :key="district">
                                <option :value="district" :selected="district === billingAddress.district" x-text="district"></option>
                            </template>
                        </x-input>
                    </div>
                </div>
            <div class="flex justify-center mt-6 gap-4">
                <x-button class="profile-detail-button mt-6 text-[18px] ">Lưu thay đổi</x-button>
            </div>
            </form>
           
            <div class="mt-6 w-full">
                <form action="{{ route('profile_password.update') }}" method="post">
                    @csrf
                    <h2 class="text-[26px] font-semibold mb-2">Cập nhật mật khẩu</h2>
                    <div class="input-row mb-4">
                        <div class="input-item">
                            <x-input type="password" name="old_password" placeholder="Mật khẩu hiện tại" class="w-full h-[50px]" />
                        </div>
                    </div>
                    <div class="input-row mb-4">
                        <div class="input-item">
                            <x-input type="password" name="new_password" placeholder="Mật khẩu mới" class="w-full h-[50px]" />
                        </div>
                    </div>
                    <div class="input-row mb-4">
                        <div class="input-item">
                            <x-input type="password" name="new_password_confirmation" placeholder="Nhập lại mật khẩu mới" class="w-full h-[50px]" />
                        </div>
                    </div>
                    <div class="flex justify-center mt-6 gap-4">
                <x-button class="profile-detail-button mt-6 text-[18px] ">Lưu thay đổi</x-button>
            </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
