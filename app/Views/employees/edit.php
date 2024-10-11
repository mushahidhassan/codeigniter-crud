<h2>Edit Employee</h2>
<form method="post" action="/project-skillstest/employees/update">
    <input type="hidden" name="employee_id" value="<?= $employee['employee_id'] ?>">
    <input type="hidden" name="company_id" value="<?= $company_id ?>"> <!-- Pass company_id -->
    <label>Name:</label>
    <input type="text" name="employee_name" value="<?= $employee['employee_name'] ?>" required>
    <label>Date Joined:</label>
    <input type="date" name="employee_joining_date" value="<?= $employee['employee_joining_date'] ?>" required>
    <button type="submit">Update Employee</button>
</form>
