@php
    $id = 'cf-turnstile-' . hash('sha256', time() . rand())
@endphp

<div class="mb-3 cf-turnstile" id="{{ $id }}"></div>
