@csrf
<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="title">Title</label>
    <div class="control">
        <input
            type="text"
            class="input bg-transparent border border-gray-400 rounded p-2 text-xs w-full"
            name="title"
            id="title"
            placeholder="My next project"
            value="{{ $project->title }}"
            required
        >
    </div>
</div>

<div class="field">
    <label class="label text-sm mb-2 block" for="description">Description</label>
    <div class="control">
        <textarea
            name="description"
            class="textarea bg-transparent border border-grey-light rounded p-2 text-xs w-full"
            id="description"
            placeholder="Describe your new project"
            required
        >{{ $project->description }}</textarea>
    </div>
</div>

<div class="field">
    <div class="control">
        <button type="submit" class="button mr-2">{{ $buttonText }}</button>
        <a href="{{ $project->path() }}">Cancel</a>
    </div>
</div>

@include('errors')