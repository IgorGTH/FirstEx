<?php
require '../dbcon.php';

if (isset($_POST['query'])) {
    $query = $_POST['query'];
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        while ($colaborador = mysqli_fetch_assoc($query_run)) {
            ?>
            <tr>
                <td><?= $colaborador['Nome'] ?></td>
                <td><?= $colaborador['Email'] ?></td>
                <td>                                                                           
                    <button type="button" value="<?= $colaborador['Id']; ?>" class="viewColaboradorBtn bi bi-info-circle btn btn-info btn-sm"></button>
                    <button type="button" value="<?= $colaborador['Id']; ?>" class="editColaboradorBtn bi bi-pencil-square btn btn-warning btn-sm"></button>                                            
                    <button type="button" value="<?= $colaborador['Id']; ?>" class="bi bi-trash btn btn-danger btn-sm"></button>                                
                </td>
            </tr>
            <?php
        }
    } else {
        echo "Database query error: " . mysqli_error($con);
    }
} else {

    echo "No query provided.";
}
?>