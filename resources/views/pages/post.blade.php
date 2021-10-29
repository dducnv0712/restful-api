@extends('layout')
@section('main_content')
    <div class="container">
        <div class="py-4">
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">ALL POSTS</h1>
                </div>
                <div>
                    <button type="button" class="btn btn-outline-gray-600 d-inline-flex align-items-center"
                            data-bs-toggle="modal" data-bs-target="#create_post">
                        Add New Post
                    </button>
                    <div class="modal fade" id="create_post" tabindex="-1" aria-labelledby="create_post"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <form method="post" action="{{url('api/'.Auth::user()->user_name.'/posts')}}" class="row g-3 needs-validation container" novalidate>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="create_post">Create New A Post</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image Url</label>
                                            <input name="image" type="url" class="form-control" id="image" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid image url.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input name="title" type="text" class="form-control" id="title" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid title.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="desc" class="form-label">Description</label>
                                            <textarea name="description" class="form-control" id="desc" rows="3"
                                                      required></textarea>
                                            <div class="invalid-feedback">
                                                Please provide a valid description.
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card mt-5 mb-3">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($posts as $item)
                                <tr>
                                    <td width="5%">{{$loop->index +1}}</td>
                                    <td width="10%">
                                    <div class="image-preview">
                                        <img src="{{$item->image}}" alt="{{$item->title}}"/>
                                    </div>
                                    </td>
                                    <td width="25%">{{$item->title}}</td>
                                    <td width="50%">{{$item->description}}</td>
                                    <td width="10%">action</td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Empty ¯\_(ツ)_/¯</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card card-body">
                    <code>
                        fetch('https://jsonplaceholder.typicode.com/todos/1')<br/>
                        .then(response => response.json())<br/>
                        .then(json => console.log(json))<br/>
                    </code>
                </div>
            </div>
        </div>
    </div>
@endsection
