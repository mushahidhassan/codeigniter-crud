<!-- <form action="/project-skillstest/companies/store-api-data" method="post">
    <button type="submit" class="btn btn-dark">Click here to store data from this dummy public API to your database</button>
</form>--> 

<!--<form action="/project-skillstest/api/store" method="post">
    <button type="submit" class="btn btn-dark">Click here to store data from dummy public API to your database</button>
</form>--> 

<form action="/project-skillstest/api/check" method="post">
    <button type="submit" class="btn btn-dark">
        Database has prior data stored in it that it fetched from public API click here to check
    </button>
</form>

<div>
    <h2>Displaying Data Recieved from API</h2>
    <table class="table table-dark d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
        </tr>
        <?php if (!empty($posts)): ?>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?= $post['id'] ?></td>
                    <td><?= $post['title'] ?></td>
                    <td><?= $post['body'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">No data found from the API.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
