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
    echo '<p class="alert alert-danger alert-anim">0 folder "wear_folder" found ...</p>';
    exit;
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
        echo '<p class="alert alert-danger alert-anim">0 Avatar folder found ...</p>';
        exit;
    }

    $i = 0;

    while ($row = $query->fetch(PDO::FETCH_ASSOC))
    {
        $folderName     = $row['folderName'];
        $folderID       = $row['folderID'];
        $parentFolderID = $row['parentFolderID'];

        echo '<div class="col-xs-12 col-sm-4 col-md-3">';
        echo '<div class="text-left rounded border boxer">';
        echo '<a href="secondlife:///app/wear_folder/?folder_id='.$parentFolderID.'" target="_self" style="text-decoration: none;">';
        echo '<img class="img-thumbnail" src="img/'.$folderName.'.jpg" alt="'.$folderName.'" >';
        echo '<div class="regions">';
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