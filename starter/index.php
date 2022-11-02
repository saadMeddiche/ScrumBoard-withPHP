<!-- https://boxicons.com/?query=check -->
<!-- https://getbootstrap.com/docs/5.1/layout/grid/ -->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>YouCode | Scrum Board</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
</head>

<body>

	<!-- BEGIN #app -->
	<div id="app" class="app-without-sidebar">
		<!-- BEGIN #content -->
		<div id="content" class="app-content main-style p-3">
			<div class="breadcrumb navbar navbar-light justify-content-between">
				<div>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>

						<li class="breadcrumb-item active" aria-current="page">Scrum Board </li>
					</ol>
					<!-- BEGIN page-header -->
					<h1 class="page-header">
						Scrum Board
					</h1>
					<!-- END page-header -->
				</div>

				<div class="">
					<button id="addTaskModalExemple" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary btn-info "><i class="">+</i> Add Task</button>
				</div>
			</div>

			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3">
				<div class="mb-3">
					<div class="bg-light rounded-1">
						<div class="bg-dark p-1 rounded-top">
							<h4 class="text-light fs-6 mb-0 ms-1">To do (<span id="to-do-tasks-count"><?php

																										require "connect.php";

																										//Count() function returns the number of rows that matches a specified criterion.
																										//https://www.w3schools.com/sql/sql_count_avg_sum.asp
																										$requete = "SELECT COUNT(dataofthetasks.id) FROM dataofthetasks WHERE dataofthetasks.status = 1";
																										$query = mysqli_query($connection, $requete);

																										//https://stackoverflow.com/questions/6907751/select-count-from-table-of-mysql-in-php
																										$data = mysqli_fetch_assoc($query);
																										echo $data['COUNT(dataofthetasks.id)'];

																										?></span>)</h4>
						</div>
						<div class="color" id="to-do-tasks">
							<!-- TO DO TASKS HERE -->
							<!-- here will be the buttons -->
							<?php

							require "connect.php";


							$requete = "SELECT dataofthetasks.*, priorety.name , types.nameT FROM `dataofthetasks` INNER JOIN `priorety` JOIN `types` ON dataofthetasks.priorety = priorety.id AND dataofthetasks.type = types.id";

							//How to send this code to the database and run it inside the data base
							//https://www.youtube.com/watch?v=0YLJ0uO6n8I [5:00]
							$query = mysqli_query($connection, $requete);
							while ($row = mysqli_fetch_assoc($query)) {

								if ($row['status'] == 1) {

									echo '
									
									<input type="hidden" value="' . $row['id'] . '">
									<div class="d-flex flex-row bd-highlight mb-1 w-100 pt-0 px-0 border-0" style="background-color:white">
										<div class="w-30">
											<i class="text-sm-start mx-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(16, 239, 10, 1);transform: ;msFilter:;"><path d="M12 6a3.939 3.939 0 0 0-3.934 3.934h2C10.066 8.867 10.934 8 12 8s1.934.867 1.934 1.934c0 .598-.481 1.032-1.216 1.626a9.208 9.208 0 0 0-.691.599c-.998.997-1.027 2.056-1.027 2.174V15h2l-.001-.633c.001-.016.033-.386.441-.793.15-.15.339-.3.535-.458.779-.631 1.958-1.584 1.958-3.182A3.937 3.937 0 0 0 12 6zm-1 10h2v2h-2z"></path><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path></svg>
											</i>
										</div>

										<div class="w-100">
											<div class="fw-bold">' . $row['title'] . '</div>
											<div class="">
												<div class="fw-light">#' . $row['id'] . ' created in ' . $row['date'] . '</div>
												<!-- Condition ? true : false https://www.w3schools.com/jsref/jsref_substring.asp  -->
												<div class="" title="' . $row['description'] . '">' . $row['description'] . '</div>
											</div>
											<div class="d-sm-flex gap-5 mt-2 ">
												<div class="mb-2">
													<span type="button" class="btn btn-primary mb-2">' . $row['name'] . '</span>
													<span type="button" class="btn btn-secondary mb-2">' . $row['nameT'] . '</span>
												</div>
												<div class="">
													<div class="d-flex gap-1">
													
														<button  type="submit" href="delete.php?id=' . $row['id'] . '"  class="btn btn-danger mb-2 me-1" > 
															<i href="delete.php?id=' . $row['id'] . '">
																<a href="delete.php?id=' . $row['id'] . '">
																	<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
																	<path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z">
																	</path>
																	</svg>
																</a>
															</i>
														</button>
														
														<a href="index.php?id=' . $row['id'] . '"><button type="button" class="btn btn-success mb-2" >  Up </button></a>
														
													
													</div>
													<div class="ms-5 ps-1">
													<form method="post" action="checkGET.php?moveF=' . $row['id'] . '">
														<button type="submit" name="moveF" class="btn btn-warning mb-2 " > <i> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M5.536 21.886a1.004 1.004 0 0 0 1.033-.064l13-9a1 1 0 0 0 0-1.644l-13-9A1 1 0 0 0 5 3v18a1 1 0 0 0 .536.886z"></path></svg> </i> </button>
													</form>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									';
								}
							}
							?>

						</div>
					</div>
				</div>
				<div class="mb-3">
					<div class="bg-light rounded-1">
						<div class="bg-dark p-1 rounded-top">
							<h4 class="text-light fs-6 mb-0 ms-1"> In Progress (<span id="in-progress-tasks-count"><?php

																													require "connect.php";

																													$requete = "SELECT * FROM `dataofthetasks`";
																													$query = mysqli_query($connection, $requete);
																													$inProgressCounter = 0;
																													while ($row = mysqli_fetch_assoc($query)) {

																														if ($row['status'] == 2) {
																															$inProgressCounter++;
																														}
																													}
																													echo "$inProgressCounter";
																													?></span>)</h4>

						</div>
						<div class="color" id="in-progress-tasks">
							<!-- IN PROGRESS TASKS HERE -->


							<!-- here will be the buttons -->
							<?php

							require "connect.php";

							$requete = "SELECT dataofthetasks.*, priorety.name , types.nameT FROM `dataofthetasks` INNER JOIN `priorety` JOIN `types` ON dataofthetasks.priorety = priorety.id AND dataofthetasks.type = types.id";

							$query = mysqli_query($connection, $requete);
							while ($row = mysqli_fetch_assoc($query)) {
								if ($row['status'] == 2) {
									echo '
									<div class="d-flex flex-row bd-highlight mb-1 w-100 pt-0 px-0 border-0" style="background-color:white">
										<div class="w-30">
											<i class="text-sm-start mx-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(16, 239, 10, 1);transform: scaleX(-1);msFilter:progid:DXImageTransform.Microsoft.BasicImage(rotation=0, mirror=1);"><path d="M12 22c5.421 0 10-4.579 10-10h-2c0 4.337-3.663 8-8 8s-8-3.663-8-8c0-4.336 3.663-8 8-8V2C6.579 2 2 6.58 2 12c0 5.421 4.579 10 10 10z"></path></svg>
											</i>
										</div>

										<div class="w-100">
											<div class="fw-bold">' . $row['title'] . '</div>
											<div class="">
												<div class="fw-light">#' . $row['id'] . ' created in ' . $row['date'] . '</div>
												<!-- Condition ? true : false https://www.w3schools.com/jsref/jsref_substring.asp  -->
												<div class="" title="' . $row['description'] . '">' . $row['description'] . '</div>
											</div>
											<div class="d-sm-flex gap-5 mt-2 ">
												<div class="mb-2">
													<span type="button" class="btn btn-primary mb-2">' . $row['name'] . '</span>
													<span type="button" class="btn btn-secondary mb-2">' . $row['nameT'] . '</span>
												</div>
												<div class="">
													<div class="">
														<button  type="button" href="delete.php?id=' . $row['id'] . '" class="btn btn-danger mb-2 me-1" > 
															<i href="delete.php?id=' . $row['id'] . '">
																<a href="delete.php?id=' . $row['id'] . '">
																	<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
																	<path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z">
																	</path>
																	</svg>
																</a>
															</i>
														</button>
														<a href="index.php?id=' . $row['id'] . '"><button href="update.php?id=' . $row['id'] . '"  type="button"  class="btn btn-success mb-2" name="editBtn" id="updateBtn" >  Up </button></a>
													</div>
													<div class="d-flex gap-1">
														<form method="post" action="checkGET.php?moveB=' . $row['id'] . '">
															<button type="submit" name="moveB" class="btn btn-warning mb-2 me-1" > <i> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z"></path></svg> </i> </button>
														</form>
														<form method="post" action="checkGET.php?moveF=' . $row['id'] . '">
															<button type="submit" name="moveF" class="btn btn-warning mb-2 " > <i> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M5.536 21.886a1.004 1.004 0 0 0 1.033-.064l13-9a1 1 0 0 0 0-1.644l-13-9A1 1 0 0 0 5 3v18a1 1 0 0 0 .536.886z"></path></svg> </i> </button>
														</form>
														
													</div>
												</div>
											</div>
										</div>
									</div>
									';
								}
							}
							?>

						</div>
					</div>
				</div>
				<div class="mb-3">
					<div class="bg-light rounded-1">
						<div class="bg-dark p-1 rounded-top">
							<h4 class="text-light fs-6 mb-0 ms-1">Done (<span id="done-tasks-count"><?php

																									require "connect.php";

																									$requete = "SELECT * FROM `dataofthetasks`";
																									$query = mysqli_query($connection, $requete);
																									$doneCounter = 0;
																									while ($row = mysqli_fetch_assoc($query)) {

																										if ($row['status'] == 3) {
																											$doneCounter++;
																										}
																									}
																									echo "$doneCounter";
																									?></span>)</h4>

						</div>
						<div class="color" id="done-tasks">
							<!-- DONE TASKS HERE -->


							<!-- here will be the buttons -->
							<?php

							require "connect.php";

							$requete = "SELECT dataofthetasks.*, priorety.name , types.nameT FROM `dataofthetasks` INNER JOIN `priorety` JOIN `types` ON dataofthetasks.priorety = priorety.id AND dataofthetasks.type = types.id";

							$query = mysqli_query($connection, $requete);
							while ($row = mysqli_fetch_assoc($query)) {
								if ($row['status'] == 3) {
									echo '
									
									<div class="d-flex flex-row bd-highlight mb-1 w-100 pt-0 px-0 border-0" style="background-color:white">
										<div class="w-30">
										<i class="text-sm-start mx-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(16, 239, 10, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M9.999 13.587 7.7 11.292l-1.412 1.416 3.713 3.705 6.706-6.706-1.414-1.414z"></path></svg>
										</i>
										</div>

										<div class="w-100">
											<div class="fw-bold">' . $row['title'] . '</div>
											<div class="">
												<div class="fw-light">#' . $row['id'] . ' created in ' . $row['date'] . '</div>
												<!-- Condition ? true : false https://www.w3schools.com/jsref/jsref_substring.asp  -->
												<div class="" title="' . $row['description'] . '">' . $row['description'] . '</div>
											</div>
											<div class="d-sm-flex gap-5 mt-2 ">
												<div class="mb-2">
													<span type="button" class="btn btn-primary mb-2">' . $row['name'] . '</span>
													<span type="button" class="btn btn-secondary mb-2">' . $row['nameT'] . '</span>
												</div>
												<div class="">
													<div class="">
														<button  type="button" href="delete.php?id=' . $row['id'] . '" class="btn btn-danger mb-2 me-1" > 
															<i href="delete.php?id=' . $row['id'] . '">
																<a href="delete.php?id=' . $row['id'] . '">
																	<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
																	<path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z">
																	</path>
																	</svg>
																</a>
															</i>
														</button>
														<a href="index.php?id=' . $row['id'] . '"><button   href="update.php?id=' . $row['id'] . '"  type="button"  class="btn btn-success mb-2" name="editBtn" id="updateBtn" onmouseover="myFunction()">  Up 
														</button></a>
													</div>
													<div class="">
														<form method="post" action="checkGET.php?moveB=' . $row['id'] . '">
															<button  type="submit" name="moveB" class="btn btn-warning mb-2 me-1" > <i> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z"></path></svg> </i> </button>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									';
								}
							}
							?>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- END #content -->
		<button type="hidden" data-bs-toggle="modal" data-bs-target="#update" id="updateBTN"></button>
		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
	</div>
	<!-- END #app -->

	<!-- Add TASK MODAL -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add task</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form method="post" action="insert.php">
					<div class="modal-body">
						<!-- Contenu -->
						<div>
							<p class="mb-0 fw-bold">Title</p>
						</div>
						<!-- title -->
						<div class="input-group mb-3">
							<input id="title" type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="title">
						</div>
						<!-- checks -->
						<div>
							<p class="mb-0 fw-bold">Type</p>
						</div>
						<div class="form-check ms-2">
							<input class="form-check-input feature" type="radio" name="flexRadioDefault" id="Feature" value="1" checked='checked'>
							<label class="form-check-label" for="Feature">
								Feature
							</label>
						</div>
						<div class="form-check mb-2 ms-2">
							<input class="form-check-input bug" type="radio" name="flexRadioDefault" id="Bug" value="2">
							<label class="form-check-label" for="Bug">
								Bug
							</label>
						</div>
						<!-- select -->
						<div>
							<p class="mb-0 fw-bold">Priorety</p>
						</div>
						<!-- Priorety -->
						<select id="Priorety" class="form-select" aria-label="Default select example" name="priorety">
							<option id="Option" value="1">Low</option>
							<option id="Option" value="2">Medium</option>
							<option id="Option" value="3">High</option>
						</select>

						<div>
							<p class="mb-0 mt-2 fw-bold">Status</p>
						</div>
						<select id="Status" class="form-select" aria-label="Default select example" name="status">
							<option value="1">To do</option>
							<option value="2">In progress</option>
							<option value="3">Done</option>
						</select>
						<!-- date -->
						<div>
							<p class="mb-0 mt-2 fw-bold">Date</p>
						</div>
						<div class="well ">
							<input type="date" class="span2  w-100 h-35px m-0" value="02-16-2012" id="dp1" name="date">
						</div>
						<!-- description -->
						<div>
							<p class="mb-0 mt-2 fw-bold">Descriptions</p>
						</div>
						<div class="mb-3">
							<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
						</div>

					</div>


					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary" id="saveButton" name="save" data-bs-dismiss="modal">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- ---------------------------------------------------------------------------------------- -->
	<?php
	require 'connect.php';
	if (isset($_GET['id'])) {

		$idGlob = $_GET['id'];
		$requete = "SELECT * FROM dataofthetasks where id='$idGlob'";

		$query = mysqli_query($connection, $requete);
		$rows = mysqli_fetch_assoc($query);

		$title = $rows['title'];
		$type = $rows['type'];
		$priorety = $rows['priorety'];
		$status = $rows['status'];
		$date = $rows['date'];
		$description = $rows['description'];
	}



	?>
	<div class="modal" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Update Task</h5>
					<a href="Cancel.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
				</div>
				<form method="post" action="update.php?<?php echo "id=update"; ?>">
					<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
					<div class="modal-body">
						<!-- Contenu -->
						<div>
							<p class="mb-0 fw-bold">Title</p>
						</div>
						<!-- title -->
						<div class="input-group mb-3">
							<input id="title" type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="title2" value="<?php
																																																echo $title;
																																																?>">
						</div>
						<!-- checks -->
						<div>
							<p class="mb-0 fw-bold">Type</p>
						</div>
						<div class="form-check ms-2">
							<input class="form-check-input feature" type="radio" name="flexRadioDefault2" id="Feature" value="1" <?php if ($type == 1) {
																																		echo "checked='checked'";
																																	} ?>>
							<label class="form-check-label" for="Feature">
								Feature
							</label>
						</div>
						<div class="form-check mb-2 ms-2">
							<input class="form-check-input bug" type="radio" name="flexRadioDefault2" id="Bug" value="2" <?php if ($type == 2) {
																																echo "checked='checked'";
																															} ?>>
							<label class="form-check-label" for="Bug">
								Bug
							</label>
						</div>
						<!-- select -->
						<div>
							<p class="mb-0 fw-bold">Priorety</p>
						</div>
						<!-- Priorety -->
						<select id="Priorety" class="form-select" aria-label="Default select example" name="priorety2">
							<option id="Option" value="1" <?php if ($priorety == 1) {
																echo "selected";
															} ?>>Low</option>
							<option id="Option" value="2" <?php if ($priorety == 2) {
																echo "selected";
															} ?>>Medium</option>
							<option id="Option" value="3" <?php if ($priorety == 3) {
																echo "selected";
															} ?>>High</option>
						</select>

						<div>
							<p class="mb-0 mt-2 fw-bold">Status</p>
						</div>
						<select id="Status" class="form-select" aria-label="Default select example" name="status2">
							<option value="1" <?php if ($status == 1) {
													echo "selected";
												} ?>>To do</option>
							<option value="2" <?php if ($status == 2) {
													echo "selected";
												} ?>>In progress</option>
							<option value="3" <?php if ($status == 3) {
													echo "selected";
												} ?>>Done</option>
						</select>
						<!-- date -->
						<div>
							<p class="mb-0 mt-2 fw-bold">Date</p>
						</div>
						<div class="well ">
							<input type="date" class="span2  w-100 h-35px m-0" value="<?php
																						echo $date;
																						?>" id="dp1" name="date2">
						</div>
						<!-- description -->
						<div>
							<p class="mb-0 mt-2 fw-bold">Descriptions</p>
						</div>
						<div class="mb-3">
							<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description2"><?php
																															echo $description;
																															?></textarea>
						</div>

					</div>


					<div class="modal-footer">
						<a href="Cancel.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cancel</button></a>
						<button type="submit" class="btn btn-primary" id="saveButton" name="save" data-bs-dismiss="modal">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>



	<!-- ================== BEGIN core-js ================== -->
	<script src="assets/js/vendor.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<script src="assets/js/javascript.js"></script>
	<script src="assets/js/validation.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<!-- ================== END core-js ================== -->


</body>

</html>

<?php
include 'checkGET.php';
?>