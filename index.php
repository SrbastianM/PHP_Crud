<?php include("db.php") ?>
<?php include("includes/header.php")?>

<div class="container p-4">
    <!-- Basicly task Manager, like Name Description load task etc.-->
    <div class="row p-4">
        
        <div class="col-md-4">
        
            <?php if(isset($_SESSION['message'])) {?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>

            <div class="card card-body md-4">
                <!-- Text area, like input or name of the task-->
                <form action="save_task.php" method="POST">
                
                    <div class="form-group p-1">
                    
                    <input type="text" name="title" class="form-control" placeholder ="Task Title" autofocus>
                    
                    </div>
                    
                    <div class="form-group p-1">
                    
                    <textarea name="description" rows="2" class="form-control" placeholder="Task description"></textarea>
                    
                    </div>
                    <!-- BUTTON FOR SAVE TASKS-->  
                    <div class="d-grid gap-2 p-1">  
                        <input type="submit" class="btn btn-outline-success " name="save_task" value="Save Task">
                    </div>
                </form>
                             
                   
                
            </div>

        </div>
                <div class="col-8">
                    <table class="table table-bordered">
                        <thead>
                            <th> Title </th>
                            <th> Description </th>
                            <th> Created at</th>
                            <th> Action </th>
                        </thead>
                        <tbody>
                        <?php
                        
                            $query = "SELECT * FROM task";
                            $result_tasks = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_array($result_tasks) ){ ?>
                                <tr>
                                    <td><?php echo $row['title']?></td>
                                    <td><?php echo $row['description']?></td>
                                    <td><?php echo $row['created_at']?></td>
                                    <td >
                                    <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-outline-secundary text-success text-decoration-none" >
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="delete_task.php?id=<?php echo $row['id']?>" class ="btn btn-outline-secundary text-danger text-decoration-none" >
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    </td>
                                </tr>
                            
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
    </div>

</div>

<?php include("includes/footer.php")?>