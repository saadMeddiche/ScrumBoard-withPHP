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
					<button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary btn-info "><i class="">+</i> Add Task</a>
				</div>
			</div>

			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3">
				<div class="mb-3">
					<div class="bg-light rounded-1">
						<div class="bg-dark p-1 rounded-top">
							<h4 class="text-light fs-6 mb-0 ms-1">To do (<span id="to-do-tasks-count">0</span>)</h4>
						</div>
						<div class="color" id="to-do-tasks">
							<!-- TO DO TASKS HERE -->
							<!-- here will be the buttons -->
							<?php

							require "connect.php";
							$requete = "SELECT * FROM `dataofthetasks`";
							$query = mysqli_query($connection, $requete);
							while ($row = mysqli_fetch_assoc($query)) {
								if ($row['status'] == 1) {
									echo '
									<div class="d-flex flex-row bd-highlight mb-1 w-100 pt-0 px-0 border-0" style="background-color:white">
										<div class="w-30">
											<i class="text-sm-start mx-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(16, 239, 10, 1);transform: ;msFilter:;"><path d="M12 6a3.939 3.939 0 0 0-3.934 3.934h2C10.066 8.867 10.934 8 12 8s1.934.867 1.934 1.934c0 .598-.481 1.032-1.216 1.626a9.208 9.208 0 0 0-.691.599c-.998.997-1.027 2.056-1.027 2.174V15h2l-.001-.633c.001-.016.033-.386.441-.793.15-.15.339-.3.535-.458.779-.631 1.958-1.584 1.958-3.182A3.937 3.937 0 0 0 12 6zm-1 10h2v2h-2z"></path><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path></svg>
											</i>
										</div>

										<div class="w-100">
											<div class="fw-bold">' . $row['title'] . '</div>
											<div class="">
												<div class="fw-light">#x created in ' . $row['date'] . '</div>
												<!-- Condition ? true : false https://www.w3schools.com/jsref/jsref_substring.asp  -->
												<div class="" title="' . $row['description'] . '">' . $row['description'] . '</div>
											</div>
											<div class="d-sm-flex gap-5 mt-2 ">
												<div class="mb-2">
													<span type="button" class="btn btn-primary mb-2">' . $row['priorety'] . '</span>
													<span type="button" class="btn btn-secondary mb-2">' . $row['type'] . '</span>
												</div>
												<div class="">
													<div class="">
														<button  type="button" class="btn btn-danger mb-2 me-1" > 
															<i>
																<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
																<path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z">
																</path>
																</svg>
															</i>
														</button>
														<button  data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-success mb-2 ">Up
														</button>
													</div>
													<div class="">
														<button  onclick="moveTask2(${i})" type="button" class="btn btn-warning mb-2 me-1" > <i> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z"></path></svg> </i> </button>
														<button  onclick="moveTask(${i})" type="button" class="btn btn-warning mb-2 " > <i> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M5.536 21.886a1.004 1.004 0 0 0 1.033-.064l13-9a1 1 0 0 0 0-1.644l-13-9A1 1 0 0 0 5 3v18a1 1 0 0 0 .536.886z"></path></svg> </i> </button>
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
							<h4 class="text-light fs-6 mb-0 ms-1"> In Progress (<span id="in-progress-tasks-count">0</span>)</h4>

						</div>
						<div class="color" id="in-progress-tasks">
							<!-- IN PROGRESS TASKS HERE -->


							<!-- here will be the buttons -->
							<?php

							require "connect.php";
							$requete = "SELECT * FROM `dataofthetasks`";
							$query = mysqli_query($connection, $requete);
							while ($row = mysqli_fetch_assoc($query)) {
								if ($row['status'] == 2) {
									echo '
									<div class="d-flex flex-row bd-highlight mb-1 w-100 pt-0 px-0 border-0" style="background-color:white">
										<div class="w-30">
											<i class="text-sm-start mx-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(16, 239, 10, 1);transform: ;msFilter:;"><path d="M12 6a3.939 3.939 0 0 0-3.934 3.934h2C10.066 8.867 10.934 8 12 8s1.934.867 1.934 1.934c0 .598-.481 1.032-1.216 1.626a9.208 9.208 0 0 0-.691.599c-.998.997-1.027 2.056-1.027 2.174V15h2l-.001-.633c.001-.016.033-.386.441-.793.15-.15.339-.3.535-.458.779-.631 1.958-1.584 1.958-3.182A3.937 3.937 0 0 0 12 6zm-1 10h2v2h-2z"></path><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path></svg>
											</i>
										</div>

										<div class="w-100">
											<div class="fw-bold">' . $row['title'] . '</div>
											<div class="">
												<div class="fw-light">#x created in ' . $row['date'] . '</div>
												<!-- Condition ? true : false https://www.w3schools.com/jsref/jsref_substring.asp  -->
												<div class="" title="' . $row['description'] . '">' . $row['description'] . '</div>
											</div>
											<div class="d-sm-flex gap-5 mt-2 ">
												<div class="mb-2">
													<span type="button" class="btn btn-primary mb-2">' . $row['priorety'] . '</span>
													<span type="button" class="btn btn-secondary mb-2">' . $row['type'] . '</span>
												</div>
												<div class="">
													<div class="">
														<button  type="button" class="btn btn-danger mb-2 me-1" > 
															<i>
																<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
																<path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z">
																</path>
																</svg>
															</i>
														</button>
														<button  data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-success mb-2 ">Up
														</button>
													</div>
													<div class="">
														<button  onclick="moveTask2(${i})" type="button" class="btn btn-warning mb-2 me-1" > <i> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z"></path></svg> </i> </button>
														<button  onclick="moveTask(${i})" type="button" class="btn btn-warning mb-2 " > <i> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M5.536 21.886a1.004 1.004 0 0 0 1.033-.064l13-9a1 1 0 0 0 0-1.644l-13-9A1 1 0 0 0 5 3v18a1 1 0 0 0 .536.886z"></path></svg> </i> </button>
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
							<h4 class="text-light fs-6 mb-0 ms-1">Done (<span id="done-tasks-count">0</span>)</h4>

						</div>
						<div class="color" id="done-tasks">
							<!-- DONE TASKS HERE -->


							<!-- here will be the buttons -->
							<?php

							require "connect.php";
							$requete = "SELECT * FROM `dataofthetasks`";
							$query = mysqli_query($connection, $requete);
							while ($row = mysqli_fetch_assoc($query)) {
								if ($row['status'] == 3) {
									echo '
									<div class="d-flex flex-row bd-highlight mb-1 w-100 pt-0 px-0 border-0" style="background-color:white">
										<div class="w-30">
											<i class="text-sm-start mx-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(16, 239, 10, 1);transform: ;msFilter:;"><path d="M12 6a3.939 3.939 0 0 0-3.934 3.934h2C10.066 8.867 10.934 8 12 8s1.934.867 1.934 1.934c0 .598-.481 1.032-1.216 1.626a9.208 9.208 0 0 0-.691.599c-.998.997-1.027 2.056-1.027 2.174V15h2l-.001-.633c.001-.016.033-.386.441-.793.15-.15.339-.3.535-.458.779-.631 1.958-1.584 1.958-3.182A3.937 3.937 0 0 0 12 6zm-1 10h2v2h-2z"></path><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path></svg>
											</i>
										</div>

										<div class="w-100">
											<div class="fw-bold">' . $row['title'] . '</div>
											<div class="">
												<div class="fw-light">#x created in ' . $row['date'] . '</div>
												<!-- Condition ? true : false https://www.w3schools.com/jsref/jsref_substring.asp  -->
												<div class="" title="' . $row['description'] . '">' . $row['description'] . '</div>
											</div>
											<div class="d-sm-flex gap-5 mt-2 ">
												<div class="mb-2">
													<span type="button" class="btn btn-primary mb-2">' . $row['priorety'] . '</span>
													<span type="button" class="btn btn-secondary mb-2">' . $row['type'] . '</span>
												</div>
												<div class="">
													<div class="">
														<button  type="button" class="btn btn-danger mb-2 me-1" > 
															<i>
																<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
																<path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z">
																</path>
																</svg>
															</i>
														</button>
														<button  data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-success mb-2 ">Up
														</button>
													</div>
													<div class="">
														<button  onclick="moveTask2(${i})" type="button" class="btn btn-warning mb-2 me-1" > <i> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z"></path></svg> </i> </button>
														<button  onclick="moveTask(${i})" type="button" class="btn btn-warning mb-2 " > <i> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M5.536 21.886a1.004 1.004 0 0 0 1.033-.064l13-9a1 1 0 0 0 0-1.644l-13-9A1 1 0 0 0 5 3v18a1 1 0 0 0 .536.886z"></path></svg> </i> </button>
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
					<button type="button" class="btn-close" data-bs-dismiss="modal" onclick="cancelButton()" aria-label="Close"></button>
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
							<input class="form-check-input feature" type="radio" name="flexRadioDefault" id="Feature" value="Feature">
							<label class="form-check-label" for="Feature">
								Feature
							</label>
						</div>
						<div class="form-check mb-2 ms-2">
							<input class="form-check-input bug" type="radio" name="flexRadioDefault" id="Bug" value="Bug">
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
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="cancelButton()">Cancel</button>
						<button type="submit" class="btn btn-primary" id="saveButton" name="save" data-bs-dismiss="modal">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>



	<!-- ================== BEGIN core-js ================== -->
	<script src="assets/js/vendor.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<script src="assets/js/javascript.js"></script>
	<!-- ================== END core-js ================== -->


</body>

</html>