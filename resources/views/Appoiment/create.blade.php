@extends('layouts.dashboard')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Registrar nueva cita</h3>
            </div>

        </div>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('appoiment.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="description">Descripción</label>
                <input name="description" value="{{ old('description') }}" id="description" type="text" class="form-control" placeholder="Describe brevemente la consulta" required>
            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="specialty">Especialidad</label>
                    <select name="specialty_id" id="specialty" class="form-control" required>
                        <option value="">Seleccionar especialidad</option>
                        @foreach ($specialties as $specialty)
                        <option value="{{ $specialty->id }}" @if(old('specialty_id')==$specialty->id) selected @endif>{{ $specialty->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Médico</label>
                    <select name="doctor_id" id="doctor" class="form-control" required>
                        {{--@foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}" @if(old('doctor_id')==$doctor->id) selected @endif>{{ $doctor->name }}</option>
                        @endforeach--}}
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="date">Fecha</label>
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input class="form-control datepicker" placeholder="Seleccionar fecha" id="date" name="scheduled_date" type="text" value="{{ old('scheduled_date', date('Y-m-d')) }}" data-date-format="yyyy-mm-dd" data-date-start-date="{{ date('Y-m-d') }}" data-date-end-date="+30d">
                </div>
            </div>
            <div class="form-group">
                <label for="address">Hora de atención</label>
                <div id="hours">

                </div>
            </div>
            <div class="form-group">
                <label for="type">Tipo de consulta</label>
                <div class="custom-control custom-radio mb-3">
                    <input name="type" class="custom-control-input" id="type1" type="radio" @if(old('type', 'Consulta' )=='Consulta' ) checked @endif value="Consulta">
                    <label class="custom-control-label" for="type1">Consulta</label>
                </div>
                <div class="custom-control custom-radio mb-3">
                    <input name="type" class="custom-control-input" id="type2" type="radio" @if(old('type')=='Examen' ) checked @endif value="Examen">
                    <label class="custom-control-label" for="type2">Examen</label>
                </div>
                <div class="custom-control custom-radio mb-3">
                    <input name="type" class="custom-control-input" id="type3" type="radio" @if(old('type')=='Operación' ) checked @endif value="Operación">
                    <label class="custom-control-label" for="type3">Operación</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
        </form>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('dists/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{asset('js/appoiments/create.js')}}"></script>
@endsection
