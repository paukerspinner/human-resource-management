@extends('layouts.admin')
@section('Heading')
    <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#create"><span class="fas fa-plus"></span> Add Designation</button>
    <h3 class="text-themecolor">Teams</h3>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Bảng điều khiển</a></li>
        <li class="breadcrumb-item active">Settings</li>
        <li class="breadcrumb-item active">Designations</li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-subtitle"></h6>
                    <div class="table">
                        <table id="demo-foo-addrow" class="table  m-t-30 table-hover contact-list" data-paging="true" data-paging-size="7">
                            <thead>
                            @if($designations->count() > 0)
                                <tr>
                                    <th>#</th>
                                    <th>Designation Name</th>
                                    <th>Status</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($designations as $key=>$designation)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$designation->designation_name}}</td>
                                    <td>@if($designation->status==1)
                                        Enable
                                            @else
                                            Disable
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $designation->id }}"   data-original-title="Edit"> <i class="fas fa-pencil-alt text-white"></i></a>
                                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirm-delete{{ $designation->id }}"  data-original-title="Close"> <i class="fas fa-window-close text-white  "></i> </a>
                                        <div class="modal fade" id="confirm-delete{{ $designation->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('designation.delete' , $designation->id )}}" method="post">
                                                        {{ csrf_field() }}
                                                        <div class="modal-header">
                                                            Are you sure you want to delete this Designation?
                                                        </div>
                                                        <div class="modal-header">
                                                            <h4>{{ $designation->designation_name}}</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                            <button  type="submit" class="btn btn-danger btn-ok">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <div class="modal fade" id="edit{{ $designation->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{route('designation.update',['id'=>$designation->id])}}" method="post">
                                                    {{ csrf_field() }}
                                                    <div class="modal-header">
                                                        Update Designation
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Designation Name</label>
                                                            <input  type="text" name="name" value="{{old('name',$designation->designation_name)}}" placeholder="Enter Designation Name Here" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Status</label>
                                                            <select name="status" class="form-control">
                                                               <option value="1" @if($designation->status==1) selected @endif>Enable</option>
                                                                <option value="0" @if($designation->status==0) selected @endif>Disable</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        <button  type="submit" class="btn btn-success btn-ok">Update Designation</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach @else
                                <tr> No Designation Found</tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('designation.create')}}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        Create Designation
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Team Name</label>
                            <input  type="text" name="designation_name" placeholder="Enter Designation Name Here" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button  type="submit" class="btn btn-info btn-ok">Add Designation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop