@props(['errors'])

@if ($errors->any())
    <div {{ $attributes->merge(['class' => '']) }}>
        <div class="font-medium">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
