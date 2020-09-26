$(document).ready(function () {
    $('#manageTable').DataTable({
        pageLength: 10,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [

            {extend: 'excel'},
            {extend: 'print',
                customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ],
    });

    $('#description').summernote({height:150});

    $('#select1').select2();
    $('#datetimepicker').datetimepicker({
        step: 5,
    });
    $('#durationtimepicker').datetimepicker({
        datepicker:false,
        format:'H:i',
        step: 5,

    });

    $('#slotDuration0').datetimepicker({
        datepicker: false,
        format: 'H:i',
        step: 5,
    });
    $('#reOpentimepicker').datetimepicker({
        step: 5,
    });


    setTimeout(function() {
        $('.flash-message').fadeOut('fast');
    }, 1000);
})