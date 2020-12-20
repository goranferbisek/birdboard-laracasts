@if($errors->any())
    <div class="text-red-600 mt-6 text-sm">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif