<x-app-layout>
    <div x-data="{
            flashMessage: '{{\Illuminate\Support\Facades\Session::get('flash_message')}}',
            init() {
                if (this.flashMessage) {
                    setTimeout(() => this.$dispatch('notify', {message: this.flashMessage}), 200)
                }
            }
        }" class="container mx-auto lg:w-2/3 p-5">
        <div class="">
            <div class="">
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
}"          action="{{ route('profile.update') }}" method="post">
                   
        @csrf
        <h2 class="text-xl font-semibold mb-2">Profile Details</h2>
        <div class="">
            <x-input type="text" name="first_name" value="{{old('first_name', $customer->first_name)}}"
                placeholder="First Name"
                class="" />
            <x-input type="text" name="last_name" value="{{old('last_name', $customer->last_name)}}"
                placeholder="Last Name"
                class="" />
        </div>
        <div class="mb-3">
            <x-input type="text" name="email" value="{{old('email', $user->email)}}" placeholder="Your Email"
                class="" />
        </div>
        <div class="mb-3">
            <x-input type="text" name="phone" value="{{old('phone', $customer->phone)}}" placeholder="Your Phone"
                class="" />
        </div>

        <h2 class="text-xl mt-6 font-semibold mb-2">Địa chỉ</h2>
        <div class="">
            <div>
                <x-input type="text" name="billing[address1]" value="{{old('address1', $customer->address1)}}" x-model="billingAddress.address1"
                    placeholder="Số nhà, tên đường"
                    class="" />
            </div>
        </div>
 

            <div class="grid grid-cols-2 gap-3 mb-3">
                <div>

                <x-input type="select" name="billing[province]"
        x-model="billingAddress.province"
        class="">
        <option value="">Chọn Tỉnh/Thành phố</option>
        <template x-for="province in provinces" :key="province">
        <option :value="province" 
                    :selected="province === billingAddress.province"
                    x-text="province"></option>
        </template>
</x-input>
            </div>
            <div>
                <x-input type="select" name="billing[district]" x-model="billingAddress.district"
                    value="{{old('district', $customer->district)}}"
                    class="">
                    <option value="">Chọn Quận/Huyện</option>
                    <template x-for="district in districts" :key="district">
                        <option :value="district" 
                                :selected="district === billingAddress.district"
                                x-text="district"></option>
                    </template>
                </x-input>
            </div>
        </div>
                    <x-button class="w-full">Update</x-button>
                    </form>
                </div>
                <div class="bg-white p-3 shadow rounded-lg">
                    <form action="{{route('profile_password.update')}}" method="post">
                        @csrf
                        <h2 class="text-xl font-semibold mb-2">Update Password</h2>
                        <div class="mb-3">
                            <x-input type="password" name="old_password" placeholder="Your Current Password"
                                class="" />
                        </div>
                        <div class="mb-3">
                            <x-input type="password" name="new_password" placeholder="New Password"
                                class="" />
                        </div>
                        <div class="mb-3">
                            <x-input type="password" name="new_password_confirmation"
                                placeholder="Nhập lại mật khẩu mới" class="" />
                        </div>
                        <x-button>Update</x-button>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>