@extends('layouts.app')

@section('content')
    <form
        method="POST"
        action="{{ $project->path() }}"
        class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow"
    >
        @csrf
        @method('PATCH')
        <h1 class="text-2xl font-normal mb-10 text-center">Edit your project</h1>

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
                >{{ $project->description }}</textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button mr-2">Update Project</button>
                <a href="{{ $project->path() }}">Cancel</a>
            </div>
        </div>
    </form>
@endsection