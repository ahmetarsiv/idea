@extends('admin.layouts.app')

@extends('admin.layouts.stylesheet')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Slider</h2>
                </blockquote>
            </figure>

            <div class="row">
                <div class="col-12 col-lg-12">
                    <h4><a href="{{ route('admin.slider.create') }}" class="btn btn-success">Slider Ekle</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Slider adı</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <td>{{ $slider->title }}</td>
                                <td>
                                    <a href="{{ route('admin.slider.edit',$slider->id) }}">
                                        <i class="bi bi-pen text-dark"></i>
                                    </a>
                                    <button onclick="deleteButton(this,`${{route('admin.slider.destroy',$slider)}}`)">
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
    <title>Kategoriler</title>
@endsection

@section('js')
    <script>
        const backUrl = '{{route('admin.slider.index')}}';
    </script>
    @include('admin.layouts.extension.script')
    @include('layouts.script')
@endsection
