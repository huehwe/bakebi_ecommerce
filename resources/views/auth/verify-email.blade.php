<x-app-layout>
    <div class="">

        <div class="">
            {{ __('Cảm ơn bạn vì đã đăng kí! Trước khi tiếp tục, bạn có thể xác nhận email bằng cách nhấn vào liên kết mà chúng tôi vừa gửi đến email của bạn. Nếu bạn không nhận được email, chúng tôi sẵn sàng gửi lại cho bạn.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="">
                {{ __('Chúng tôi đã gửi liên kết xác nhận mới đến email của bạn.') }}
            </div>
        @endif

        <div class="">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
