<!--<div>
<form action="/project-skillstest/companies/fetch-api-data" method="get">
    <button type="submit" class="btn btn-dark">Click here to get data from a dummy public API</button>
</form>--> 

<form action="/project-skillstest/api/fetch" method="get">
    <button type="submit" class="btn btn-dark">Click here to get data from a dummy public API</button>
</form>

<div>
<h2>Companies Data from Local Database</h2>
    <a href="/project-skillstest/companies/create">Add Company</a>
<table class="table table-dark d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
    <tr>
        <th>Name</th>
        <th>Date Created</th>
        <th>Business Type</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($companies as $company): ?>
    <tr>
        <td><?= $company['company_name'] ?></td>
        <td><?= $company['company_date_created'] ?></td>
        <td><?= $company['company_business'] ?></td>
        <td>
            <a href="/project-skillstest/companies/edit/<?= $company['company_id'] ?>">Edit</a>
            <a href="/project-skillstest/companies/delete/<?= $company['company_id'] ?>">Delete</a>
            <a href="/project-skillstest/employees/index/<?= $company['company_id'] ?>">View Employees</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>


</div>