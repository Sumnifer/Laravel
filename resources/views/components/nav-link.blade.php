@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-lime-600 dark:border-indigo-600 text-sm font-medium  text-gray-900 dark:text-gray-100 focus:outline-none focus:border-lime-500 transition duration-150 ease-in-out uppercase'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-lime-500 dark:hover:border-gray-700 focus:outline-none focus:text-lime-600 dark:focus:text-gray-300 focus:border-lime-500 dark:focus:border-gray-700 transition duration-150 ease-in-out uppercase';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
