<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>RSL History <small>List of all RSL from Metro-E devices</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <!--
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="<?php echo base_url('noc/tickets/create') ?>" disabled>Create Segment</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                      -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="well" style="overflow: auto">
                      <!--
                      <div class="col-md-4">
                        Time range
                        <form class="form-horizontal">
                          <fieldset>
                            <div class="control-group">
                              <div class="controls">
                                <div class="input-prepend input-group">
                                  <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                  <input type="text" name="reservation-time" id="reservation-time" class="form-control" value="01/01/2020 - 01/31/2020" />
                                </div>
                              </div>
                            </div>
                          </fieldset>
                        </form>
                      </div>
                      -->
                      <div class="col-md-4">
                        Select Site Name
                        <form class="form-horizontal">
                          <fieldset>
                            <div class="control-group">
                              <div class="controls">
                                <div class="input-prepend">
                                  <select class="js-example-basic-multiple form-control" multiple="multiple" id="site_name">
                                  </select>
                                </div>
                              </div>
                            </div>
                          </fieldset>
                        </form>
                      </div>
                      <div class="col-md-4">
                        Click
                        <form class="form-horizontal">
                          <fieldset>
                            <div class="control-group">
                              <div class="controls">
                                <div class="input-prepend input-group">
                                  <button type="button" class="btn btn-primary" id="btn-search">Search</button>
                                </div>
                              </div>
                            </div>
                          </fieldset>
                        </form>
                      </div>
                    </div>
                    <table id="mydata" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>IP Address</th>
                          <th>Hostname</th>
                          <th>Interface</th>
                          <th>RSL</th>
                          <th>Post Date</th>
                          <th>State</th>
                          <th></th>
                        </tr>
                      </thead>


                      <tbody id="show_data">
                      </tbody>
                    </table>
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