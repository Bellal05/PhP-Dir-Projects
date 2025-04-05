<?php
include 'conn.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codice_tessera = $_POST['codice_tessera'];
    $tipologia = $_POST['tipologia'];
    $data_inizio = $_POST['data_inizio'];
    $data_fine = $_POST['data_fine'];
    $prezzo = $_POST['prezzo'];
    $descrizione = $_POST['descrizione'];
    $status = "1";
    $ingressi_rimanenti = isset($_POST['ingressi_rimanenti']) && $_POST['ingressi_rimanenti'] !== "" ? $_POST['ingressi_rimanenti'] : NULL;

    try {
        $stmt = $conn->prepare("INSERT INTO Abbonamenti_p2 (codice_tessera, tipologia,data_inizio,data_fine,prezzo,descrizione,ingressi_rimanenti, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $codice_tessera, $tipologia, $data_inizio, $data_fine, $prezzo, $descrizione, $ingressi_rimanenti, $status);
        $stmt->execute();

        header("Location: tables_a.php");
        exit;
    } catch (PDOException $e) {
        echo "Errore : " . $e->getMessage();
    }
    // Redirect to another page


}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Elenco Abbonamenti</title>

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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Nuovo Abbonamento</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Codice Tessera</th>
                                            <th>Tipologia</th>
                                            <th>Inizio</th>
                                            <th>Fine</th>
                                            <th>Prezzo</th>
                                            <th>Descrizione</th>
                                            <th>Ingressi Rimanenti</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form class="" method="POST" action="new_sub.php">
                                            <tr>
                                                <td>
                                                    <select name="codice_tessera" required class="form-control">
                                                        <option value="" disabled selected>Seleziona Codice Tessera
                                                        </option>
                                                        <?php
                                                        include 'conn.php'; // Include the database connection
                                                        
                                                        $query = "SELECT codice_tessera, nome FROM utenti_p3 ";
                                                        $result = $conn->query($query);

                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                echo '<option value="' . $row["codice_tessera"] . '">' . $row["codice_tessera"] . ' - ' . $row["nome"] . '</option>';
                                                            }
                                                        } else {
                                                            echo '<option value="" disabled>Nessun codice disponibile</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="tipologia" required class="form-control">
                                                        <option value="" disabled selected>Seleziona la Tipologia
                                                        </option>
                                                        <option value="ingressi_limitati">Ingressi Limitati</option>
                                                        <option value="mensile">Mensile</option>
                                                        <option value="annuale">Annuale</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="date" name="data_inizio" required class="form-control">
                                                </td>
                                                <td>
                                                    <input type="date" name="data_fine" required class="form-control">
                                                </td>
                                                <td>
                                                    <input type="number" name="prezzo" required class="form-control"
                                                        min="0">
                                                </td>
                                                <td>
                                                    <input type="text" name="descrizione" required class="form-control">
                                                </td>
                                                <td>
                                                    <input type="number" name="ingressi_rimanenti" class="form-control"
                                                        min="0">
                                                </td>
                                                <td>
                                                    <button type="submit"
                                                        class="btn btn-primary btn-user btn-block">Aggiungi</button>
                                                </td>
                                        </form>
                                        </tr>

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