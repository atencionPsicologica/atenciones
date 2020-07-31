$(document).ready(function(){
    $('#CalendarioWeb').fullCalendar({
        header:{
            left: 'today,prev,next',
            center: 'title',
            right: 'month,basicWeek,basicDay,agendaWeek,agendaDay'
        },
        /*
        dayClick:function(date, jsEvent, view){
            $('#exampleModal').modal();
        },
        */
       events: 'http://localhost/atenciones/consultas.php',
       /*
        eventSources: [{
            events: [
                {
                    //id: '',
                    title:'Consulta #1',
                    diagnostico: "x",
                    prescripcion: "y",
                    enfactual: "z",
                    start:'2020-07-05',
                    end:'2020-07-07',
    
                },
                {
                    //id: '',
                    title:'Consulta #2',
                    diagnostico: "x",
                    prescripcion: "y",
                    enfactual: "z",
                    start:'2020-07-10',
                    end:'2020-07-12',
    
                }
            ],
            color:"blue",
            textColor: "white"
        }],
        */
        eventClick:function(calEvent, jsEvent, view){
            $('#tituloConsulta').html(calEvent.title);
            $('#diagnosticoConsulta').html(calEvent.diagnostico);
            $('#enfactualConsulta').html(calEvent.enfactual);
            $('#prescripcionConsulta').html(calEvent.prescripcion);
            $('#exampleModal').modal();
        }

    });
});