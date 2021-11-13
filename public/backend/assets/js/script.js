/*------------------------------------------------------------------
* Bootstrap Simple Admin Template
* Version: 3.0
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-------------------------------------------------------------------*/
(function() {
    'use strict';

    // Toggle sidebar on Menu button click
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
        $('#body').toggleClass('active');
    });

    // Auto-hide sidebar on window resize if window size is small
    // $(window).on('resize', function () {
    //     if ($(window).width() <= 768) {
    //         $('#sidebar, #body').addClass('active');
    //     }
    // });

    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        $('#jobList').DataTable(
            {
                responsive: true,
                pageLength: 10,
                lengthChange: false,
                searching: true,
                ordering: true
            }
        );
        $('#phone').change(function(){
            var x=$( this ).val();
            // alert(x);
            var regex=/^\+?([0-9]{9})$/;
            // var regex=/^[0-9]+$/;
            if (!x.match(regex))
            {
                // $('#err-alert').show("slow");
                // $(this).focus();
                $( this ).val('');
                return false;
            }else{
                // $('#err-alert').hide();
            }
        })
    });


})();

