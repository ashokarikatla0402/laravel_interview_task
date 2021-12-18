
<div class="alert {{ $status_class }}">
    @if(count($errors)>0)
    <ul>
        @foreach ($errors as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    {{ $slot }}
</div>
