@extends('layouts.app')
@section('content')

    <div class="app-content content container" style="display: flex;flex-direction: row-reverse;">
        <div class="right" style="width: 70%;margin-right: 100px">

        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title" style="text-align: center">الأدوار والصلاحيات  </h3><br><br>
                    <a href="/roles/create" class="btn btn-primary ">دور جديد</a>

                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
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
                                    <h4 class="card-title" style="text-align: center">  كل الأدوار  </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                @include('dashboard.includes.alerts.success')
                                @include('dashboard.includes.alerts.error')

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered">
                                            <thead class="">
                                            <tr>
                                                <th>القائم بالدور</th>
                                                <th>الصلاحيات</th>
                                                <th>الاجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($roles)
                                                @foreach($roles as $role)
                                                    <tr>
                                                        <td>{{$role -> name}}</td>
                                                        <td>
                                                            @foreach($role -> permissions as $permission)
                                                                {{$permission}} ,
                                                            @endforeach

                                                        </td>

                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.role.edit',$role -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل </a>
                                                                    {{-- delete --}}
                                                                    <form action="{{route('admin.role.delete',$role -> id)}}" method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">حذف</button>
                                                                       </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions" style="margin-top: 50px;margin-right: 120px">
                        <button type="button" class="btn btn-warning mr-1"
                                onclick="history.back();">
                            <i class="ft-x"></i> تراجع
                        </button>
                    </div>

                </section>
            </div>
        </div>
    </div>

    <div class="left">
        @include('layouts.sidebar')
    </div>
    </div>

@stop
