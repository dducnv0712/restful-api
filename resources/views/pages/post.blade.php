@extends('layout')
@section('main_content')
<div class="container">
    <div class="py-4">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">ALL POSTS</h1>

            </div>
            <div>
                <button type="button" class="btn btn-outline-gray-600 d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#create_post">
                    Add New Post
                </button>
                <div class="modal fade" id="create_post" tabindex="-1" aria-labelledby="create_post" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="create_post">Modal title</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          ...
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($posts as $item)
                          <tr>
                            <td>{{$loop->index +1}}</td>
                          <td>{{$item->image}}</td>
                          <td>{{$item->title}}</td>
                          <td>{{$item->description}}</td>
                          </tr>
                          @empty
                          <tr >
                            <td colspan="4" class="text-center">Empty ¯\_(ツ)_/¯</td>
                            </tr>
                          @endforelse
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
