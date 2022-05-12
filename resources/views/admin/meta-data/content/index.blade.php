@extends('admin.layouts.app')

@extends('admin.layouts.stylesheet')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>İçerik</h2>
                </blockquote>
            </figure>

            <div class="row">
                <div class="col-12 col-lg-12">
                    <h4><a href="{{ route('admin.meta-content.create') }}" class="btn btn-success">İçerik Ekle</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Başlık</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($meta_contents as $meta_content)
                            <tr>
                                <td>{{ $meta_content->title }}</td>
                                <td>
                                    <a href="{{ route('admin.meta-content.edit',$meta_content->id) }}">
                                        <i class="bi bi-pen text-dark"></i>
                                    </a>
                                    <button
                                        onclick="deleteButton(this,`${{route('admin.meta-content.destroy',$meta_content)}}`)">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
    @include('layouts.stylesheet')
@endsection

@section('meta')
    <title>İçerik</title>
@endsection

@section('js')
    <script>
        const backUrl = '{{route('admin.meta-content.index')}}';
    </script>
    @include('admin.layouts.extension.script')
    @include('layouts.script')
@endsection
