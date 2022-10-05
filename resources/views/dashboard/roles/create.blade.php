@extends('layouts.app')
@section('content')
    <div class="template" style="display: flex;flex-direction: row-reverse">
        {{-- right side --}}

    <div class="app-content content " style="width: 70%;margin-right: 50px;">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"> /<a href="">
                                        الأدوار </a>
                                </li>
                                <li class="breadcrumb-item active"> اضافة دور
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> اضافة دور جديد </h4>
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
                                    <div class="card-body">
                                        <form class="form"
                                              action="{{route('admin.role.store')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> البيانات الاساسية للأدوار </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group" style="margin-top: 20px;margin-bottom: 50px">
                                                            <label for="projectinput1"> اسم الدور
                                                            </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('name')}}"
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <h4>الصلاحيات</h4>

                                                            {{-- <div class="row" style="margin-top: 50px;">
                                                                @foreach (config('globalRoles.permissions') as $name => $value)
                                                                    <div class="form-group col-sm-4">
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" class="chk-box" name="permissions[]" value="{{ $name }}">  {{ $value }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div> --}}
                                                            <div class="row" style="margin-top: 50px;">
                                                                @foreach ($permissions as $permission)
                                                                    <div class="form-group col-sm-4">
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" class="chk-box" name="permissions[]" value="{{ $permission }}">  {{ $permission }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            @error('permissions')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                            </div>
                                            <div class="form-actions" style="margin-top: 50px;margin-right: 120px">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> حفظ
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

    {{-- left side --}}

    <div>
        @include('layouts.sidebar')

    </div>

</div>


@stop

@section('script')

    <script>
        $('input:radio[name="type"]').change(
            function(){
                if (this.checked && this.value == '2') {  // 1 if main cat - 2 if sub cat
                    $('#cats_list').removeClass('hidden');
                }else{
                    $('#cats_list').addClass('hidden');
                }
            });




    </script>
    @stop
