<div>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>


    <h2>Displaying data that was fetched from API and Stored to Local database</h2>

    <!-- Filter Form -->
    <form method="get" action="<?= site_url('api/load') ?>">
        <input type="text" name="filter" placeholder="Search..." value="<?= esc($filter) ?>">
        <button type="submit">Filter</button>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <th>Actions</th> <!-- New column for actions -->
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($storedPosts)): ?>
                <?php foreach ($storedPosts as $post): ?>
                    <tr>
                        <td><?= esc($post['id']) ?></td>
                        <td><?= esc($post['title']) ?></td>
                        <td><?= esc($post['body']) ?></td>
                        <td>
                            <a href="<?= site_url('api/edit/' . $post['id'] . '?page=' . esc($currentPage) . '&filter=' . esc($filter)) ?>">Edit</a>                      
                            <a href="<?= site_url('api/delete/' . $post['id'] . '?page=' . esc($currentPage) . '&filter=' . esc($filter)) ?>" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No posts found.</td> <!-- Updated colspan to 4 -->
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <div>
        <?php 
        $totalPages = ceil($totalPosts / $limit);
        for ($i = 1; $i <= $totalPages; $i++): 
        ?>
            <a href="<?= site_url('api/load?page=' . $i . '&filter=' . esc($filter)) ?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>

    <!-- Debugging output -->
    <pre><?php //print_r($storedPosts); ?></pre>
</div>
