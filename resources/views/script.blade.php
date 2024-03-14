@once
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js?render=explicit" rel="preload"></script>

    <script>
        turnstile.ready(function () {
            document.querySelectorAll('.cf-turnstile').forEach(function (el) {
                turnstile.render(`#${el.id}`, {
                    sitekey: '{{ $siteKey }}',
                });
            });
        });

        window.addEventListener('load', function () {
            $(document).ajaxComplete(function(response, status, xhr) {
                if (! (typeof xhr.data === 'string' && xhr.data.includes('_js_validation'))) {
                    document.querySelectorAll('.cf-turnstile').forEach(function (el) {
                        turnstile.reset(`#${el.id}`);
                    });
                }
            });
        });
    </script>
@endonce
