        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><strong>RSL Monitoring Metro-E</strong></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                      </div>

                      <div class="clearfix"></div>
                      <div id="show_data">

                      @foreach($monitoring as $data)
                            @if($data == '5') 
                              $color = "#e10617";
                              $status = "High Alarm";
                            
                            @elseif($data == '4') 
                              $color = "#e8369f";
                              $status = "High Warning";
                            
                            @elseif($data == '3') 
                              $color = "#9715fe";
                              $status = "Low Alarm";
                            
                            @elseif($data == '2') 
                              $color = "#e30adc";
                              $status = "Low Warning";
                            
                            @elseif($data == '1') 
                              @php
                                $color = "#0bcb1a";
                                $status = "Normal";
                              @endphp
                              
                            
                            @else 
                              $color ="#8f9194";
                              $status = "No RSL";
                            @endif
                      
                        <div class='col-md-55'>
                            <div class='thumbnail' style='height: 100%; margin-bottom: 0px'>
                            <div class='col-xs-12 bottom'>
                              <div class='col-xs-12 col-sm-6'>
                                <p class='ratings' style='font-size:12px'>
                                  <b><?php //echo $data->ip_address ?></b>
                                </p>
                              </div>
                            </div>
                            <div class='col-sm-12'>
                              <div class='row'>
                                <div class='col-sm-3'>
                                  <b>ID</b>
                                </div>
                                <div class='col-sm-3'>
                                  <b>Interface</b>
                                </div>
                                <div class='col-sm-3'>
                                  <b>RSL</b>
                                </div>
                                <div class='col-sm-3'>
                                  <b>Status</b>
                                </div>
                              </div>
                              <div class='row'  style='background-color: <?php //echo $color; ?>;'>
                                <div class='col-sm-3'>
                                  <a href="javascript:;" style='color: white;' data="<?php //echo $data->id; ?>" id="row_rsl_id"><?php //echo $data->id ?></a>
                                </div>
                                <div class='col-sm-3' style='color: white;'>
                                  <?php //echo $data->interface ?>
                                </div>
                                <div class='col-sm-3' style='color: white;'>
                                  <?php //echo $data->rsl ?>
                                </div>
                                <div class='col-sm-3' style='color: white; font-size: 10px;'>
                                  <?php //echo $status ?>
                                </div>
                              </div>
                            </div>
                            <div class='col-xs-12 bottom text-left' style='padding: 9px; margin-bottom: -15px'>
                              <div class='col-xs-12 col-sm-12 emphasis'>
                                <p class='ratings' style='font-size:12px'>
                                  <b><?php //echo $data->hostname ?></b>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<!-- The modal -->
<div class="modal fade" id="ViewRslModal" tabindex="-1" role="dialog" aria-labelledby="modalLabelLarge" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
  <!-- MODAL HEADER -->
  <div class="modal-header" id="ViewRslModalHeader">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="pop_hostname_header"></h4>
    <h2 class="modal-title"></h2>
  </div>
  <!-- END MODAL HEADER -->

    <div class="modal-body">
      <div class="row">
        <div class="col-sm-4">
          <b>Posted on :</b>
          <i id="pop_posted_on"></i>
        </div>
      </div>
      <!-- TAB -->
      <div class="row" style="margin-top: 25px">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#tab_prob_detail">Information Detail</a></li>
        </ul>

        <div class="tab-content" style="margin-top: 25px">
          <div id="tab_prob_detail" class="tab-pane fade in active">
            <ul class="list-group col-md-6">
              <li class="list-group-item">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Interface</label>
                      <p id="pop_interface"></p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>IP Address</label>
                      <p id="pop_ip_address"></p>
                    </div>
                  </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Hostname</label>
                    <p id="pop_hostname"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Description</label>
                    <p id="pop_description"></p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>RSL</label>
                    <p id="pop_rsl"></p>
                  </div>
                </div>
              </div>
            </li>
            </ul>
            <ul class="list-group col-md-6">
              <li class="list-group-item">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Low Alarm Threshold</label>
                      <p id="pop_lat"></p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Low Warning Threshold</label>
                      <p id="pop_lwt"></p>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>High Warning Threshold</label>
                      <p id="pop_hwt"></p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>High Alarm Threshold</label>
                      <p id="pop_hat"></p>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div> 
      </div>
      <!-- END TAB -->

      <!-- GRAPH -->
      <div class="row">
        <div class="x_content">
          <canvas id="testgraph"></canvas>
        </div>
      </div>
      <!-- END GRAPH -->
    </div>

    <!-- MODAL FOOTER -->
    <div class="modal-footer">
      <div class="col-sm-2 pull-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-close">Close</button>
      </div>
    </div>
    <!-- END MODAL FOOTER -->
</div>
</div>
</div>