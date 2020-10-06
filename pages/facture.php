<?php
// appel de fichiers
require "header.php";
require "../fonctions/fonctions_facture.php";

?>

<?php
// recuperation du GET


$id_payment = htmlspecialchars($_GET['id_payment']);

if (isset($_GET["id"])) {
    $id_user = $_GET["id"];


    $id_user_crypt = aesDecrypt($id_user);

    //echo $var2;
    // var_dump($var2);
    // die();


    if (verification_id_user($id_user_crypt)) {
        //echo 'ok tu passes';
        //echo  $verification_id;

    } else {
        header('location:compte.php?id-error');
    }
}







$select_id_user = user_unique($id_user);

$select_id_payment = select_id_payment_bill($id_user, $id_payment);

$select_payment = select_id_payment_facture($id_user, $id_payment);
?>

<div class="container">
    <div class="row ligne_table">
        <h3> Votre facture :</h3>
        <table class="table">
            <thead class="entete_tableau">
                <tr>

                    <th>Facture N° </th>
                    <th>Date Facture</th>
                    <th>Nom </th>
                    <th>Prénom</th>
                    <th>Email</th>



                </tr>
            </thead>

            <!-- La variable $select_id_user récupére la fonction user_unique($id_user) qui permet de récupérer les informations de l'utilisateur-->
            <tbody class="corps_tableau">
                <?php foreach ($select_id_user as $row) { ?>


                    <form class="form-tableau" action="facture.php" method="post">

                        <tr>
                            <!-- La variable $select_payment récupére la fonction select_id_payment_facture($id_user, $id_payment) 
                            qui permet de récupérer les informations de la facture lié à l'utilisateur-->
                            <?php foreach ($select_payment  as $row1) { ?>
                                <!-- Le foreach permet de faire tourner les fonctions afin de récupérer les informations dans les lignes
                            puis par ligne je réupére les informations utilisateur pour l'entete du tableau et le numéro de facture  -->
                                <td><?php echo $row1->number_ordered ?></td>
                                <td><?php echo " " . frdate($row1->date_payment); ?></td>
                            <?php } ?>

                            <td><?php echo $row->last_name ?></td>
                            <td><?php echo $row->first_name ?></td>
                            <td><?php echo $row->connection_identifier ?></td>

                        </tr>
                    </form>
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>

<div class="container">
    <div class="row ligne_table">

        <table class="table">
            <thead class="entete_tableau">
                <tr>

                    <th>Nom du produit</th>
                    <th>Référence du produit</th>
                    <th>Prix Unitaire</th>
                    <th>Quantité</th>
                    <th>Total TTC</th>


                </tr>
            </thead>


            <tbody class="corps_tableau">

                <!-- Le foreach permet de faire tourner les fonctions afin de récupérer les informations dans les lignes,
                            par ligne je récupére les informations les informations de la facture ainsi que les produits et le montant -->

                <?php foreach ($select_id_payment as $row) { ?>


                    <!-- La variable $select_payment récupére la fonction select_id_payment_facture($id_user, $id_payment) 
                            qui permet de récupérer les informations de la facture lié à l'utilisateur-->

                    <form class="form-tableau" action="facture.php?id_product=<?php echo $row->id_product ?>" method="post">

                        <tr>

                            <td><?php echo $row->title_product ?></td>
                            <td><?php echo $row->id_product ?></td>
                            <td><?php echo $row->price_product . "€" ?></td>
                            <td><?php echo $row->quantity_cart ?></td>


                            <?php $prixQuantite = $row->price_product * $row->quantity_cart ?>
                            <td name="somme_product"><?php echo  $prixQuantite . "€"; ?></td>
                            <?php @$total += $prixQuantite ?>


                        </tr>
                    </form>
                <?php } ?>
            </tbody>




            <tfoot class="pied_tableau">
                <tr>
                    <th colspan="4">Total : </th>
                    <td class="total"><input type="text" value="<?php echo $total . "€"; ?>" disabled></td>
                </tr>
            </tfoot>
        </table>

    </div>
</div>

<div>
    <form>
        <input id="impression" name="impression" type="button" onclick="imprimer_page()" value="Imprimer cette page" />
    </form>
</div>
<!-- footer -->
<?php
require "footer.php"
?>
<script type="text/javascript">
    function imprimer_page() {
        window.print();
    }
</script>