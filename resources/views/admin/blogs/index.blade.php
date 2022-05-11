@extends('admin.layouts.app')

@section('content')

    <div class="page-header">
        <div class="page-title">
            <h1>Blog</h1>
        </div>
        <div class="page-action">
            <a href="{{ route('admin.blog.create') }}" class="btn btn-lg btn-primary">
                Blog Ekle
            </a>
        </div>
    </div>
    <div class="table">
        <div class="grid-container">
            <div class="grid-top">
                <div class="datagrid-filters">
                    <div class="filter-left">
                        <div></div>
                    </div>
                </div>
                <div id="datagrid-filters" class="datagrid-filters">
                    <div>
                        <div class="search-filter">
                            <input type="search" id="search-field" placeholder="Search Here..." class="control">
                            <div class="icon-wrapper"><span class="icon search-icon search-btn"></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr style="height: 65px;">
                        <th class="grid_head" style="width: 50px;" id="mastercheckbox">
                            <span class="checkbox">
                                <input type="checkbox" name="checkbox">
                                <label for="checkbox" class="checkbox-view"></label>
                            </span>
                        </th>
                        <th class="grid_head sortable">ID</th>
                        <th class="grid_head sortable">Name</th>
                        <th class="grid_head sortable">Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($blogs as $blog)
                            <td>
                                <span class="checkbox">
                                    <input type="checkbox" name="checkbox">
                                    <label for="checkbox" class="checkbox-view"></label>
                                </span>
                            </td>
                            <td data-value="id">{{ $blog->id }}</td>
                            <td data-value="id">{{ $blog->name }}</td>
                            <td data-value="id" class="{{$company->status == 1 ? 'badge-success' : 'badge-danger'}}">{{$blog->status == 1 ? 'Aktif' : 'Pasif'}}</td>
                            <td data-value="Actions" class="actions" style="white-space: nowrap; width: 100px;">
                                <div class="action">
                                    <a id="1" href="{{ route('admin.blog.edit',$blog->id) }}" target="" title="Edit">
                                        <span class="icon pencil-lg-icon"></span>
                                    </a>
                                    <button onclick="deleteButton(this,`${{route('admin.blog.destroy',$blog)}}`)">
                                        <span class="icon trash-icon"></span>
                                    </button>
                                </div>
                            </td>
                        @endforeach
                        <!--<td colspan="10"><p style="text-align: center;">No Records Found</p></td>-->
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
    @include('layouts.stylesheet')
@endsection

@section('meta')
    <title>Blog</title>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const backUrl = '{{route('admin.blog.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
    @include('layouts.script')
@endsection
