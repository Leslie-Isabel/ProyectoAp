<div class="card-body table-responsive p-0">

    @if (count($PendingAppoiments)>= 1)
    <table class="table table-hover text-nowrap">
        <thead>
            <tr>

                <th>Descripcion</th>
                <th>Especialidad</th>
                @hasrole('medico')
                <th>Paciente</th>
                @endhasrole
                @hasrole('paciente')
                <th>Medico</th>
                @endhasrole
                <th>Fecha</th>
                <th>Hora</th>
                <th>Tipo</th>
                <th>Accion</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($PendingAppoiments as $appoiment)
            <tr>

                <td>{{$appoiment->description}}</td>
                <td>{{$appoiment->specialty->name}}</td>
                @hasrole('medico')
                <td>{{$appoiment->patient->last_name}}</td>
                @endhasrole
                @hasrole('paciente')
                <td>{{$appoiment->doctor->last_name}}</td>
                @endhasrole
                <td>{{$appoiment->scheduled_date}}</td>
                <td>{{$appoiment->scheduled_time_12}}</td>
                <td>{{$appoiment->type}}</td>


                <td>
                    <a href="{{route('appoiment.postcancel',$appoiment->id)}}" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" title="cancelar cita"> <i class="far fa-calendar-times"></i> </a>

                    @hasanyrole('medico|admin')
                    <form action="#" method="POST" class="d-inline-block">
                        @csrf

                        <button class="btn btn-sm btn-outline-success" type="submit" data-toggle="tooltip" title="Confirmar cita">
                            <i class="ni ni-check-bold"></i>
                        </button>
                    </form>
                    @endhasanyrole
                </td>




            </tr>
            @endforeach


        </tbody>


    </table>

    @else
    <div class="col-md-12 text-center">
        <h1>Aun no existen citas pendientes</h1>
    </div>

    @endif

</div>
<div class="card-body">
    {{$PendingAppoiments->links()}}
</div>
