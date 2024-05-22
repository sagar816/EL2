<?php
include('./admininclude/header.php');
?>

<div class="col-sm-9 mt-5">

<!-- Table -->

<p class="bg-dark text-white p-2"> List of All Users </p>
<table class="table">
    <thead>
        <tr>
            <th scope="col">User ID </th>
            <th scope="col">Name </th>
            <th scope="col">Contact</th>
            <th scope="col">Email </th>
            <th scope="col">Status </th>
            <th scope="col">Points </th>
            <th scope="col">Action </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td> Sagar </td>
            <td> 12345 </td>
            <td> sagar@gmail.com </td>
            <td> Active </td>
            <td> 2000 </td>
            <td>
                <button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="fa-solid fa-pen"></i></button>
                <button type="submit" class="btn btn-seconary" name="delete" value="Delete"><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>
    </tbody>
</table>
</div>
</div>
<!-- div Row close from header -->

<div>
    <a class="btn btn-danger box" href="#"><i class="fas fa-plus fa-2x"></i></a>
</div>
</div>
<!-- dic container - fluid close from header -->



<?php
include('./admininclude/footer.php');
?>