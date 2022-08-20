<?php require_once('header.php'); ?>



<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                     <div class="page-title-icon">
                           <i class="pe-7s-drawer icon-gradient bg-happy-itmeo"> </i>
                     </div>
                     <div>
                           All Categories
                     </div>
                </div>
                <div class="page-title-actions">
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
               <div class="main-card mb-3 card">
                  <div class="card-body">
                        <h5 class="card-title">Table with hover</h5>
                        <?php
                        $i = 1;
                        $stm=$pdo->prepare("SELECT * FROM categories");
                        $stm->execute(array());
                        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <table class="mb-0 table table-hover">
                           <thead>
                              <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach($result as $row) :?>
                              <tr>
                                    <th scope="row"><?php echo $i; $i++; ?></th>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['slug']; ?></td>
                                    <td>
                                          <a href="#" class="btn btn-warning text-white" title="Edit"><i class="pe-7s-note"></i></a>
                                          <a href="#" class="btn btn-danger text-white" title="Delete"><i class="pe-7s-trash"></i></a>
                                    </td>
                              </tr>
                              <?php endforeach; ?>
                           </tbody>
                        </table>
                  </div>
               </div>
            </div>
        </div>
    </div>
    

<?php require_once('footer.php'); ?>