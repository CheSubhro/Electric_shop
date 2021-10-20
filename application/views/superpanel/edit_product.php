<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-body">
				<div class="template-demo">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
							<li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home" style="text-decoration: none">Home</a></li>
				            <li class="breadcrumb-item"><a href="javascript:void(0)" style="text-decoration: none">Product</a></li>
				            <li class="breadcrumb-item active" aria-current="page"><span>All Product</span></li>
						</ol>
					</nav>
				</div>&nbsp;
				<h1 class="card-title alert alert-success text-center" align="center"><b>Update Product</b></h1>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<form class="forms-sample" method="post" enctype="multipart/form-data"  action="<?= base_url();?>superpanel/product/update/<?= $product[0]->id;?>">
							
							<div class="form-group">
			                    <label for="exampleSelectSuccess"><b>Select Category<em style="color:red">*</em>:</b></label>
			                    <select class="js-example-basic-single" style="width:100%" name="category_id">
			                      <?php foreach($product as $c1){?>
			                        <option value="<?=$c1->category_id?>" readonly><?php echo $c1->category_id;?> 
			                      <?php }?>
			                    </select>
		                    </div>
							<div class="form-group">
				            	<label for="Page Name"><b>Product Code:</b></label>
            					<input type="text" class="form-control"  value="<?= $product[0]->product_code?>" name="product_code">
				          	</div>
					        <div class="form-group">
					            <label for="Page Title"><b>Product Name:</b></label>
            					<input type="text" class="form-control"  value="<?= $product[0]->product_name?>" name="product_name">
					        </div>
					        <div class="form-group">
					            <label for="Slug"><b>Slug:</b></label>
            					<input type="text" class="form-control" id="category_slug" value="<?= $product[0]->product_name?>" name="slug" readonly>
					        </div>
					        <div class="form-group">
				            	<label for="tinyMceExample"><b>Product Description:</b></label>
            					<textarea id='tinyMceExample'  name="product_description" ><?= $product[0]->product_description?></textarea>
				            </div>
				            <div class="form-group">
				            	<label for="Category Image"><b>Image:</b></label>
				            	<div class="row">
					              <div class="col-sm-6">
					                <img src="<?= $product[0]->product_img?>"class="img-lg rounded" style="width:160px;height:150px;">
					              </div>
					              <div class="col-sm-6">
					                <input type="file" class="dropify" name="product_img" data-height="150" />
					              </div>
					            </div>
				            </div>
				            <div class="form-group">
					            <label for="Slug"><b>Video:</b></label>
            					<input type="text" class="form-control"  value="<?= $product[0]->video?>" name="video">
					        </div>
					        <div class="row">
                    			<div class="col-lg-6">
					        		<div class="form-group">
					            <label for="Slug"><b>Quantity:</b></label>
            					<input type="text" class="form-control"  value="<?= $product[0]->quantity?>" name="quantity">
					        		</div>
					        		<div class="form-group">
					            <label for="Slug"><b>Color:</b></label>
            					<input type="text" class="form-control"  value="<?= $product[0]->color?>" name="color">
					        		</div>
					        		<div class="form-group">
					            <label for="Slug"><b>Price:</b></label>
            					<input type="text" class="form-control"  value="<?= $product[0]->price?>" name="price">
					        		</div>
					        	</div>
                    			<div class="col-lg-6">		
					        		<div class="form-group">
					            <label for="Slug"><b>Sales Price:</b></label>
            					<input type="text" class="form-control"  value="<?= $product[0]->sales_price?>" name="sales_price">
					        		</div>
					        		<div class="form-group">
					            <label for="Slug"><b>Shipping Charge:</b></label>
            					<input type="text" class="form-control"  value="<?= $product[0]->shipping_charge?>" name="shipping_charge">
					        		</div>
					        		<div class="form-group">
					            <label for="Slug"><b>Taxes:</b></label>
            					<input type="text" class="form-control"  value="<?= $product[0]->taxes?>" name="taxes">
					        		</div>
					        	</div>
					        </div>		
				            <div class="form-group">
				            	<label for="Meta Keyword"><b>Meta Keyword:</b></label>
				            	<input type="text" class="form-control" value="<?= $product[0]->meta_keyword?>" name="meta_keyword">
				          	</div>
				          	<div class="form-group">
					            <label for="Meta Description"><b>Meta Description:</b></label>
					            <textarea class="form-control"  rows="4" name="meta_description"><?= $product[0]->meta_description?></textarea>
					        </div>
					        <div class="form-group">
					            <label for="description_category_status"><b>Featured:</b></label>
					            <select class="js-example-basic-single" style="width:100%"  name="featured">
					              <option value="1" <?php if($product[0]->featured == 1){ echo 'selected';} ?>>Featured</option>
					              <option value="0" <?php if($product[0]->featured == 0){ echo 'selected';} ?>>Non Featured</option>
					            </select>
					        </div>
					        <div class="form-group">
					            <label for="description_category_status"><b>Stock:</b></label>
					            <select class="js-example-basic-single" style="width:100%"  name="stock">
					              <option value="1" <?php if($product[0]->stock == 1){ echo 'selected';} ?>>In Stock</option>
					              <option value="0" <?php if($product[0]->stock == 0){ echo 'selected';} ?>>Out Of Stock</option>
					            </select>
					        </div>
					        <div class="form-group">
					            <label for="description_category_status"><b>Status:</b></label>
					            <select class="js-example-basic-single" style="width:100%"  name="status">
					              <option value="1" <?php if($product[0]->status == 1){ echo 'selected';} ?>>Active</option>
					              <option value="0" <?php if($product[0]->status == 0){ echo 'selected';} ?>>Deactive</option>
					            </select>
					        </div>
							
			
							<button type="submit" class="btn btn-success mr-2">Submit</button>
            				<button type="button" class="btn btn-light" onclick="location.href ='<?= base_url()?>superpanel/product';">Cancel</button>
						</form>
					</div>		
				</div>
			</div>
		</div>
	</div>
</div>