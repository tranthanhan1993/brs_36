@extends('layouts.admin_master')
@section('title', trans('book_request.request_list_title'))
@section('header')
    <h1 class="page-header">{{ trans('book_request.list_your_request') }}</h1>
@endsection
@section('content')
<div class="col-lg-8">
    <div class="hide" data-route="{{ url('admin/request') }}"></div>
    <table class="table table-responsive table-hover" id="">
        <thead>
            <tr>
                <th class="text-center">{{ trans('book_request.book_request_id') }}</th>
                <th class="text-center">{{ trans('book_request.user') }}</th>
                <th class="text-center">{{ trans('book_request.content') }}</th>
                <th class="text-center">{{ trans('book_request.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
                <tr class="odd gradeX text-center">
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->user->name }}</td>
                    <td>{{ $request->content }}</td>
                    <td>
                        <div class="btn-group request{{ $request->id }}" data-request-id="{{ $request->id }}" data-status="{{ $request->status }}" data-token="{{ csrf_token() }}">
                            @include('includes.show_list_request', [
                                'status' => $request->status,
                            ])
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-lg-12 col-lg-offset-8">
        {!! $requests->render(); !!}
    </div>
</div>
@endsection
