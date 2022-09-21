@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ( session('deleted'))
                    <div class="alert alert-warning">
                        "{{ session('deleted') }}" has been successfully deleted.
                    </div>
                @endif

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Author</th>
                            <th scope="col">Title</th>
                            <th scope="col">Date</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <th scope="row">
                                    <a href="{{route('admin.posts.show', $post->slug)}}">
                                        {{ $post->id }}
                                    </a>
                                </th>
                                <td>
                                    {{ $post->user->name }}
                                </td>
                                <td>
                                    <a href="{{route('admin.posts.show', $post->slug)}}">
                                        {{ $post->title }}
                                    </a>
                                </td>
                                <td>
                                    {{ $post->post_date }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.posts.edit', $post->slug) }}" class="btn btn-sm btn-success">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="form-post-delete"
                                        data-post-name="{{ $post->title }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


