<div>
<h2>Add Employee</h2>
<h2>Employees for Company ID: <?= $company_id ?></h2>
<form method="post" action="/project-skillstest/employees/store/<?= $company_id ?>">
    <label>Name:</label>
    <input type="text" name="employee_name" required>
    <label>Date of Joining:</label>
    <input type="date" name="employee_joining_date" required>
    <label>Business Joined:</label>
    <input type="text" name="company_business" value =<?= $company_id ?> >
    <button type="submit">Add Employee</button>
</form>
</div>