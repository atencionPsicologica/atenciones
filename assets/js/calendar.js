$(document).ready(function(){
    $('#CalendarioWeb').fullCalendar({
        header:{
            left: 'today,prev,next',
            center: 'title',
            right: 'month,basicWeek,basicDay,agendaWeek,agendaDay'
        },

        dayClick:function(date, jsEvent, view){
            $('#exampleModal').modal();
        }

    });
});