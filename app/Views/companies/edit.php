<h2>Edit Company</h2>
<div>
    <form method="post" action="/project-skillstest/companies/update">
        <input type="hidden" name="company_id" value="<?= $company['company_id'] ?>">
        <label>Name:</label>
        <input type="text" name="company_name" value="<?= $company['company_name'] ?>" required>
        <label>Date Created:</label>
        <input type="date" name="company_date_created" value="<?= $company['company_date_created'] ?>" required>
        <label>Business Type:</label>
        <input type="text" name="company_business" value="<?= $company['company_business'] ?>">
        <button type="submit">Update Company</button>
    </form>
</div>    
