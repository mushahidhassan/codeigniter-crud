<h2>Employees for Company ID: <?= $company_id ?></h2>
<a href="/project-skillstest/employees/create/<?= $company_id ?>">Add Employee</a>
<table class="table table-dark d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
    <tr>
        <th>Name</th>
        <th>Date Joined</th>
        <th>Actions</th>
    </tr>
    <?php if (!empty($employees)): ?>
        <?php foreach ($employees as $employee): ?>
        <tr>
            <td><?= $employee['employee_name'] ?></td>
            <td><?= $employee['employee_joining_date'] ?></td>
            <td>
                
                <a href="/project-skillstest/employees/edit/<?= $employee['employee_id'] ?>">Edit</a>
                <a href="/project-skillstest/employees/delete/<?= $employee['employee_id'] ?>/<?= $company_id ?>" >Delete</a>

                
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="3">No employees found.</td>
        </tr>
    <?php endif; ?>
</table>
