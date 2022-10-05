@extends('layouts.app')
@section('content')
    <div class="template" style="display: flex;flex-direction: row-reverse">
        {{-- right side --}}

        <div class="app-content content " style="width: 70%;margin-right: 50px;">
            <div class="images" style="display: flex;flex-direction: column">
                <div>
                    <h2 style="text-align: center;margin-bottom: 50px">تكنو مصر</h2>
                </div>
                <div>
                    <img src="{{ asset('assets/images/0x0.jpg') }}" alt="no image" width="70%" style="margin-bottom: 50px">
                </div>
                <div>
                    <img src="{{ asset('assets/images/coolest-cars-feature.jpg') }}" width="70%" alt="no image">
                </div>



            </div>


        </div>

    {{-- left side --}}

    <div>
        @include('layouts.sidebar')

    </div>

</div>


@stop

