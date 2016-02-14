<h1><?php echo $osavatarpicker; ?><span class="pull-right">List<span></h1>

<?php
$query = $db->prepare("
    SELECT *
    FROM inventoryfolders
    WHERE agentID = '".$MasterAvatarUUID."'
    AND folderName = 'wear_folder' 
");
        
$query->execute();
$counter = $query->rowCount();
    
if ($counter == 0)
{
    // echo '<p class="alert red">0 folder "wear_folder" found ...</p>';
    // exit;
    $_SESSION['flash']['danger'] = "0 folder \"wear_folder\" found ...";
}

while ($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $folderName = $row['folderName'];
    $folderID = $row['folderID'];
    $parentFolderID = $row['parentFolderID'];

    $query = $db->prepare("
        SELECT *
        FROM inventoryfolders
        WHERE parentFolderID = '".$folderID."'
    ");
            
    $query->execute();
    $counter = $query->rowCount();
        
    if ($counter == 0)
    {
        echo '<p class="alert red">0 destination found ...</p>';
        exit;
    }

    $i = 0;

    while ($row = $query->fetch(PDO::FETCH_ASSOC))
    {
        $folderName     = $row['folderName'];
        $folderID       = $row['folderID'];
        $parentFolderID = $row['parentFolderID'];

        echo '<div class="col-md-3">';
        echo '<div class="text-left rounded border boxer">';
        echo '<a href="secondlife:///app/wear_folder/?folder_id='.$parentFolderID.'" target="_self" style="text-decoration: none;">';
        echo '<img class="img-thumbnail" src="img/'.$folderName.'.jpg" alt="'.$folderName.'" >';
        echo '<div class="regions">';
        // echo '<p>'.$title.'<span class="pull-right"> '.++$i.'</span>';
        echo '<p>'.++$i.')<span class=""> '.$folderName.'</span></p>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
        echo '</div>';
    }
    unset($folderName);
    unset($folderID);
    unset($parentFolderID);
}
$query = null;
?>

<!-- Fash Message -->
<?php if(isset($_SESSION['flash'])): ?>
    <?php foreach($_SESSION['flash'] as $type => $message): ?>
        <div class="alert alert-<?php echo $type; ?> alert-anim fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $message; ?>
        </div>
    <?php endforeach; ?>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>