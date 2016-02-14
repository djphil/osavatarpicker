<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/osavatarpicker.css">
  <title>AvatarPicker</title>
</head>

<body>
<h1><a href="./avatars_picker.php">Avatar Picker</a><span>List<span></h1>
<hr class="up">
<hr class="down">
<div id='avislist_container'>

<?php include_once("../inc/config.php"); ?>
<?php include_once("../inc/PDO-mysql.php"); ?>

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
    echo '<p class="alert red">0 destination found ...</p>';
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
        echo '<p class="alert red">0 destination found ...</p>';
        exit;
    }

    $i = 0;

    while ($row = $query->fetch(PDO::FETCH_ASSOC))
    {
        $folderName     = $row['folderName'];
        $folderID       = $row['folderID'];
        $parentFolderID = $row['parentFolderID'];

        echo '<div class="regionspics shadows radius">';
        echo '<div class="boxer radius">';
        echo '<hr class="up"><hr class="down">';
        echo '<a href="secondlife:///app/wear_folder/?folder_id='.$parentFolderID.'" target="_self">';
        echo '<img class="" src="../img/'.$folderName.'.jpg" alt="'.$folderName.'" >';
        echo '<div class="regions">';
        echo '<hr class="up">';
        echo '<hr class="down">'.$title.'';
        echo '<span> '.++$i.'</span>';
        echo '<hr class="up">';
        echo '<hr class="down">'.$folderName.'';
        echo '<hr class="up">';
        echo '<hr class="down">';
        echo '</div></a>';
        echo '</div>';
        echo '</div>';
    }
    unset($folderName);
    unset($folderID);
    unset($parentFolderID);
}
$query = null;
?>
</div>
</body>
</html>
