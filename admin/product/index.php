<?php
$title='Product';
$baseUrl = '../';
    require_once('../layouts/header.php');
    $sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id where product.deleted = 0";
	$data = executeResult($sql);
?>
<div class="row" style="margin-top:20px;">
    <div class="col-md-12">
        <h3 class="text-warning mt-2">Quản lý sản phẩm</h3>
        <a href="editor.php"><button class="btn btn-success mb-2">Thêm sản phẩm</button></a>
    </div>
    <table class="table table-bordered table-hover table-responsive">
        <thead>
            <tr>
                <th>STT</th>
                <th>Thumbnail</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Danh mục</th>
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
                            <td>'.$item['title'].'</td>
                            <td>'.number_format($item['discount']).' vnd'.'</td>
                            <td>'.$item['category_name'].'</td>

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
    option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
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