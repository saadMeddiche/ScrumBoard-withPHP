<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="assets/css/vendor.min.css" rel="stylesheet" />
    <link href="assets/css/default/app.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <button id="test" data-bs-toggle="modal" data-bs-target="#update" hidden> test</button>


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
    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="insert2.php?<?php echo "id=update"; ?>">
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
                            <option value="3" <?php if ($priorety == 3) {
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="saveButton" name="save" data-bs-dismiss="modal">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/javascript.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>