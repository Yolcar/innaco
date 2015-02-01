<div class="form-group">
    {{ $control }}
    <script>
        CKEDITOR.replace( '{{ $name }}' )
    </script>

    @if ($error)
        <p class="error_message">{{ $error }}</p>
    @endif
</div>