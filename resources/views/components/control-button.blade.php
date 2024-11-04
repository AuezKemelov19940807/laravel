<button  {{ $attributes->merge(['type' => 'button', 'class' => 'rounded-md p-2'])}}>
    {{ $slot }}
</button>
