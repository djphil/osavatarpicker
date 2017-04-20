<h1><?php echo $osavatarpicker; ?><span class="pull-right">List<span></h1>

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
        $parentFolderID = $row['parentFolderID'];

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

                echo '<div class="col-xs-12 col-sm-4 col-md-3">';
                echo '<div class="panel panel-default">';
                echo '<div class="panel-heading"><span class="badge">'.++$i.'</span> '.$folderName.'</div>';
                echo '<div class="panel-body">';
                echo '<img class="img-thumbnail img-responsive" src="'.getImageByName("img/", $folderName, 1).'" alt="'.$folderName.'" >';
                echo '</div>';
                echo '<div class="panel-footer text-center">';
                echo '<a class="btn btn-success" href="secondlife:///app/wear_folder/?folder_id='.$parentFolderID.'" target="_self">';
                echo '<i class="glyphicon glyphicon-ok"></i> Select</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }

            unset($folderName);
            unset($folderID);
            unset($parentFolderID);
        }

        else echo '<p><span class="badge">0</span> Avatar folder found at this time ...</p>';
    }
}

else echo '<p><span class="badge">0</span> folder "<strong>wear_folder</strong>" found at this time ...</p>';

$query = null;
?>