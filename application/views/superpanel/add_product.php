<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-body">
				<div class="template-demo">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-custom bg-inverse-primary">
							<li class="breadcrumb-item"><a href="<?= base_url();?>superpanel/home" style="text-decoration: none">Home</a></li>
				            <li class="breadcrumb-item"><a href="javascript:void(0)" style="text-decoration: none">Product</a></li>
				            <li class="breadcrumb-item active" aria-current="page"><span>Add Product</span></li>
						</ol>
					</nav>
				</div>&nbsp;
				<h1 class="card-title alert alert-success text-center" align="center"><b>Add Product</b></h1>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<form class="forms-sample" method="post" enctype="multipart/form-data"  action="<?= base_url();?>superpanel/product/insert">
							
							<div class="form-group">
			                    <label for="exampleSelectSuccess"><b>Select Category<em style="color:red">*</em>:</b></label>
			                    <select class="js-example-basic-single" style="width:100%" name="category_id">
			                      <?php foreach($category as $c1){?>
			                        <option value="<?=$c1->category_id?>"><?php echo $c1->category_name;?> 
			                      <?php }?>
			                    </select>
		                    </div>
							<div class="form-group">
				            	<label for="Page Name"><b>Product Code:</b></label>
            					<input type="text" class="form-control"  placeholder="Enter Product Code" name="product_code">
				          	</div>
					        <div class="form-group">
					            <label for="Page Title"><b>Product Name:</b></label>
            					<input type="text" class="form-control"  placeholder="Enter Product Name" name="product_name">
					        </div>
					        <div class="form-group">
					            <label for="Slug"><b>Slug:</b></label>
            					<input type="text" class="form-control" id="category_slug" placeholder="Enter Category Slug" name="slug">
					        </div>
					        <div class="form-group">
				            	<label for="tinyMceExample"><b>Product Description:</b></label>
            					<textarea id='tinyMceExample'  name="product_description" ></textarea>
				            </div>
				            <div class="form-group">
				            	<label for="Category Image"><b>Image:</b></label>
            					<input type="file" class="dropify" data-height="300" / name="product_img" id="image">
				            </div>
				            <div class="form-group">
					            <label for="Slug"><b>Video:</b></label>
            					<input type="text" class="form-control"  placeholder="Enter Video URL" name="video">
					        </div>
					        <div class="row">
                    			<div class="col-lg-6">
					        		<div class="form-group">
					            <label for="Slug"><b>Quantity:</b></label>
            					<input type="text" class="form-control"  placeholder="Enter Quantity" name="quantity">
					        		</div>
					        		<div class="form-group">
					            <label for="Slug"><b>Color:</b></label>
            					<input type="text" class="form-control"  placeholder="Enter Color" name="color">
					        		</div>
					        		<div class="form-group">
					            <label for="Slug"><b>Price:</b></label>
            					<input type="text" class="form-control"  placeholder="Enter Price" name="price">
					        		</div>
					        	</div>
                    			<div class="col-lg-6">		
					        		<div class="form-group">
					            <label for="Slug"><b>Sales Price:</b></label>
            					<input type="text" class="form-control"  placeholder="Enter Sales Price" name="sales_price">
					        		</div>
					        		<div class="form-group">
					            <label for="Slug"><b>Shipping Charge:</b></label>
            					<input type="text" class="form-control"  placeholder="Enter Shipping Charge" name="shipping_charge">
					        		</div>
					        		<div class="form-group">
					            <label for="Slug"><b>Taxes:</b></label>
            					<input type="text" class="form-control"  placeholder="Enter Taxes" name="taxes">
					        		</div>
					        	</div>
					        </div>		
				            <div class="form-group">
				            	<label for="Meta Keyword"><b>Meta Keyword:</b></label>
				            	<input type="text" class="form-control" placeholder="Enter Meta Keyword" name="meta_keyword">
				          	</div>
				          	<div class="form-group">
					            <label for="Meta Description"><b>Meta Description:</b></label>
					            <textarea class="form-control"  rows="4" name="meta_description"></textarea>
					        </div>
					        <div class="form-group">
					            <label for="description_category_status"><b>Featured:</b></label>
					            <select class="js-example-basic-single" style="width:100%"  name="featured">
					              <option value="">--Select--</option>
					              <option value="1">Featured</option>
					              <option value="0">Non Featured</option>
					            </select>
					        </div>
					        <div class="form-group">
					            <label for="description_category_status"><b>Stock:</b></label>
					            <select class="js-example-basic-single" style="width:100%"  name="stock">
					              <option value="">--Select--</option>
					              <option value="1">In Stock</option>
					              <option value="0">Out Of Stock</option>
					            </select>
					        </div>
					        <div class="form-group">
					            <label for="description_category_status"><b>Status:</b></label>
					            <select class="js-example-basic-single" style="width:100%"  name="status">
					              <option value="">--Select--</option>
					              <option value="1">Active</option>
					              <option value="0">Deactive</option>
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