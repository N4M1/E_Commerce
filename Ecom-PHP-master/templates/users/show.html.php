<h1>hello</h1>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>first name</th>
            <th>last name</th>
            <th>email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usersTab as $user) : ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['first_name'] ?></td>
                <td><?= $user['last_name'] ?></td>
                <td><?= $user['email'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>