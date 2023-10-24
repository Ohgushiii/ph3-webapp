<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-64 h-3/5 mx-5 bg-gradient-to-r from-blue-500 to-blue-300 text-white border-none cursor-pointer shadow-md rounded-full']) }}>
    {{ $slot }}
</button>