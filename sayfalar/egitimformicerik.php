            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tüm Eğitim Formları</h3>                                    
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
    <!-- Tablo Başlık -->
  
                        <thead>
                            <tr>
                                <th>Döküman ID</th>
                                <th>Döküman Adı</th>
                                <th>Domuan Link</th>
                                <th>İndir</th>
                                <th>Aç</th>
                            </tr>
                        </thead>
                        <tbody>
                        
    <!-- Tablo İçerik -->
    <?php
     $sql = $db->query("SELECT ID, FORM_ADI, DKM_KONUMU, ETAR, EKUL, DTAR, DKUL  FROM egitimdokuman");
     foreach ($sql as $dokumansql)
            { 
    ?>
            <tr>
                <td><?php echo $dokumansql['ID'] ?></td>
                <td><?php echo $dokumansql['FORM_ADI'] ?></td>
                <td><?php echo $dokumansql['DKM_KONUMU'] ?></td>
                <td><a href="dokuman/<?php echo $dokumansql['DKM_KONUMU'] ?>"><button class="btn btn-info btn-sm">İndir</button></a></td>
                <td>
                <a href="dokuman/<?php echo $dokumansql['DKM_KONUMU'] ?>">
                <button class="btn btn-primary btn-sm">Aç</button></a></td>
            </tr>
                        
    <?php
            }
    ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->