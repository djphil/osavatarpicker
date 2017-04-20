<?php include_once("../inc/config.php"); ?>
<?php include_once("../inc/PDO-mysql.php"); ?>
<?php include_once("../inc/functions.php"); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/osavatarpicker-inworld.css">
    <title><?php echo $osavatarpicker; ?></title>
</head>

<body>
<h1><a href="./avatars-picker.php"><?php echo $osavatarpicker; ?></a><span>List<span></h1>

<hr class="up">
<hr class="down">

<div id='avislist_container'>
<?php
$query = $db->prepare("
    SELECT *
    FROM inventoryfolders
    WHERE agentID = '".$MasterAvatarUUID."'
    AND folderName = 'wear_folder' 
");      
$query->execute();

if ($query->rowCount() <> 0)
{
    while ($row = $query->fetch(PDO::FETCH_ASSOC))
    {
        $folderName = $row['folderName'];
        $folderID = $row['folderID'];

        $query = $db->prepare("
            SELECT *
            FROM inventoryfolders
            WHERE parentFolderID = '".$folderID."'
        ");
        $query->execute();

        if ($query->rowCount() <> 0)
        {
            $i = 0;

            while ($row = $query->fetch(PDO::FETCH_ASSOC))
            {
                $folderName     = $row['folderName'];
                $folderID       = $row['folderID'];
                $parentFolderID = $row['parentFolderID'];

                echo '<div class="regionspics shadows radius">';
                echo '<div class="boxer radius">';
                echo '<hr class="up"><hr class="down">';
                echo '<a href="secondlife:///app/wear_folder/?folder_id='.$folderID.'" target="_self">';
                echo '<img class="img-thumbnail" src="'.getImageByName("../img/", $folderName, 2).'" alt="'.$folderName.'" >';
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

        else
        {
            echo '<p class="alert red"><strong>0</strong> Destination found at this time ...</p>';
        }
    }
}

else
{
    echo '<p class="alert red"><strong>0</strong> folder "<strong>wear_folder</strong>" found at this time ...</p>';
}

$query = null;
?>
</div>

</body>
</html>
