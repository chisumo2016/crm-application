@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-textarea mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 rounded-md shadow-sm']) !!}>{{ $slot }}</textarea>

