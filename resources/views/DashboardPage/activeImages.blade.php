<?php require_once  VIEWS.'dashboardHeader.php'; ?>
<?php require_once  VIEWS.'DashboardPage/dashboardnavs.phtml'; ?>

	<div class="dashboard-home-container">
		<div class='dashbord-home-content'>
			<h4>Active Image/s</h4>
		<!-- 	<form action="../dashboard/uploadImage" method="post" enctype="multipart/form-data" class="fivePercent">
			    Select image to upload
			    <input type="file" name="image[]" id="image" accept='image/*' multiple="multiple">
			    <input type="submit" value="Upload Image" disabled="" class='btn btn-info' id='btn-upload-image' name="submit">
			</form> -->
				<div class='dashbord-img-container-container'>
					<?php
						foreach ($this->fileValue['images'] as $key => $images) { 
							echo "<div class='dashbord-img-container'>"; // per 3 imgs, create a new dashbord-img-container div
								 foreach ($images as $key => $image) {  // loop through imgs maximum of 3 and show it.
								 echo "<div class='dashbord-img-container-img'><img src='../../../public/img/slider/active/".$image."' class='img-content'><p class='image-count flexCenters'>1</p></div>";
								 }
							echo "</div>";
						}
					?>
				</div>
				<button class='btn btn-danger' id='btn-remove-image' class='btn-image' disabled="">Remove image</button>
				<button class='btn btn-info' id='btn-arrange-image' class='btn-image' disabled="">Arrange image</button>
			</div>
		</div>
	</div>

<?php require_once  VIEWS.'DashboardPage/dashboardClosingNavs.phtml'; ?>
<?php require_once  VIEWS.'dashboardFooter.php'; ?>