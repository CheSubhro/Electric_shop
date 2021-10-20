<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-body">
				<?php if($this->session->flashdata('success')!=''){?>
				<center>
				<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong><?php echo @$this->session->flashdata('success');?></strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				</center>
				<?php }?>
				<?php if($this->session->flashdata('error')!=''){?>
				<center>
				<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong><?php echo @$this->session->flashdata('error');?></strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				</center>
				<?php }?>
				<div class="template-demo">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
							<li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home" style="text-decoration: none">Home</a></li>
				            <li class="breadcrumb-item"><a href="javascript:void(0)" style="text-decoration: none">Product</a></li>
				            <li class="breadcrumb-item active" aria-current="page"><span>All Product</span></li>
						</ol>
					</nav>
				</div>
				<a href="<?php echo base_url();?>superpanel/product/add"><button type="button" class="btn btn-outline-success btn-sm" id="add_new">Add New</button></a>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">product</h4>
				<div class="row">
					<div class="table-responsive">
						<table id="order-listing" class="table">
							<thead>
								<tr class="bg-primary text-white">
									<th><b>Sl No.</b></th>
					                <th><b>Category Name</b></th>
					                <th><b>Product Name</b></th>
					                <th><b>Image</b></th>
					                <th><b>Stock</b></th>
					                <th><b>Status</b></th>
					                <th><b>View</b></th>
					                <th><b>Action</b></th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ($product as $c){ 
									$category=$this->General_model->show_data_id('category',$c->category_id,'category_id','get',''); ?>
								<tr>
									<td><?= $i;?></td>
                    				<td><?php if($c->category_id=='0')
					                    { echo "<div style='color:green'> No Category</div>";}else if($category){
					                      echo $category[0]->category_name;
					                    }else{ echo "<div style='color:red'>Category Deleted</div>"  ;}?>
                                    </td>
                    				<td><?= $c->product_name;?></td>
                    				<td><img src="<?= $c->product_img;?>"alt="<?= $c->product_img;?>" class="img-lg rounded" style="width:160px;height:100px;"></td>
									<td><?php if($c->stock==1){?><label class="badge badge-success">In Stock</label><?php }else if($c->stock==0){?><label class="badge badge-danger">Out Of Stock</label><?php }?></td> 
                    				<td><?php if($c->status==1){?><label class="badge badge-success">Active</label><?php }else if($c->status==0){?><label class="badge badge-danger">Deactive</label><?php }?></td> 
									<td><button class="btn btn-outline-primary" data-toggle="modal" data-target="#customerModal<?php echo $i ;?>">View</button></td>
									<td>
										<a href="<?= base_url();?>superpanel/product/edit/<?=$c->id;?>"><button type="button" class="btn btn-outline-primary btn-sm">Edit</button></a>
										<a href="<?php echo base_url();?>superpanel/product/delete_product/<?php echo $c->id?>" onclick="return confirm('Are you sure about this delete?');"><button type="button" class="btn btn-danger btn-sm">Delete</button>
                                  </a>
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

<?php $i=1; foreach ($product as $c){?>
<div class="modal fade" id="customerModal<?php echo $i ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
 	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel"><strong>View Product</strong></h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        		<span aria-hidden="true">&times;</span>
		        	</button>
      		</div>
      		<div class="modal-body">
        		<div class="row center-block">
          			<div class="col-md-12">
            			<div class="form-group row">
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Slug</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$c->slug?></div>
	                            </div>
              				</div>
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Description</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$c->product_description ?></div>
	                            </div>
              				</div>
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Video</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$c->video?></div>
	                            </div>
              				</div>

              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Quantity</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$c->quantity?></div>
	                            </div>
              				</div>
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Color</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$c->color?></div>
	                            </div>
              				</div>
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Price</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$c->price?></div>
	                            </div>
              				</div>
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Sales Price</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$c->sales_price?></div>
	                            </div>
              				</div>
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Shipping Charge</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$c->shipping_charge ?></div>
	                            </div>
              				</div>
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Taxes</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$c->taxes ?></div>
	                            </div>
              				</div>
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Meta keyword</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?=$c->meta_keyword ?></div>
	                            </div>
              				</div>
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"><b>Meta Description</b></label>
	                            <div class="col-sm-9">
	                                <div class="form-control"><?= $c->meta_description?></div>
	                            </div>
              				</div>
              				<div class="col-md-6">
              					<label class="col-sm-3 col-form-label"></label>
              					<div class="col-sm-9">
              						<?php if($c->featured==1){?><label class="badge badge-success">Featured</label><?php }else if($c->featured==0){?><label class="badge badge-danger">Non Featured</label><?php }?>
              					</div>
              				</div>
              				<!-- <div class="col-md-6">
              					<label class="col-sm-3 col-form-label"></label>
              					<div class="col-sm-9">
              						<?php if($c->stock==1){?><label class="badge badge-success">In Stock</label><?php }else if($c->stock==0){?><label class="badge badge-danger">Out Of Stock</label><?php }?>
              					</div>
              				</div> -->
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