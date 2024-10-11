<h2>Edit Post</h2>
<div>
    <form method="post" action="<?= site_url('api/update/' . $post['id']) ?>">
        <input type="hidden" name="page" value="<?= esc($currentPage) ?>">
        <input type="hidden" name="filter" value="<?= esc($filter) ?>">
        <label>Title</label>
        <input type="text" name="title" value="<?= esc($post['title']) ?>" required>
        <label>Body</label>
        <textarea name="body" required><?= esc($post['body']) ?></textarea>
        <button type="submit">Update Post</button>
    </form>
    <a href="<?= site_url('api/load?page=' . esc($currentPage) . '&filter=' . esc($filter)) ?>">Cancel</a>
</div>
