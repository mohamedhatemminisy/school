@extends('layouts.admin')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">@lang('admin.Orders')</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">@lang('admin.home')</a>
                            </li>
                            <li class="breadcrumb-item active">@lang('admin.Orders')
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> @lang('admin.Orders')</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <form action="{{route('order.filter')}}" method="get">
                                        @csrf
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                <label>@lang('admin.status')</label>
                                                <select name="status" class="form-control">
                                                    <option value="0" disabled selected>@lang('admin.select_status')</option>
                                                    <option value="pending">@lang('admin.processing')</option>
                                                    <option value="completed">@lang('admin.completed')</option>
                                                </select>
                                            </div>

                                            <div class="col-md-2 mt-2">
                                                <button type="submit" class="btn btn-success btn-sm">@lang('admin.Filtrer')</button>
                                            </div>

                                        </div>
                                    </form>

                                    <table class="table display nowrap table-striped table-bordered">
                                        <thead class="">
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.name')</th>
                                                <th>@lang('admin.status')</th>
                                                <th>@lang('admin.school')</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @isset($orders )
                                            @foreach($orders as $key => $order)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{$order -> name}}</td>
                                                <td>{{$order -> status}}</td>
                                                <td>{{$order -> school->name}}</td>
                                            </tr>
                                            @endforeach
                                            @endisset
                                        </tbody>
                                    </table>
                                    <div class="justify-content-center d-flex">
                                        {{ $orders->links('vendor.pagination.custom') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</div>

@stop

@section('script')
<script>
    $('#user_id').select2({
        width: '100%',
        placeholder: "Select an Option",
        allowClear: true
    });
    @stop