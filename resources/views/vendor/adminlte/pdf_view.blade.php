<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte del Registro de Asistencia</title>
        <!-- ------------- estilos ------------ -->
    <style>
    body {
        font-family: Arial, sans-serif;
        font-size: 15px;
    }

    #borde {
        border-collapse: collapse;
        border: 1px solid black;
    }

    footer {
        position: fixed;
        left: 0px;
        bottom: -50px;
        right: 0px;
        height: 40px;
    }

    footer .page:after {
        content: counter(page);
    }

    footer table {
        width: 100%;
    }

    footer p {
        text-align: right;
    }

    .fecha {
        padding-left: 250px;
        padding-bottom: 0px;
    }

    .fecha h2 {
        padding-top: 0px;
        padding-left: 230px;
    }

    .enc {
        padding-right: 50px;
        font-size: 18px;
    }

    .na-ci {
        font-size: 18px;

    }
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;

    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #4CAF50;
        color: white;
    }
    </style>
    <!-- ---------------- fin estilos ------------------ -->
</head>
<body>

    <?php 
function convertir ($fecha) {
    $fecha = substr($fecha, 0, 10);
    $numeroDia = date('d', strtotime($fecha));
    $dia = date('l', strtotime($fecha));
    $mes = date('F', strtotime($fecha));
    $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
    $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
    $nombredia = str_replace($dias_EN, $dias_ES, $dia);
    $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
    return $nombredia." ".$numeroDia." de ".$nombreMes;
  }
  $aux= 0;
?>
    @foreach($data as $infofun)
    @if($aux == 0)
    <table>
        <thead>
            <tr>
                <th rowspan="3" width="250px"><img src="{{public_path('img/logoGAD2.png')}}" alt="logo"></th>
                <th class="enc" width="720px">
                    <h2>Registro de asistencia</h2>Desde : <?php echo convertir($fdesde) ?> -- Hasta:
                    <?php echo convertir($fhasta) ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th id="" class="na-ci" width="720px">{{$infofun->nombre}}
                    {{$infofun->apellido}} </th>
            </tr>
            <tr>
                <th id="">{{$infofun->cedula}}</th>
            </tr>
        </tbody>
    </table>
    <?php $aux++;?>
    @endif
    @endforeach
    <div>
        <section>
            <table id="customers">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora de ingreso</th>
                        <th>Modalidad de trabajo</th>
                        <th>Lugar de marcación</th>
                        <th>Hora de salida a descanso</th>
                        <th>Lugar de marcación</th>
                        <th>Hora de Reanudación de jornada</th>
                        <th>Modalidad de trabajo</th>
                        <th>Lugar de marcación</th>
                        <th>Hora de Salida</th>
                        <th>Lugar de marcación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $fdata)
                    <tr>
                        <td>{{convertir($fdata->fecha)}}</td>
                        <td>{{$fdata->hora_ingreso}}</td>
                        <td>{{$fdata->modalidad_ingreso}}</td>
                        <td>mercado municipal</td>
                        <!-- ---------hora descanso-----------  -->
                        @if($fdata->hora_descanso != '')
                        <td>{{$fdata->hora_descanso}}</td>
                        <td>palacio municipal</td>
                        @else
                        <td>Sin registro</td>
                        @endif
                        <!-- ----------------------------------------  -->
                        <!-- ---------------hora reanudacion------------------- -->
                        @if($fdata->hora_reanudacion != '')
                        <td>{{$fdata->hora_reanudacion}}</td>
                        @else
                        <td>Sin registro</td>
                        @endif
                        <!-- ------------------------------------------------  -->
                        <td>{{$fdata->modalidad_reanudacion}}</td>
                        <td>camal municipal</td>
                        <!-- -----------------hora de salida-----------------  -->
                        @if($fdata->hora_salida != '')
                        <td>{{$fdata->hora_salida}}</td>
                        <td>biblioteca municipal</td>
                        @else
                        <td>Sin registro</td>
                        @endif
                        <!-- ------------------------------------------------ -->
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </section>
    </div>
    <footer>
        <table>
            <tr>
                <td>
                    <p class="page">
                        Página
                    </p>
                </td>
            </tr>
        </table>
    </footer>
</body>

</html>