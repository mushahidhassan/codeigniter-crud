<h2>Add Company</h2>
<form method="post" action="/project-skillstest/companies/store">
    <label>Name:</label>
    <input type="text" name="company_name" required>
    <label>Date Created:</label>
    <input type="date" name="company_date_created" required>
    <label>Business Type:</label>
    <input type="text" name="company_business">
    <button type="submit">Add Company</button>
</form>
