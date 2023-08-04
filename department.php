<?php include ("assets/includes/header.php")?>


    <main id="main">

        <?php
        $source = "";

        if(isset($_GET['source'])){
            $source = $_GET['source'];
        }
        switch ($source){
            case "all_department_view":
                include "components/department_components/all_department_view.php";
                break;
            case "single_department_view":
                include "components/department_components/single_department_view.php";
                break;
            case "search_teacher_result":
                include "components/department_components/search_teacher_result.php";
                break;
            default:
                include "components/department_components/all_department_view.php";
        }

        ?>

    </main><!-- End #main -->

<?php include ("assets/includes/footer.php")?>