<script>
    turnstile.ready(function () {
        turnstile.render('.cf-turnstile', {
            sitekey: '{{ $siteKey }}',
            callback: function (token) {
                document
                    .querySelector('.cf-turnstile')
                    .closest('form')
                    .querySelector('input[name="turnstile"]')
                    .value = token;
            },
        });
    });
</script>
