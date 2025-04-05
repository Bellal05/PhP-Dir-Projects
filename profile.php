<?php
include 'conn.php';
session_start();

// Ensure the session variable exists
if (!isset($_SESSION['id'])) {
    die("User not logged in.");
}

// Prepare the query
$sql = "SELECT 
    u.nome, 
    u.cognome, 
    u.email, 
    u.telefono, 
    u.isadmin, 
    u.codice_tessera,
    u.peso,
    u.altezza,
    u.sesso,
    u.indirizzo,
    a.id, 
    a.tipologia,
    a.data_inizio,
    a.data_fine,
    a.prezzo,
    a.ingressi_rimanenti,
    a.status
FROM 
    utenti_p3 u
LEFT JOIN
    Abbonamenti_p2 a
ON 
    u.codice_tessera = a.codice_tessera
WHERE 
    u.id = ?";

// Prepare and execute the statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['id']); // Bind session ID as an integer
$stmt->execute();
$result = $stmt->get_result();

$sql_sub = "SELECT 
    a.id, 
    a.tipologia,
    a.data_inizio,
    a.data_fine,
    a.prezzo,
    a.ingressi_rimanenti,
    a.status
FROM 
    utenti_p3 u
LEFT JOIN
    Abbonamenti_p2 a
ON 
    u.codice_tessera = a.codice_tessera
WHERE 
    u.id = ?";

// Prepare and execute the statement
$stmt_sub = $conn->prepare($sql_sub);
$stmt_sub->bind_param("i", $_SESSION['id']); // Bind session ID as an integer
$stmt_sub->execute();
$result_sub = $stmt_sub->get_result();

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profilo</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include 'footer.php'
            ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                include 'header.php';
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Profile Card -->
                    <div class="card mb-4" style="max-width: 350px; margin: 0 auto;">
                        <div class="card-header text-center">
                            <h5 class="font-weight-bold">Profilo</h5>
                        </div>
                        <div class="card-body text-center">
                            
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                if ($row['sesso'] == 0) {
                                    echo '<img src="uomo.jpg" alt="Profile Image" class="img-fluid rounded-circle mb-3" style="width: 100px; height: 100px;">';
                                } if ($row['sesso'] == 1) {
                                    echo '<img src="donna.jpg" alt="Profile Image" class="img-fluid rounded-circle mb-3" style="width: 100px; height: 100px;">';
                                    ;
                                }
                                if ($row['sesso'] == 2){
                                    echo '<img src="registra.jpg" alt="Profile Image" class="img-fluid rounded-circle mb-3" style="width: 100px; height: 100px;">';
;
                                } echo '</p>';
                                echo '<h5 class="card-title">' . $row['nome'] . " " . $row['cognome'] . '</h5>';
                                echo '<p class="card-text">' . "Sesso: ";
                                if ($row['sesso'] == 0) {
                                    echo "Uomo";
                                }
                                if ($row['sesso'] == 1) {
                                    echo "Donna";
                                }
                                if ($row['sesso'] == 2) {
                                    echo "Altro";
                                }
                                echo '</p>';
                                echo '<p class="card-text">' . "Altezza: " . $row['altezza'] . '</p>';
                                echo '<p class="card-text">' . "Peso: " . $row['peso'] . '</p>';
                                echo '<p class="card-text">' . "Indirizzo: " . $row['indirizzo'] . '</p>';
                                echo '<p class="card-text">' . "Email: " . $row['email'] . '</p>';
                                echo '<p class="card-text">' . "Telefono: " . $row['telefono'] . '</p>';
                                echo '<p class="card-text">' . "Codice Tessera :" . $row['codice_tessera'] . '</p>';
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Abbonamenti</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tipologia</th>
                                            <th>Inizio</th>
                                            <th>Fine</th>
                                            <th>Prezzo</th>
                                            <th>Ingressi Rimanenti</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if ($result_sub->num_rows > 0) {
                                            while ($row_sub = $result_sub->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row_sub['id'] . "</td>";
                                                echo "<td>" . $row_sub['tipologia'] . "</td>";
                                                echo "<td>" . $row_sub['data_inizio'] . "</td>";
                                                echo "<td>" . $row_sub['data_fine'] . "</td>";
                                                echo "<td>" . $row_sub['prezzo'] . "</td>";
                                                echo "<td>" . $row_sub['ingressi_rimanenti'] . "</td>";
                                                echo "<td>";
                                                if ($row_sub['status'] == 1) {
                                                    echo "Pagato";
                                                } else {
                                                    echo "Scaduto";
                                                }
                                                echo "</td>";

                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='7'>Nessun abbonamento trovato</td></tr>";
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>