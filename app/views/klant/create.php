 <!-- / includes the navigation bar -->
 <?php require(APPROOT . '/views/includes/Navbar.php');?>

 <title>create</title>
 <!-- / h3 with data controller -->
 <h3 class="text-center"><?= $data['title'] ?></h3>

 <!-- form for addContact -->
 <form class="form-group" action="<?= URLROOT; ?>klant/create" method="post">
     <table>
         <tbody>
             <tr>
                 <td>
                     Naam:
                 </td>
                 <td>
                     <input class="form-control" type="text" name="Naam" required>
                 </td>
             </tr>
             <tr>
                 <td>
                     Adres
                 </td>
                 <td>
                     <input class="form-control" type="text" name="">
                 </td>
             </tr>
             <tr>
                 <td>
                     Telefoonnummer:
                 </td>
                 <td>
                     <input class="form-control" type="text" name="" required>
                 </td>
             </tr>
             <tr>
                 <td>
                     Email
                 </td>
                 <td>
                     <input class="form-control" type="text" name="" required>
                 </td>
             </tr>
             <tr>
                 <td>
                     Volwassenen(> 18jaar):
                 </td>
                 <td>
                     <input class="form-control" type="text" name="" required>
                 </td>
             </tr>
             <tr>
                 <td>
                     Kinderen(>2 jaar):
                 </td>
                 <td>
                     <input class="form-control" type="text" name="" required>
                 </td>
             </tr>
             <tr>
                 <td>
                     Babys(<=2 jaar): </td>
                 <td>
                     <input class="form-control" type="text" name="" required>
                 </td>
             </tr>
             <tr>
                 <td>
                     Wensen:
                 </td>
                 <td>
                     <input class="form-control" type="text" name="" required>
                 </td>
             </tr>
             <tr>
                 <td>
                     <input type="submit" name="submit" value="Verstuur">
                 </td>
             </tr>
         </tbody>
     </table>
 </form>

 <!--end of form -->