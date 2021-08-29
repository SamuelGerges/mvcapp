<?php
namespace PHPMVC\Models;
//{
//    $sql = "SELECT * FROM users";
//    $stmt = $connect->prepare($sql);
//    $result = $stmt->execute();
//    $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'crud',
//        array(
//            'user_idd',
//            'user_name',
//            'user_age',
//            'user_address',
//            'user_phone',
//            'user_email',
//            'user_password'
//        ));
//}

$result = CrudModel::getALL();



?>
<style>
    .user table
    {
        width: 500px;
        margin: 20px 0px 100px  ;
        border-collapse: collapse;
    }
    .user table thead th
    {
        text-align: left;
        padding: 5px;
        border-right: solid 2px #e4e4e4;
        border-bottom: solid 2px #e4e4e4;
        font: bold 1em Arial,Helvetica ,sans-serif;
    }
    .user table thead th last-of-type
    {
        border-right: none;
    }
    .user table tbody td
    {
        text-align: left;
        padding: 5px;
        border: solid 1px #e4e4e4;
        font: .9em Arial,Helvetica ,sans-serif;
    }
    .user table tbody tr:nth-child(2n) td
    {
        background: #f1f1f1;
    }
</style>

<pre>
    <a href="/user/add">Add New User</a>
</pre>
<div class="user">
    <table>
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>

        <?php if(false !== $result ) : foreach($result as $user ) : ?>

            <tr>
                <td><?= $user->getId()      ?></td>
                <td><?= $user->getName()    ?></td>
                <td><?= $user->getAge()     ?></td>
                <td><?= $user->getAddress() ?></td>
                <td><?= $user->getPhone()   ?></td>
                <td><?= $user->getEmail()   ?></td>
                <td>
                    <a href="/user/edit/<?= $user->getId(); ?>"> <input type="button" name="delete" value="Edit"> </a>
                </td>
                <td>
                    <a href="/user/delete/<?= $user->getId()  ?>">Delete</a>
                </td>
            </tr>

        <?php endforeach; endif; ?>


        </tbody>
    </table>
</div>
