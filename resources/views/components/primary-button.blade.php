<button {{ $attributes->merge(['type' => 'submit', 'class' => 'd-flex items-center py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 m-auto w-full focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
