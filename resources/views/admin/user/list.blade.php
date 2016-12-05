@extends('layouts.admin.master')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="header">
                <h2>List USER</h2>
        </div>

    <table class="table table-responsive" id="users-table">
        <thead>
            <tr>
                <th>{{ trans('user.id') }}</th>
                <th>{{ trans('user.name') }}</th>
                <th>{{ trans('user.email') }}</th>
                <th>{{ trans('user.role') }}</th>
                <th>{{ trans('user.delete') }}</th>
                <th>{{ trans('user.edit') }}</th>
            </tr>    
        </thead>
        <tbody>
            <tr class="odd gradeX" >
            <td>1</td>
            <td>thanhan</td>
            <td>thanhad@gmail</td>
            <td>Superadmin</td>
            <td ><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
            <td ><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
        </tr>
        <tr class="even gradeC" >
            <td>2</td>
            <td>katun</td>
            <td>thanhad@gmail</td>
            <td>Admin</td>
            <td ><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
            <td ><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
        </tr>
        <tr class="odd gradeX">
            <td>3</td>
            <td>kuteo</td>
            <td>thanhad@gmail</td>
            <td>Member</td>
            <td ><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
            <td ><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
        </tr>
        </tbody>
    </table>
</div>    
</div>
@endsection

