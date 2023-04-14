<?php
$title='Explore';
$baseUrl = '../';
    require_once('../layouts/header.php');
    $sql = "select explore.*, category_explore.name as category_explore_name from explore left join category_explore on explore.category_explore_id = category_explore.id";
	$data = executeResult($sql);
?>
<div class="row" style="margin-top:20px;">
    <div class="col-md-6">
        <h3 class=" mt-2">Explore Management</h3>
        <a href="editor.php"><button class="btn btn-success mb-2">Add explore</button></a>
    </div>
    <div class="col-md-6">
        <form action="searchExplore.php" method="POST"
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input name="search" type="text" class="form-control bg-light border-1 small"
                    placeholder="Search Explore title ..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <a href="searchExplore.php"><button class="btn " style="background-color: #2B3467;color:white"
                            type="submit">
                            <i class="fas fa-search fa-sm"></i></a>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <table class="table table-bordered table-hover table-responsive">
        <thead>
            <tr>
                <th>STT</th>
                <th>Thumbnail</th>
                <th>Description</th>
                <th>Title</th>
                <th>Category</th>
                <th style="width: 50px;"></th>
                <th style="width: 50px;"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 0 ;
            foreach($data as $item) {
                echo '<tr>
                            <th>'.(++$index).'</th>
                            <td><img src = "'.fixUrl($item['thumbnail']).'" style="height: 100px;" /></td>
                            <td>'.$item['description'].'</td>
                            <td>'.($item['title']).'</td>
                            <td>'.$item['category_explore_name'].'</td>
                            <td style="width: 50px">
                                <a href="editor.php?id='.$item['id'].'"><button class="btn btn-warning">Sửa</button></a>
                            </td>
                            <td style="width: 50px">
                            <button onclick="deleteProduct('.$item['id'].')" class="btn btn-danger">Xoá</button>
                        </td>
                        </tr>';
            }
            ?>
        </tbody>

    </table>
</div>
<script type="text/javascript">
function deleteProduct(id) {
    option = confirm('Bạn có chắc chắn muốn xoá triễn lãm này không?')
    if (!option) return;

    $.post('form_api.php', {
        'id': id,
        'action': 'delete'
    }, function(data) {
        location.reload()
    })
}
</script>
<?php
    require_once('../layouts/footer.php')
?>