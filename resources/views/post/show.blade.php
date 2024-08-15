@extends('layouts.main')
@section('content')
    <div>
        <div>{{{ $post->id }}}. {{ $post->title }}</div>
        <div>{{ $post->content }}</div>
    </div>
    <br>
    <div>
        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning mb-3">Edit</a>
    </div>
    <div>
        <form action="{{ route('post.delete', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit"  value="Delete" class="btn btn-danger mb-3">
        </form>
    </div>
    <div>
        <a href="{{ route('post.index') }}" class="btn btn-success mb-3">Back</a>
    </div>
@endsection
