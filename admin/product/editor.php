<?php
$title = 'Add/Edit Products';
$baseUrl = '../';
require_once('../layouts/header.php');

$id = $fixedThumbnail = $imgs = $title = $price = $discount = $category_id = $description = '';
require_once('form_save.php');

$id = getGet('id');
if ($id != '' && $id > 0) {
	$sql = "select * from db_product where id = '$id' and status = 1";
	$userItem = executeResult($sql, true);
	if ($userItem != null) {
		$thumbnail = $userItem['avatar'];
		$fixedThumbnail = fixUrl($thumbnail);
		$imgs = $userItem['img'];
		$title = $userItem['name'];
		$price = $userItem['price'];
		$category_id = $userItem['catid'];
		$producer_id = $userItem['producer'];
		$description = $userItem['detail'];
	} else {
		$id = 0;
	}
} else {
	$id = 0;
}

$sql = "select * from db_category where status = 1";
$categoryItems = executeResult($sql);
$sql = "select * from db_producer  where status = 1";
$producerItems = executeResult($sql);
?>
<!-- include summernote css/js -->
<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script> -->
<script></script>

<div class="row" style="margin-top: 48px;">
	<div class="col-md-12 table-responsive">
		<h3>Add/Edit Products</h3>
		<div class="panel panel-primary">
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data">
					<div class="row">

						<div class="col-9">
							<div class="form-group">
								<label class="mb-2" for="usr">Product Name:</label>
								<input required="true" type="text" class="form-control" id="usr" name="title" value="<?= $title ?>">
								<input type="text" name="id" value="<?= $id ?>" hidden="true">
							</div>
							<div class="form-group mt-3">
								<label for="description">Content:</label>
								<!-- <textarea class="form-control mt-2" rows="5" name="description" id="description"></textarea> -->
								<textarea class="form-control summernote mt-2" name="description" id="description"><?= $description ?></textarea>
							</div>

							<button class="btn btn-success mt-3">Save</button>
						</div>

						<div class="col-3">
							<div class="form-group">
								<label class="mb-2" for="thumbnail">Thumbnail:</label>
								<input type="file" class="form-control" id="thumbnail" name="thumbnail" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
								<img src="<?= $fixedThumbnail ?>" class="mt-2" style="max-height: 160px;">
							</div>

							<div class="form-group mt-3">
								<label class="mb-2" for="imgs">Images:</label>
								<input type="file" class="form-control" id="imgs" name="imgs[]" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" multiple>
								<div class="row">
									<?php
									foreach (explode("#", $imgs) as $img) :
										$fixedImg = fixUrl($img);
									?>
										<img src="<?= $fixedImg ?>" class="mt-2 col-6" style="max-height: 160px; object-fit: contain;">
									<?php endforeach; ?>

								</div>
							</div>

							<div class="form-group mt-3">
								<label for="category_id">Product Category:</label>
								<select class="form-control mt-2" name="category_id" id="category_id" required="true">
									<option value="">-- Select --</option>
									<?php
									foreach ($categoryItems as $item) {
										if ($item['id'] == $category_id) {
											echo '<option selected value="' . $item['id'] . '">' . $item['name'] . '</option>';
										} else {
											echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
										}
									}
									?>
								</select>
							</div>

							<div class="form-group mt-3">
								<label for="producer_id">Producer:</label>
								<select class="form-control mt-2" name="producer_id" id="producer_id" required="true">
									<option value="">-- Select --</option>
									<?php
									foreach ($producerItems as $item) {
										if ($item['id'] == $producer_id) {
											echo '<option selected value="' . $item['id'] . '">' . $item['name'] . '</option>';
										} else {
											echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
										}
									}
									?>
								</select>
							</div>

							<div class="form-group mt-3">
								<label class="mb-2" for="price">Price:</label>
								<input required="true" type="number" class="form-control" id="price" name="price" value="<?= $price ?>">
							</div>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$('textarea.summernote').summernote({
		placeholder: 'We need something here',
		tabsize: 2,
		height: 512,
		color: [
			['Orginal', 'red', 'green', 'blue'],
			['#155593', '#c4b540', '#1dd381', '#ba1cd2']
		],
		toolbar: [
			['style', ['style']],
			['font', ['bold', 'underline', 'clear']],
			[
				'color',
				['color']
			],
			['para', ['ul', 'ol', 'paragraph']],
			['table', ['table']],
			['insert', ['link', 'picture', 'video']],
			['view', ['fullscreen', 'codeview', 'help']]
		]
	});
</script>
<?php
require_once('../layouts/footer.php');
?>