@if($errors->{ $bag ?? 'default' }->any())
    <div class="text-red-600 mt-6 text-sm">
        <ul>
            @foreach ($errors->{ $bag ?? 'default' }->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif