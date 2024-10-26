<x-app-layout>
    <form method="POST" action="{{ route('login') }}" class="">
        <h2 class="">
            Đăng nhập vào tài khoản
        </h2>
        <p class="">
            hoặc
            <a
                href="{{ route('register') }}"
                class=""
            >
                Tạo tài khoản mới
            </a>
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        @csrf
        <div class="mb-4">
            <x-input type="email" name="email" placeholder="Email của bạn" :value="old('email')"/>
        </div>
        <div class="mb-4">
            <x-input type="password" name="password" placeholder="Mật khẩu" :value="old('password')" />
        </div>
        <div class="">
            <div class="">
                <input
                    id="loginRememberMe"
                    type="checkbox"
                    class=""
                />
                <label for="loginRememberMe">checkbox</label>
            </div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="">
                    Forgot Password?
                </a>
            @endif
        </div>
        <button
            class=""
        >
            Đăng nhập
        </button>
    </form>
</x-app-layout>
