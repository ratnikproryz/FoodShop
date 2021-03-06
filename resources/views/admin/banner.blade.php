@extends('layouts.admin-app')
@section('title','Food Shop VKU | Admin')

@section('content')
<div class="main-content">
  {{-- <x-breadcrumb currentPage="Dashboard"></x-breadcrumb> --}}
  <div class="shop-area pb-120 section-padding-2">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="myaccount-content">
            <h3>Banners</h3>
            {{-- form add new banner --}}
            <div class="account-details-form">
              <form action="/admin/banner" method='post' enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-lg-12">
                    <div class="single-input-item">
                      <label for="">Image Banner</label>
                      <input type="file" name="image" id="image">
                      <span class="text-danger">
                        @error('image'){{ $message }}@enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="single-input-item">
                      <label for="">Short Title</label>
                      <input type="text" name='title' id='title' value="{{ old('title') }}">
                      <span class="text-danger">
                        @error('title'){{ $message }}@enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="single-input-item">
                      <label for="">Name</label>
                      <input type="text" name='name' id='name' value="{{ old('name') }}">
                      <span class="text-danger">
                        @error('name'){{ $message }}@enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="single-input-item">
                      <label for="description">Description</label>
                      <input type="text" name='description' id='description' value="{{ old('description') }}">
                      <span class="text-danger">
                        @error('description'){{ $message }}@enderror
                      </span>
                    </div>
                  </div>
                </div>
                @if (session()->has('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
                @endif
                @if (session()->has('failure'))
                <div class="alert alert-danger">
                  {{ session('failure') }}
                </div>
                @endif
                <div class="single-input-item">
                  <button class="check-btn sqr-btn ">Save</button>
                </div>
              </form>
            </div>
            {{-- list of banners --}}
            <div class="myaccount-table table-responsive ">
              <table class="table table-bordered text-center">
                <thead class="thead-light">
                  <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Banner</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if (!empty($banners))
                  @foreach ($banners as $banner)
                  <tr>
                    <td>{{ $banner->id }}</td>
                    <td><img src="{{  asset($banner->image) }}" style="width:5rem" alt=""></td>
                    <td>{{ $banner->title }}</td>
                    <td>{{ $banner->name }}</td>
                    <td>{{ $banner->description }}</td>
                    <td>
                      <a href="" data-url="{{ route('admin.banner.destroy', array($banner->id)) }}" class="action_delete">
                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                      </a>
                    </td>
                  </tr>
                  </form>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            {{-- end list of banners --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('../../js/admin/admin.js') }}"></script>
@endsection
@endsection