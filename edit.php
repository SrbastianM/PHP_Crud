<?php

    include("db.php");

$title = '';
$description = '';

//* esta linea pide el id */
    if(isset($_GET['id'])) {//Busca el parametro 'id'
        $id  = $_GET['id'];// luego lo almacena en la variable $id
        $query = " SELECT * FROM task WHERE id = $id"; //Aqui Le pide que seleccione de la base de datos, todas las columnas, con el id antes almacenado 
        $result = mysqli_query($conn, $query);
    
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['description'];
            //echo $title, $description;
        }
    }
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description =  $_POST['description'];
    // PETICION DE EDICION O CAMBIO, EDITANDO LOS CAMPOS TITULO Y DESCRIPCION, POR LAS VARIABLES, $title y $description
    
    

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        
        $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
        mysqli_query($conn, $query);
        header("Location:index.php");
        $_SESSION['message'] = "Task Edited Successfully";
        $_SESSION['message_type'] = "success";
        header("Location: index.php");
    }
   
}
?>

<?php include("includes/header.php")?>
<div class="container-md gap-3 p-4">
    <div class="row">
        <div class="col col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id'];?>" method ="POST">
                    <div class="form-group p-1">
                        <input name = "title" type="text" value ="<?php echo $title;?>" class ="form-control" placeholder ="Update Title">
                    </div>
                    <div class="form-group p-1">
                        <textarea name="description" rows="2" class= "form-control" placeholder ="Update Description"><?php echo $description;?></textarea>
                    </div>
                    <div class="d-grid gap-2 p-2">
                        <button class ="btn btn-outline-success" name = "update"> UPDATE </button>                    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php")?>