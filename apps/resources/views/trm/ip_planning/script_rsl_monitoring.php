<script type="text/javascript">

    $(document).ready(function(){
      $('#show_data').on('click','#row_rsl_id',function(){
        var ctx = document.getElementById("testgraph").getContext('2d');
        var id = $(this).attr('data');
        //var id = $('#row_ticket_id').text();
        $.ajax({
                type : "GET",
                url  : "<?php echo base_url('ip_planning/rsl/viewrsl')?>",
                dataType : "JSON",
                cache: false,
                data : {id:id},
                success: function(data){
                  $.each(data,function(id, ip_address, hostname, interface, description, rsl, thrs_high_alarm, thrs_high_warn, thrs_low_warn, thrs_low_alarm, state, post_date){
                    $('#ViewRslModal').modal('show');
                        if(data.state == '1') {
                          var mdlheaderbg = 'color:#fff; padding:9px 15px; border-bottom:1px solid #eee; background-color:  #0bcb1a; -webkit-border-top-left-radius: 5px; -webkit-border-top-right-radius: 5px; -moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px; border-top-left-radius: 5px; border-top-right-radius: 5px;';
                          $('#ViewRslModalHeader').attr("style", mdlheaderbg);

                        }
                        else if(data.state == '2') {
                          var mdlheaderbg = 'color:#fff; padding:9px 15px; border-bottom:1px solid #eee; background-color:  #e30adc; -webkit-border-top-left-radius: 5px; -webkit-border-top-right-radius: 5px; -moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px; border-top-left-radius: 5px; border-top-right-radius: 5px;';
                          $('#ViewRslModalHeader').attr("style", mdlheaderbg);

                        }
                        else if(data.state == '3') {
                          var mdlheaderbg = 'color:#fff; padding:9px 15px; border-bottom:1px solid #eee; background-color:   #9715fe; -webkit-border-top-left-radius: 5px; -webkit-border-top-right-radius: 5px; -moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px; border-top-left-radius: 5px; border-top-right-radius: 5px;';
                          $('#ViewRslModalHeader').attr("style", mdlheaderbg);

                        }
                        else if(data.state == '4') {
                          var mdlheaderbg = 'color:#fff; padding:9px 15px; border-bottom:1px solid #eee; background-color:  #e8369f; -webkit-border-top-left-radius: 5px; -webkit-border-top-right-radius: 5px; -moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px; border-top-left-radius: 5px; border-top-right-radius: 5px;';
                          $('#ViewRslModalHeader').attr("style", mdlheaderbg);

                        }
                        else if(data.state == '0') {
                          var mdlheaderbg = 'color:#fff; padding:9px 15px; border-bottom:1px solid #eee; background-color:  #8f9194; -webkit-border-top-left-radius: 5px; -webkit-border-top-right-radius: 5px; -moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px; border-top-left-radius: 5px; border-top-right-radius: 5px;';
                          $('#ViewRslModalHeader').attr("style", mdlheaderbg);
                        }
                        else {
                          var mdlheaderbg = 'color:#fff; padding:9px 15px; border-bottom:1px solid #eee; background-color: #e10617; -webkit-border-top-left-radius: 5px; -webkit-border-top-right-radius: 5px; -moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px; border-top-left-radius: 5px; border-top-right-radius: 5px;';
                          $('#ViewRslModalHeader').attr("style", mdlheaderbg);

                        }
                    $('#pop_hostname_header').text(data.hostname);
                    $('#pop_posted_on').text(data.post_date);
                    $('#pop_interface').text(data.interface);
                    $('#pop_ip_address').text(data.ip_address);
                    $('#pop_hostname').text(data.hostname);
                    $('#pop_description').text(data.description);
                    $('#pop_rsl').text(data.rsl);
                    $('#pop_lat').text(data.thrs_low_alarm);
                    $('#pop_lwt').text(data.thrs_low_warn);
                    $('#pop_hwt').text(data.thrs_high_warn);
                    $('#pop_hat').text(data.thrs_high_alarm);

                  });

                            $.ajax({
                              type: "GET",
                              url: "<?php echo base_url('ip_planning/rsl/viewrslgraph')?>",
                              data: {ip_address: data.ip_address, interface: data.interface},
                              cache: false,
                              success: function(data) {
                                $.each(data, function (index,item) {
                                  var labels = data.map(function(e) {
                                    return e.post_date;
                                  });
                                  var rsl = data.map(function(e) {
                                    return e.rsl;
                                  });
                                  //CHART
                                  var myLineChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                          labels: labels,
                                          datasets: [{
                                            label: 'rsl',
                                            data: rsl,
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 3
                                          }]
                                        },
                                        /*
                                        options: {
                                          scales: {
                                            yAxes: [{
                                              ticks: {
                                                beginAtZero:true
                                              }
                                            }]
                                          }
                                        }
                                        */
                                      });
                                      //END CHART
                                });
                                      
                              }//END success
                            }); //END AJAX CHART
                            
                }//End Success


        });//End Ajax
          
        

        });
        });
</script>