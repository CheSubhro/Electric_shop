            <div class="main-panel">
              <div class="content-wrapper">

              <div class="card">
                <div class="card-body">
                  <div class="template-demo">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
                        <li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Manage User</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>All Customer</span></li>
                      </ol>
                    </nav>
                  </div>
                </div>
              </div>
                      
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Customer</h4>
                     <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr class="bg-primary text-white">
                                <th><b>Slno.</b></th>
                                <th><b>Customer Full Name</b></th>
                                <th><b>Email ID</b></th>
                                <th><b>Phone No</b></th>
                                <th><b>Actions</b></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=1; foreach ($customer as $c){?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $c->customer_fullname;?></td>
                                <td><?php echo $c->email;?></td>
                                <td><?php echo $c->phone_no;?></td>
                                <td>
                                  <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $i ;?>">View</button>
                                </td>
                            </tr>
                            <?php $i++; }?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <!-- content-wrapper ends -->

              <!-- Modal starts -->
              <?php $i=1; foreach ($customer as $c){?>
                  <div class="modal fade" id="exampleModal<?php echo $i ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>View customer</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="row center-block">
                              <div class="col-md-12">

                                  <div class="form-group row">

                                      <div class="col-sm-3">
                                        <label for="customer First Name"><b>customer Full Name:</b></label>
                                        <input type="text" class="form-control" disabled="" value="<?php echo $c->customer_fullname ?>">
                                      </div>

                                      <div class="col-sm-3">
                                        <label for="customer Email Id"><b>customer Email Id:</b></label>
                                        <input type="text" class="form-control" disabled="" value="<?php echo $c->email ?>">
                                      </div>

                                      <div class="col-sm-3">
                                        <label for="customer Password"><b>customer Password:</b></label>
                                        <input type="text" class="form-control" disabled="" value="<?php echo $c->password ?>">
                                      </div>

                                      <div class="col-sm-3">
                                        <label for="customer Phone No"><b>customer Phone No:</b></label>
                                        <input type="text" class="form-control" disabled="" value="<?php echo $c->phone_no ?>">
                                      </div>
                                      
                                  </div>
                              </div>

                              <div class="col-md-12">

                                  <div class="form-group row">

                                      <div class="col-sm-3">
                                        <label for="customer Location"><b>customer Gender:</b></label>
                                        <input type="text" class="form-control" disabled="" value="<?php echo $c->gender ?>">
                                      </div>

                                      <div class="col-sm-3">
                                        <label for="customer Location"><b>customer Wine Interest:</b></label>
                                        <input type="text" class="form-control" disabled="" value="<?php echo $c->wine_interest ?>">
                                      </div>

                                      <div class="col-sm-3">
                                        <label for="customer Email Verification"><b>customer Email Verification:</b></label>
                                        <input type="text" class="form-control" disabled="" value="<?php echo $c->email_verification ?>">
                                      </div>

                                      <div class="col-sm-3">
                                        <label for="customer Registration Date"><b>customer Registration Date:</b></label>
                                        <input type="text" class="form-control" disabled="" value="<?php echo $c->reg_date ?>">
                                      </div>
    
                                  </div>
                              </div>

                             </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php $i++; }?>
            