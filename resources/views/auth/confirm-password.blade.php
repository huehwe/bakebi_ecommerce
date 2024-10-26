<x-app-layout>
    <div class="">

        <div class="">
            {{ __('Vui lòng xác nhận mật khẩu trước khi tiếp tục.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="">
                <x-button>
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>
