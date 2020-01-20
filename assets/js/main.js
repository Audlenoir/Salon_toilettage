
/***** Import calendar *****/



$(function() {
  
    $( document ).ready(function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
          defaultView: 'dayGridMonth',
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
          },
          selectable: true,
          select: function(selection) {
            $.ajax({
              url: 'inc/fixerRdv.php', 
              data: {
                'date_rdv':selection.startStr
              },
              type: "POST",
              success: function(data) {
                console.log(data);
                //console.log(JSON.parse(data).id);
                if(JSON.parse(data).id)
                {
                  alert ('Votre rendez-vous est bien enregistré')
                } else {
                  alert('Une erreur est survenue merci de recommancer')
                }
              }
            });
            /*
              calendar.fullcalendar('renderEvent', 
              {
                date_rdv: date_rdv, 
             
              }, 
              true
              );
              }
                calendar.fullcalendar('unselect');
              },
            */
          },          
          events: [
            {
              title: 'All Day Event',
              start: '2019-11-01'
            },
            {
              title: 'Long Event',
              start: '2019-11-07',
              end: '2019-11-10'
            },
            {
              groupId: '999',
              title: 'Repeating Event',
              start: '2019-11-09T16:00:00'
            },
            {
              groupId: '999',
              title: 'Repeating Event',
              start: '2019-11-16T16:00:00'
            },
            {
              title: 'Conference',
              start: '2019-11-11',
              end: '2019-11-13'
            },
            {
              title: 'Meeting',
              start: '2019-11-12T10:30:00',
              end: '2019-11-12T12:30:00'
            },
            {
              title: 'Lunch',
              start: '2019-11-12T12:00:00'
            },
            {
              title: 'Meeting',
              start: '2019-11-12T14:30:00'
            },
            {
              title: 'Birthday Party',
              start: '2019-11-13T07:00:00'
            },
            {
              title: 'Click for Google',
              url: 'http://google.com/',
              start: '2019-11-28'
            }
          ]
        });
      
        calendar.render();
      });
  });