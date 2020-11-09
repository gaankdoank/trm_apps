<?php $isadmin = $this->session->userdata('isadmin'); ?>
<script type="text/javascript">
    $(document).ready(function(){
      // DATA TABLES SERVER-SIDE PROCESSING
      /*
        var table;
        
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
          return {
              "iStart": oSettings._iDisplayStart,
              "iEnd": oSettings.fnDisplayEnd(),
              "iLength": oSettings._iDisplayLength,
              "iTotal": oSettings.fnRecordsTotal(),
              "iFilteredTotal": oSettings.fnRecordsDisplay(),
              "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
              "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
          };
        };
        
        table = $("#mydata").DataTable({
          initComplete: function() {
            var api = this.api();
          },
          oLanguage: {
              sProcessing: "loading..."
          },
          processing: true,
          serverSide: true,
          pageLength:10,
          ajax: {
            "url": "<?php echo base_url('ip_planning/rsl/listrsl')?>", 
            "type": "POST"
          },
          columns: [
              {
                "data": "id",
                render : function(data, type, row) {
                  return '<a href="javascript:;" data="'+data+'" id="row_rsl_id" data-toggle="modal tooltip">'+data+'</a>'
                }
              },
              {"data": "ip_address"},
              {"data": "hostname"},
              {"data": "interface"},
              {"data": "rsl"},
              {"data": "post_date"},
              {
                "data": "state",
                render : function(data, type, row) {
                  if(data == '5') {
                    return '<span class="label label-high">High Alarm</span>';
                  }
                  else if(data == '4') {
                    return '<span class="label label-high-warn">High Warning</span>';
                  }
                  else if(data == '3') {
                    return '<span class="label label-low">Low Alarm</span>';
                  }
                  else if(data == '2') {
                    return '<span class="label label-low-warn">Low Warning</span>';
                  }
                  else if(data == '1') {
                    return '<span class="label label-success">Normal</span>';
                  }
                  else {
                    return '<span class="label label-default">NO RSL</span>';
                  }
                }
              },
            {
              "data": "view"
            }
          ],
          order: [[0, 'desc']],
          dom: 'Bfrtip',
          buttons: [ 'print', 'csv' ],
          rowCallback: function(row, data, iDisplayIndex) {
              var info = this.fnPagingInfo();
              var page = info.iPage;
              var length = info.iLength;
              $('td:eq(0)', row).html();
          }
        });
        */
      //END DATA_TABLES

      //POP UP
      $('#show_data').on('click','#row_rsl_id',function(){
        var ctx = document.getElementById("testgraph").getContext('2d');
        var id = $(this).attr('data');
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
      //END POP UP
      
      $('.js-example-basic-multiple').select2({
        ajax: {
          url: '<?php echo base_url('ip_planning/rsl/getsitename'); ?>',
           type: "post",
           dataType: 'json',
           delay: 250,
           
           data: function (params) {
              return {
                searchTerm: params.term // search term
              };
           },
           
           processResults: function (data) {

              return {
                 results: data
              };
           },
           cache: false
        }
      });

      $('#btn-search').on('click', function() {
        $('#mydata').DataTable().clear().destroy();
        GetFilter();
      });

      function GetFilter() {
        // DATA TABLES SERVER-SIDE PROCESSING
        var table;
        var site_name = $('#site_name').val();

        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
          return {
              "iStart": oSettings._iDisplayStart,
              "iEnd": oSettings.fnDisplayEnd(),
              "iLength": oSettings._iDisplayLength,
              "iTotal": oSettings.fnRecordsTotal(),
              "iFilteredTotal": oSettings.fnRecordsDisplay(),
              "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
              "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
          };
        };
        table = $("#mydata").DataTable({
          initComplete: function() {
            var api = this.api();
          },
          oLanguage: {
              sProcessing: "loading..."
          },
          processing: true,
          serverSide: true,
          pageLength:10,
          ajax: {
            "url": "<?php echo base_url('ip_planning/rsl/getfilter')?>",
            "type": "POST",
            "data": {site_name : site_name.toString()}
          },
          columns: [
              {
                "data": "id",
                render : function(data, type, row) {
                  return '<a href="javascript:;" data="'+data+'" id="row_rsl_id" data-toggle="modal tooltip">'+data+'</a>'
                }
              },
              {"data": "ip_address"},
              {"data": "hostname"},
              {"data": "interface"},
              {"data": "rsl"},
              {"data": "post_date"},
              {
                "data": "state",
                render : function(data, type, row) {
                  if(data == '5') {
                    return '<span class="label label-high">High Alarm</span>';
                  }
                  else if(data == '4') {
                    return '<span class="label label-high-warn">High Warning</span>';
                  }
                  else if(data == '3') {
                    return '<span class="label label-low">Low Alarm</span>';
                  }
                  else if(data == '2') {
                    return '<span class="label label-low-warn">Low Warning</span>';
                  }
                  else if(data == '1') {
                    return '<span class="label label-success">Normal</span>';
                  }
                  else {
                    return '<span class="label label-default">NO RSL</span>';
                  }
                }
              },
            {
              "data": "view"
            }
          ],
          order: [[0, 'desc']],
          dom: 'Bfrtip',
          buttons: [ 'print', 'csv' ],
          rowCallback: function(row, data, iDisplayIndex) {
              var info = this.fnPagingInfo();
              var page = info.iPage;
              var length = info.iLength;
              $('td:eq(0)', row).html();
          }
        });
      //END DATA_TABLES
      }

    });
</script>