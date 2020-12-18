@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <p class="text-gray-600 text-sm font-normal">
                <a href="/projects" class="text-gray-600 text-sm font-normal no-underline" >
                    My Projects
                </a> / {{ $project->title }}
            </p>

            <div class="flex items-center">
                @foreach ($project->members as $member)
                    <img src="https://gravatar.com/avatar/{{ md5($member->email) }}?s=60"
                        class="rounded-full w-8 mr-2"
                        alt="{{ $member->name }}'s avatar"
                    >
                @endforeach

                <a href="{{ $project->path() . '/edit'}}" class="button ml-6">Edit Project</a>
            </div>
        </div>
    </header>
    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mb-6">
                <div class="mb-8">
                    <h2 class="text-gray-600 font-normal text-lg mb-3">Tasks</h2>
                    {{-- tasks --}}
                    @foreach ($project->tasks as $task)
                        <div class="card mb-3">
                            <form method="POST" action="{{ $task->path() }}">
                                @method('PATCH')
                                @csrf
                                <div class="flex">
                                    <input name="body" type="text" value="{{ $task->body }}" class="w-full {{ $task->completed ? 'text-gray-600' : '' }}">
                                    <input name="completed" type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                                </div>
                            </form>
                        </div>
                    @endforeach

                    <form method="POST" action="{{ $project->path() . '/tasks' }}">
                        @csrf
                        <input name="body" placeholder="Begin adding tasks..." class="w-full">
                    </form>
                </div>

                <div>
                    <h2 class="text-gray-600 font-normal text-lg mb-3">General notes</h2>

                    {{-- general notes --}}
                    <form method="POST" action="{{ $project->path() }}">
                        @method('PATCH')
                        @csrf
                        <textarea
                            name="notes"
                            class="card w-full mb-2"
                            placeholder="Anything special you want to make a note of?"
                            style="min-height: 200px;"
                        >{{ $project->notes }}</textarea>
                        <button type="submit" class="button">Save</button>
                    </form>

                    @if($errors->any())
                        <div class="text-red-600 mt-6 text-sm">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="lg:w-1/4 px-3">
                @include('projects.card')
                @include('projects.activity.card')
            </div>
        </div>
    </main>
@endsection