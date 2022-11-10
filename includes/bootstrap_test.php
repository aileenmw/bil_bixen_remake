<?php
include 'header.php';
?>
<div clas="container-fluid">
    <h2>Hallo world</h2>
    <p>dkgldfjdlfjl</p>
    <table class="table table-striped table-inverse">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
        <tr>
            <td>Aileen</td>
            <td>aileenmw@gmail.com</td>
            <td>asdasdasd</td>
            <td><button class="btn btn-small btn-primary">Edit</button></td>
            <td><button class="btn btn-small btn-danger">delete</a></td>
        </tr>
    </table>
    

    
    
<div class="span6">
    <table class="table table-striped table-condensed">
        <thead>
        <tr>
            <th style="min-width: 80px;">First name</th>
            <th style="min-width: 80px;">Last name</th>
            <th style="width:20px;"> </th>
            <th style="width:20px;"> </th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="user in users">
            <td>{{ user.firstName }}</td>
            <td>{{ user.lastName }}</td>
            <td><a ng-click="editUser(user.id)" class="btn btn-small btn-primary">edit</a></td>
            <td><a ng-click="deleteUser(user.id)" class="btn btn-small btn-danger">delete</a></td>
        </tr>
        </tbody>
    </table>
    <a ng-click="createNewUser()" class="btn btn-small">create new user</a>
</div>
        
</div>