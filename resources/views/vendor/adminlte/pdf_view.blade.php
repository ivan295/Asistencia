<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte del Registro de Asistencia</title>
    <style>
        body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        /*background: #FFFFFF; */
        font-family: Arial, sans-serif; 
        font-size: 14px;
        /*font-family: SourceSansPro;*/
        }
        section{
        clear: left;
        }
        #fac, #fv, #fa{
        color: #FFFFFF;
        /* font-size: 15px; */
        }
        #facvendedor{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }
        #facvendedor thead{
        padding: 20px;
        background: #2183E3;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;  
        }
         #alineado{
          text-align: center;
        }
        
        #borde {
          border-collapse: collapse;
          border:  1px solid black ;
        }

        .encabezado{
            display: flex;
        }

    </style>
</head>

<body>
  
    <div class="encabezado">
        <div class="img">
            <img src="../img/woman.png" width="100px" height="50px"/>
        </div>
        <div class="fechas" style="text-aling:center;">
        <p>Registro de asistencia desde : <?php echo $fdesde ?> Hasta: <?php echo $fhasta ?></p>  
    </div>
  </div>
<div>
  <section>
    <table >
      <thead>
        <tr >
            <th>Fecha</th>
            <th>Hora de ingreso</th>
            <th>Modalidad de trabajo</th>
            <th>Hora de salida a descanso</th>
            <th>Hora de Reanudación de jornada</th>
            <th>Modalidad de trabajo</th>
            <th>Hora de Salida</th>
        </tr>
      </thead>
    <tbody>
      
    @foreach($data as $fdata)
      <tr id="">
        <td id="borde">{{$fdata->fecha}}</td>     
        <td id="borde">{{$fdata->hora_ingreso}}</td> 
        <td id="borde">{{$fdata->modalidad_ingreso}}</td>
        <!-- ---------hora descanso----------- -->
        @if($fdata->hora_descanso != '')
        <td id="borde">{{$fdata->hora_descanso}}</td>
        @else
        <td id="borde">Sin registro</td>
        @endif
        <!-- ---------------------------------------- -->
        <!-- ---------------hora reanudacion------------------- -->
        @if($fdata->hora_reanudacion != '')
        <td id="borde">{{$fdata->hora_reanudacion}}</td>
        @else
        <td id="borde">Sin registro</td>
        @endif
        <!-- ------------------------------------------------ -->
        <td id="borde">{{$fdata->modalidad_reanudacion}}</td>
        <!-- -----------------hora de salida----------------- -->
        @if($fdata->hora_salida != '')
        <td id="borde">{{$fdata->hora_salida}}</td>
        @else
        <td id="borde">Sin registro</td>
        @endif
        <!-- ------------------------------------------------ -->
      </tr>
    @endforeach

    </tbody>
    </table>
  </section>
</div>

    
</body>
</html>